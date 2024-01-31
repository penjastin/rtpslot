<?php

namespace App\Http\Controllers;

use App\Models\Gamelists;
use App\Models\Danatoto;
use App\Models\Dingdongtogel;
use App\Models\Fiatogel;
use App\Models\Gengtoto;
use App\Models\Goltogel;
use App\Models\Hometogel;
use App\Models\Indratogel;
use App\Models\Jonitogel;
use App\Models\Linetogel;
use App\Models\Lunatogel;
use App\Models\Mariatogel;
use App\Models\Nanastoto;
use App\Models\Oppatoto;
use App\Models\Partaitogel;
use App\Models\Patihtoto;
use App\Models\Protogel;
use App\Models\Pwvip4d;
use App\Models\Situstoto;
use App\Models\Togelon;
use App\Models\Togelup;
use App\Models\Udintogel;
use App\Models\Yoktogel;
use App\Models\Yowestogel;
use App\Models\Ziatogel;
use App\Models\Indrabet;
use App\Models\Wdbos;
use App\Models\Sitelist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class GamelistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->site_permission !== '1') {
            // Redirect or show an error message for unauthorized access
            abort(403);
        }
        return view('tambah_game');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insertdata(Request $request)
    {
        try {

            $gameModels = ['\App\Models\Danatoto', '\App\Models\Dingdongtogel', '\App\Models\Fiatogel', '\App\Models\Gengtoto', '\App\Models\Goltogel', '\App\Models\Hometogel', '\App\Models\Indratogel', '\App\Models\Jonitogel', '\App\Models\Linetogel', '\App\Models\Lunatogel', '\App\Models\Mariatogel', '\App\Models\Nanastoto', '\App\Models\Oppatoto', '\App\Models\Partaitogel', '\App\Models\Patihtoto', '\App\Models\Protogel', '\App\Models\Pwvip4d', '\App\Models\Situstoto', '\App\Models\Togelon', '\App\Models\Togelup', '\App\Models\Udintogel', '\App\Models\Yoktogel', '\App\Models\Yowestogel', '\App\Models\Ziatogel', '\App\Models\Indrabet', '\App\Models\Wdbos','\App\Models\Jpslot','\App\Models\Jutawanbet','\App\Models\Latoto','\App\Models\Zeusslot','\App\Models\Gamelists'];


            $images = $request->file('image_url');
            $imageUrls = [];

            if ($request->hasFile('image_url')){
                foreach ($images as $image) {
                $nama_file= $image->getClientOriginalName();
                $nama_game = pathinfo($nama_file,PATHINFO_FILENAME);
                $selectionOptions = [1 => 'pragmatic', 2 => 'habanero', 3 => 'idnslot', 4 =>'pg', 5 =>'microgaming', 6 =>'toptren', 7 =>'gmw', 8 =>'limitcity'];
                $selected = $selectionOptions[$request->input('vid')];
                $dir = "rtpslot/$selected";
                $path = \Storage::disk('do_spaces')->putFileAs($dir, $image, $nama_file, 'public');
                $image_url="https://static.hokibagus.club/$path";

                $imageUrls[] = $image_url;
                }
            }

            $reqVid = $request->vid;
            $reqVal =  $request->value;
            $reqPol = $request->pola;

            DB::beginTransaction();

            foreach ($gameModels as $gameModel) {
                foreach ($imageUrls as $imageUrl) {
                $insertModel = new $gameModel;
                $order = $insertModel::count() + 1;
                $nama_game = pathinfo($imageUrl, PATHINFO_FILENAME);

                $insertModel->vid = $reqVid;
                $insertModel->game_name = $nama_game;
                $insertModel->image_url = $imageUrl;
                $insertModel->value =  $reqVal;
                $insertModel->pola = $reqPol;
                $insertModel->order = $order;
                $insertModel->save();
                }
            }

            DB::commit();
            // return response()->json($insert, 200);
            return redirect('/')->with('success', 'Tambah Data Game Berhasil');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            // dd($th);
        }
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGamelistsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGamelistsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gamelists  $gamelists
     * @return \Illuminate\Http\Response
     */
    public function show(Gamelists $gamelists)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gamelists  $gamelists
     * @return \Illuminate\Http\Response
     */
    public function edit(Gamelists $gamelists)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGamelistsRequest  $request
     * @param  \App\Models\Gamelists  $gamelists
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGamelistsRequest $request, Gamelists $gamelists)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gamelists  $gamelists
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gamelists $gamelists)
    {
        //
    }
}
