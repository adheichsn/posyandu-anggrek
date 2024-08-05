<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'alamat' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'numeric'],
            'nik_anak' => ['required', 'numeric'],
            'nama_ibu' => ['required', 'string', 'max:255'],
            'nama_anak' => ['required', 'string', 'max:255'],
            'tgl_lahir' => ['required', 'string', 'max:255'],
            'usia' => ['required', 'numeric', 'max:255'],
            'jenis_kelamin' => ['required', 'string', 'in:laki_laki,perempuan'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'alamat' => $data['alamat'],
            'no_hp' => $data['no_hp'],
            'nik_anak' => $data['nik_anak'],
            'nama_ibu' => $data['nama_ibu'],
            'nama_anak' => $data['nama_anak'],
            'tgl_lahir' => $data['tgl_lahir'],
            'usia' => $data['usia'],
            'role' => 'user',
            'jenis_kelamin' => $data['jenis_kelamin'],
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    protected function registered(Request $request, $user)
    {
        Alert::success('Berhasil Mendaftar!', 'Silakan lakukan Login!');
        return redirect()->route('login');
    }
}
