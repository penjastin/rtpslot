<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Carbon\Carbon;
use App\Models\Vendor;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function index()
    {
        $current_datetime = Carbon::parse('now')->locale('id')->settings(['formatFunction' => 'translatedFormat']);

        return view('home', [
            "site_settings" => getSetting(),
            "current_datetime" => $current_datetime,
        ]);
    }



    public function index_vendor($jenisVendor)
    {
        session(['vendor' => $jenisVendor]);
        $current_datetime = Carbon::parse('now')->locale('id')->settings(['formatFunction' => 'translatedFormat']);

        return view('prediksi_vendor', [
            "site_settings" => getSetting(),
            "current_datetime" => $current_datetime,
        ]);
    }



    public function jenisVendor()
    {
        $games = DB::table('danatoto_gamelists')
        ->select('vid')
        ->where('status_vendor', 1)
        ->distinct()
        ->get();

        $vendorIds = $games->pluck('vid');

        $vendor = Vendor::select('vendor_name', 'image_url_vendor')->whereIn('id', $vendorIds)->get();
        return response()->json([
            'vendor' => $vendor
        ]);
    }
    public function prediksiByVendor(Request $request)
    {
        $vendor = session('vendor');
        $page = $request->get('page', 1);
        $imageUrl = Vendor::select('image_url_vendor')->where('vendor_name', $vendor)->first()->image_url_vendor;

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

        $imageUrl = Vendor::select('image_url_vendor')->where('vendor_name', $vendor)->first()->image_url_vendor;

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

}
