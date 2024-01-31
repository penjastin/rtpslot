<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Sitelist;
use App\Models\Prediksi;
use App\Models\JenisTogel;
use DB;

class PrediksiTogelController extends Controller
{
    public function index()
    {
        if (auth()->user()->sites->site_name == 'all'){
            $sites = Sitelist::select('id','site_name','site_url')->get()->keyBy('id')->toArray();
        } else {
            $sites = auth()->user()->sites->toArray();
        }
        return view('prediksi_togel',compact('togel'));
    }

public function edit($id)
    {
        $sites = [];

        $dataTogel = [];
        if (auth()->user()->sites->site_name == 'all'){
            $sites = Sitelist::get()->keyBy('id')->toArray();
            // $dataTogel = Prediksi::all();
            $dataTogel = Prediksi::join('sitelists', 'prediksi_togel.site', '=', 'sitelists.id')
            ->join('jenis_togel', 'prediksi_togel.jenis_togel_id', '=', 'jenis_togel.id')
            ->select('prediksi_togel.*', 'sitelists.site_name', 'jenis_togel.nama_togel')
            ->orderBy('prediksi_togel.id', 'desc')
            ->get();

            //untuk dropdown jenistogel berdasar id situs (admin)
            $jenis_togel = JenisTogel::get();

            //untuk menampilkan semua data togel dan site name nya. (admin)
            $jenis_togel_all = JenisTogel::join('sitelists', 'jenis_togel.site_id', '=', 'sitelists.id')
            ->select('jenis_togel.*', 'sitelists.site_name')
            ->get();

            if(!isset($sites[$id])){
                return abort(404);
            }
        } else if (auth()->user()->sites->site_name != 'all')  {
            // $dataTogel = Prediksi::where('site', $id)->get();
            $dataTogel = Prediksi::leftJoin('jenis_togel', 'prediksi_togel.jenis_togel_id', '=', 'jenis_togel.id')
            ->where('prediksi_togel.site', $id)
            ->select('prediksi_togel.*', 'jenis_togel.nama_togel')
            ->orderBy('prediksi_togel.id', 'desc')
            ->get();

            //untuk menampilkan data togel berdasarkan id situs dan status nya d
            $jenis_togel = JenisTogel::where('site_id', $id)
            ->where('status', 1)
            ->get();

            $jenis_togel_all = JenisTogel::where('site_id', $id)->get();


        }
        return view('prediksi_togel', compact('sites', 'id', 'dataTogel', 'jenis_togel', 'jenis_togel_all'));
    }


    public function update(Request $request, $id)
    {

    $data = Prediksi::find($id);
    $data->site = $request->site;
    $data->jenis_togel_id = $request->jenis_togel_id;
    $data->kategori_id = 2;
    $data->tanggal = $request->tanggal;
    $data->bbfs = $request->bbfs;
    $data->angka_main = $request->angka_main;
    $data->d4 = $request->d4;
    $data->d3 = $request->d3;
    $data->bb_2d = $request->bb_2d;
    $data->cadangan_2d = $request->cadangan_2d;
    $data->colok_bebas_2d = $request->colok_bebas_2d;
    $data->colok_bebas = $request->colok_bebas;
    $data->shio = $request->shio;
    $data->save();

    // Kembalikan respons atau arahkan pengguna ke halaman yang sesuai
    return redirect()->back()->with('success', 'Data has been updated successfully.');
    }
public function delete($id)
{
    // Cari data yang akan dihapus berdasarkan ID
    $data = Prediksi::find($id);

    if (!$data) {
        // Jika data tidak ditemukan, kembalikan respons dengan pesan error
        return redirect()->back()->withErrors('Data not found.');
    }

    // Hapus data
    $data->delete();


    return redirect()->back()->with('success', 'Data has been deleted successfully.');
}

public function create(Request $request) {
    try {
        DB::beginTransaction();
        $insert = new Prediksi;

        $insert->site = $request->site;
        $insert->jenis_togel_id = $request->jenis_togel_id;
        $insert->kategori_id = 2;
        $insert->tanggal = $request->tanggal;
        $insert->bbfs = $request->bbfs;
        $insert->angka_main = $request->angka_main;
        $insert->d4 = $request->d4;
        $insert->d3 = $request->d3;
        $insert->bb_2d = $request->bb_2d;
        $insert->cadangan_2d = $request->cadangan_2d;
        $insert->colok_bebas_2d = $request->colok_bebas_2d;
        $insert->colok_bebas = $request->colok_bebas;
        $insert->shio = $request->shio;

        $insert->save();

        DB::commit();
            // return response()->json($insert, 200);
            return redirect()->back()->with('success', 'Data has been add successfully.');

    } catch (\Throwable $th) {
        //throw $th;
        DB::rollback();
    }
}

public function updateStatus(Request $request)
{
    $togelId = $request->input('togelId');
    $status = $request->input('status');

    $jenisTogel = JenisTogel::find($togelId);
    if ($jenisTogel) {
        $jenisTogel->status = $status;
        $jenisTogel->save();

        return response()->json(['message' => 'Status berhasil diubah']);
    }

    return response()->json(['message' => 'Togel tidak ditemukan'], 404);
}

public function getJenisTogelBySite($siteId)
{
    $jenisTogel = JenisTogel::where('site_id', $siteId)->where('status', 1)->get();
    return response()->json($jenisTogel);
}



}
