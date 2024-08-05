<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\JenisPelayanan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        if ($search) {
            $data = Anggota::Where('nama', 'LIKE', "%$search%")
                ->orWhere('jenis_kelamin', 'LIKE', "%$search%")
                ->orWhere('alamat', 'LIKE', "%$search%")
                ->orWhere('pekerjaan', 'LIKE', "%$search%")
                ->oldest()
                ->paginate(15)
                ->withQueryString();
            return view('pages.anggota.index', compact('data', 'search'));
        }

        $data = Anggota::oldest()->paginate(15)->withQueryString();

        return view('pages.anggota.index', compact('data'));
    }

    public function create()
    {
        return view('pages.anggota.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $anggota = new Anggota();
            $anggota->nama = $request->nama;
            $anggota->alamat = $request->alamat;
            $anggota->tgl_lahir = $request->tgl_lahir;
            $anggota->pekerjaan = $request->pekerjaan;
            $anggota->jenis_kelamin = $request->jenis_kelamin;
            $anggota->status = $request->status;
            $anggota->save();
            DB::commit();
            Alert::success('Success', 'Berhasil menambahkan data anggota!');
            return redirect()->route('anggota.index');
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
        $anggota = Anggota::findOrFail($id);
        return view('pages.anggota.edit', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'tgl_lahir' => 'required',
            'pekerjaan' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $anggota = Anggota::findOrFail($id);
            $anggota->nama = $request->nama;
            $anggota->alamat = $request->alamat;
            $anggota->pekerjaan = $request->pekerjaan;
            $anggota->tgl_lahir = $request->tgl_lahir;
            $anggota->pekerjaan = $request->pekerjaan;
            $anggota->jenis_kelamin = $request->jenis_kelamin;
            $anggota->status = $request->status;
            $anggota->save();
            DB::commit();
            Alert::success('Success', 'Berhasil mengedit data anggota!');
            return redirect()->route('anggota.index');
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
            $anggota = Anggota::findOrFail($id);
            $anggota->delete();

            DB::commit();
            Alert::success('Success', 'anggota berhasil dihapus!');
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }

    public function export_pdf()
    {
        $anggota = Anggota::all();

        $pdf = Pdf::loadview('pages.anggota.report', ['anggota' => $anggota])->setPaper('a4', 'landscape');
        return $pdf->stream('anggota-report_' . now() . '.pdf');
    }
}
