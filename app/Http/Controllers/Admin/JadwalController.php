<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\JenisPelayanan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $choose_bulan = $request->get('choose_bulan');
        $bulan = Jadwal::select(DB::raw('DISTINCT MONTHNAME(tanggal) AS nama_bulan, MONTH(tanggal) AS bulan'))->get();

        if ($search) {
            $data = Jadwal::where('jenis_pelayanan', 'LIKE', "%$search%")
                ->orWhere('lokasi', 'LIKE', "%$search%")
                ->orWhere('tanggal', 'LIKE', "%$search%")
                ->oldest()
                ->paginate(15)
                ->withQueryString();
            return view('pages.jadwal.index',  compact('data', 'search', 'bulan', 'choose_bulan'));
        }

        if ($choose_bulan) {
            $data = Jadwal::whereRaw('MONTH(tanggal) = ?', [$choose_bulan])
                ->oldest()
                ->paginate(15)
                ->withQueryString();
            return view('pages.jadwal.index', compact('data', 'search', 'bulan', 'choose_bulan'));
        }

        $data = Jadwal::oldest()->paginate(15)->withQueryString();

        return view('pages.jadwal.index', compact('data', 'search', 'bulan', 'choose_bulan'));
    }

    public function create()
    {
        $jenis_pelayanan = JenisPelayanan::all();
        return view('pages.jadwal.create', compact('jenis_pelayanan'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis_pelayanan' => 'required|string',
            'lokasi' => 'required|string',
            'tanggal' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $jadwal = new Jadwal();
            $jadwal->jenis_pelayanan = $request->jenis_pelayanan;
            $jadwal->lokasi = $request->lokasi;
            $jadwal->tanggal = $request->tanggal;
            $jadwal->deskripsi = $request->deskripsi;
            $jadwal->save();
            DB::commit();
            Alert::success('Success', 'Berhasil menambahkan data jadwal!');
            return redirect()->route('jadwal.index');
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
        $jenis_pelayanan = JenisPelayanan::all();
        $jadwal = Jadwal::findOrFail($id);
        return view('pages.jadwal.edit', compact('jadwal', 'jenis_pelayanan'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jenis_pelayanan' => 'required|string',
            'lokasi' => 'required|string',
            'tanggal' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $jadwal = Jadwal::findOrfail($id);
            $jadwal->jenis_pelayanan = $request->jenis_pelayanan;
            $jadwal->lokasi = $request->lokasi;
            $jadwal->tanggal = $request->tanggal;
            $jadwal->deskripsi = $request->deskripsi;
            $jadwal->save();
            DB::commit();
            Alert::success('Success', 'Berhasil mengubah data jadwal!');
            return redirect()->route('jadwal.index');
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
            $jadwal = Jadwal::findOrFail($id);
            $jadwal->delete();

            DB::commit();
            Alert::success('Success', 'Jadwal berhasil dihapus!');
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }

    public function add_jenis_pelayanan(Request $request)
    {
        $this->validate($request, [
            'add_jenis_pelayanan' => 'required|string',
        ]);
        try {
            $data = new JenisPelayanan();
            $data->nama = $request->add_jenis_pelayanan;
            $data->save();
            Alert::success('Success', 'Berhasil menambahkan data jenis pelayanan!');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }

    public function export_pdf()
    {
        $jadwal = Jadwal::all();

        $pdf = Pdf::loadview('pages.jadwal.report', ['jadwal' => $jadwal])->setPaper('a4', 'landscape');
        return $pdf->stream('jadwal-report_' . now() . '.pdf');
    }
}
