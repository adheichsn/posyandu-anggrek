<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $auth = Auth::user()->role ?? 'user';
        if ($search) {
            $data = User::Where('username', 'LIKE', "%$search%")
                ->orWhere('no_hp', 'LIKE', "%$search%")
                // ->orWhere('nik_ibu', 'LIKE', "%$search%")
                ->orWhere('nik_anak', 'LIKE', "%$search%")
                ->orWhere('nama_anak', 'LIKE', "%$search%")
                ->orWhere('nama_ibu', 'LIKE', "%$search%")
                ->orWhere('jenis_kelamin', 'LIKE', "%$search%")
                ->when($auth == 'user', function ($query) {
                    $query->where('id', Auth::id());
                })
                ->oldest()
                ->paginate(15)
                ->withQueryString();
            return view('pages.user.index', compact('data', 'search'));
        }

        $data = User::when($auth == 'user' || $auth == 'ketua_rt', function ($query) {
            $query->where('id', Auth::id());
        })->oldest()->paginate(15)->withQueryString();

        return view('pages.user.index', compact('data'));
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string|unique:users',
            'password' => 'required|string|confirmed',
            'role' => 'required|string',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
            'nik_anak' => 'required|numeric',
            'nama_ibu' => 'required',
            'nama_anak' => 'required',
            'tgl_lahir' => 'required',
            'tgl_lahir_ibu' => 'required',
            'usia' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $user = new User();
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->alamat = $request->alamat;
            $user->no_hp = $request->no_hp;
            // $user->nik_ibu = $request->nik_ibu;
            $user->nik_anak = $request->nik_anak;
            $user->nama_ibu = $request->nama_ibu;
            $user->nama_anak = $request->nama_anak;
            $user->tgl_lahir = $request->tgl_lahir;
            $user->tgl_lahir_ibu = $request->tgl_lahir_ibu;
            $user->usia = $request->usia;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->save();
            DB::commit();
            Alert::success('Success', 'Berhasil menambahkan data user!');
            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'username' => 'required|string',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
            // 'nik_ibu' => 'required|numeric',
            'nik_anak' => 'required|numeric',
            'nama_ibu' => 'required',
            'nama_anak' => 'required',
            'tgl_lahir' => 'required',
            'tgl_lahir_ibu' => 'required',
            'usia' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $user = User::findOrFail($id);
            $user->username = $request->username;
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            $user->alamat = $request->alamat;
            $user->no_hp = $request->no_hp;
            $user->role = $request->role;
            // $user->nik_ibu = $request->nik_ibu;
            $user->nik_anak = $request->nik_anak;
            $user->nama_ibu = $request->nama_ibu;
            $user->nama_anak = $request->nama_anak;
            $user->tgl_lahir = $request->tgl_lahir;
            $user->tgl_lahir_ibu = $request->tgl_lahir_ibu;
            $user->usia = $request->usia;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->save();
            DB::commit();
            Alert::success('Success', 'Berhasil mengubah data user!');
            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $user = User::findOrFail($id);
            $user->delete();

            DB::commit();
            Alert::success('Success', 'User berhasil dihapus!');
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }

    public function export_pdf()
    {
        $user = User::all();

        $pdf = Pdf::loadview('pages.user.report', ['user' => $user])->setPaper('a4', 'landscape');
        return $pdf->stream('user-report_' . now() . '.pdf');
    }
}
