<?php

namespace App\Http\Controllers;

use App\Models\Sitelist;
use Illuminate\Http\Request;
use App\Models\JenisTogel;
use App\Models\Berita;
use App\Models\PrediksiTogel;

class SideController extends Controller
{
    public function index_prediksi()
    {
        session()->forget('pasaran');

        return view('all_prediksi', [
            'site_settings' => getSetting()
        ]);
    }

    public function index_prediksi_by_pasaran($jenis)
    {
         session(['pasaran' => $jenis]);

         return view('prediksi_pasaran', [
            "site_settings" => getSetting(),
        ]);
    }

    public function index_payment()
    {
        $count = Berita::has('sitelist')->whereHas('sitelist', function($e) {
            $e->where('site_name', env('AGENT'));
            $e->where('kategori_id', '1');
        })->orderByDesc('id')->count();

        $data = [
            'site_settings' => getSetting(),
            'count' => $count,
        ];

        return view('payment', $data);
    }

    public function paymentJson()
    {
        $data = Berita::has('sitelist')->whereHas('sitelist', function($e) {
            $e->where('site_name', env('AGENT'));
            $e->where('kategori_id', '1');
        })->orderByDesc('id')->paginate(2);

        return response()->json([
            "items" => $data
        ]);
    }

    public function jenisAll(Request $request)
    {

        $jenis = JenisTogel::whereHas("sitelist", function($e) {
            $e->where('site_name', env('AGENT'));
        })->where('status', '1')->select('nama_togel')->get();


        return response()->json([
            'items' => $jenis
        ]);
    }



    public function prediksiAll(Request $request)
    {
        $limitPerPage = 10;
        $page = $request->get('page');
        $skip = !is_null($page) ? $page-1 : 0;

        $jumlahRecord = PrediksiTogel::has('sitelist')->whereHas('sitelist', function($e) {
                      $e->where('site_name', env('AGENT'));
                       })->count();


        $vendors = Sitelist::select('site_name','nama_togel','tanggal', 'bbfs', 'angka_main', 'd4', 'd3','bb_2d', 'cadangan_2d', 'colok_bebas_2d', 'colok_bebas', 'shio')
            ->join('prediksi_togel', 'prediksi_togel.site', '=', 'sitelists.id')
            ->join('jenis_togel','prediksi_togel.jenis_togel_id','=','jenis_togel.id')
            ->where('site_name', env('AGENT'))
            ->orderByDesc('prediksi_togel.id')
            ->skip($skip * $limitPerPage)
            ->take($limitPerPage)
            ->get();

        $data = [
            'items' => [
                'currentPage' => (int)$skip + 1,
                'pageCount' => ceil($jumlahRecord / 10),
                'prediksi' => $vendors,
            ]
        ];


        return response()->json($data);
    }

    public function prediksiByPasaran(Request $request)
    {
        $pasaran = session('pasaran');
        $limitPerPage = 10;
        $page = $request->get('page');
        $skip = !is_null($page) ? $page-1 : 0;

        $jumlahRecord = Sitelist::join('prediksi_togel', 'prediksi_togel.site', '=', 'sitelists.id')
            ->join('jenis_togel','prediksi_togel.jenis_togel_id','=','jenis_togel.id')
            ->where('site_name', env('AGENT'))
            ->where('nama_togel', $pasaran)
            ->count();

        $vendors = Sitelist::select('site_name','nama_togel','tanggal', 'bbfs', 'angka_main', 'd4', 'd3','bb_2d', 'cadangan_2d', 'colok_bebas_2d', 'colok_bebas', 'shio')
            ->join('prediksi_togel', 'prediksi_togel.site', '=', 'sitelists.id')
            ->join('jenis_togel','prediksi_togel.jenis_togel_id','=','jenis_togel.id')
            ->where('site_name', env('AGENT'))
            ->where('nama_togel', $pasaran)
            ->orderByDesc('prediksi_togel.id')
            ->skip($skip * $limitPerPage)
            ->take($limitPerPage)
            ->get();

        $data = [
            'items' => [
                'currentPage' => (int)$skip + 1,
                'pageCount' => ceil($jumlahRecord / 10),
                'pasaran' => $pasaran,
                'prediksi' => $vendors,
            ]
        ];


        return response()->json($data);
    }



}