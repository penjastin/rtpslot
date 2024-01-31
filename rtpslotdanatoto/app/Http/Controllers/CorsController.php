<?php

namespace App\Http\Controllers;

Use Carbon\Carbon;
use App\Models\Vendor;
use App\Models\Sitelist;
use Illuminate\Http\Request;
use App\Models\JenisTogel;
use App\Models\Berita;
use App\Models\PrediksiTogel;
use Illuminate\Support\Facades\DB;

class CorsController extends Controller
{

    public function jenisVendor()
    {
        $vendor = Vendor::select('vendor_name', 'image_url_vendor')->get();
        return response()->json([
            'vendor' => $vendor
        ]);
    }
    public function prediksiByVendor(Request $request)
    {
        $vendor = session('vendor');
        $page = $request->get('page', 1);
        // $imageUrl = Vendor::select('image_url_vendor')->where('vendor_name', $vendor)->first()->image_url_vendor;
         $imageUrl = DB::table('vendors')
            ->where('vendor_name', $vendor)
            ->value('image_url_vendor');


        $games = Vendor::join('danatoto_gamelists', 'danatoto_gamelists.vid', '=', 'vendors.id')
            ->select('game_name', 'image_url', 'value', 'pola', 'pola_rtp', 'status_game', 'status_vendor','vendor_name')
            ->where('vendor_name', $vendor)
            ->where('image_url_vendor', $imageUrl)
            ->where('status_game', '1')
            ->where('status_vendor', '1')
            ->get();

            $gamesVendor = $games->map(function ($e) {
            $null = '&lt;span>Pola tidak tersedia!&lt;br/&gt;Silahkan gunakan pola anda pribadi.&lt;span&gt;';
            $e->pola_rtp = html_entity_decode($e->pola ? $e->pola_rtp : $null);
            $e->warna = $e->value < 30 ? 'red' : ($e->value < 70 ? 'yellow' : 'green');

            return $e;
            });

            $data = [
                'items' => [
                    'currentPage' => $page,
                    'imageUrl' => $imageUrl,
                    'vendor' => $vendor,
                    'prediksi' => $gamesVendor,
                ]
            ];


            $prediksis = $data['items']['prediksi'];

            $prediksi = [
                'items' =>  $prediksis

            ];
            return response()->json($prediksi);

    }

    public function Vendor()
    {
        $vendor = session('vendor');

        // $imageUrl = Vendor::select('image_url_vendor')->where('vendor_name', $vendor)->first()->image_url_vendor;
        $imageUrl = DB::table('vendors')
            ->where('vendor_name', $vendor)
            ->value('image_url_vendor');



        $data = [
            'items' => [
                'imageUrl' => $imageUrl,
                'vendor' => $vendor,
            ]
        ];

        return response()->json($data);
    }


    public function jsonGame()
    {

       $games = Vendor::with(["gengtoto" => function($e) {
            $e->where('status_game', '1')
            ->where('status_vendor', '1')
            ->orderBy('id', 'asc')->limit(24);
        }])->get()->pluck("gengtoto")->collapse()->map(function($e) {

            $null = '&lt;span>Pola tidak tersedia!&lt;br/&gt;Silahkan gunakan pola anda pribadi.&lt;span&gt;';
            $e->pola_rtp = html_entity_decode($e->pola ? $e->pola_rtp : $null);
            $e->warna = $e->value < 30 ? 'red' : ($e->value < 70 ? 'yellow' : 'green');
            return $e;
        });

       return response()->json(['items' => $games]);
    }

    // Side


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

    public function jenisAll()
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