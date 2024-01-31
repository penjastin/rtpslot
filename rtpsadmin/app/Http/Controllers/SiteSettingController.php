<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Sitelist;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->sites->site_name == 'all'){
            $sites = Sitelist::select('id','site_name','site_url')->get()->keyBy('id')->toArray();
        } else {
            $sites = auth()->user()->sites->toArray();
        }


        return view('site_settings',compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     try {
    //         // $extension = $request->file('uploaded_bg')->extension();
    //     $file = $request->file('uploaded_bg');
    //     $nama_file= $file->getClientOriginalName();
    //     $mimeType = $file->getMimeType();
    //     $nama_situs = 'danatoto';
    //     $dir = "$nama_situs/rtpslot";
    //     // $path = \Storage::disk('do_spaces')->putFileAs($sites[$id]['site_name'].'/rtpslot', $file, $nama_file, 'public');
    //     $path = \Storage::disk('do_spaces')->putFileAs($dir,$file, $nama_file, 'public');

    //     // return back()->with('success_message', 'Upload Background sudah berhasil');
    //     return env('DO_SPACES_PUBLIC').$path;
    //     } catch (\Throwable $th) {
    //         return dd($th);
    //     }
    // }

    // public function testing(){
    //     $directories = \Storage::disk('do_spaces')->directories("situs");
    //     dd($directories);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->sites->site_name == 'all'){
            $sites = Sitelist::get()->keyBy('id')->toArray();
            if(!isset($sites[$id])){
                return abort(404);
            }
        } else if ((auth()->user()->sites->site_name != 'all') && (auth()->user()->sites->id != $id)) {
            return abort(404);
        } else {
            $sites[$id] = auth()->user()->sites->toArray();
        }

        return view('site_settings',compact('sites','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'site_url' => ['string','url'],
            'site_title' => ['string'],
            'site_description' => ['string'],
            'site_marquee' => ['string'],
            'logo_url' => ['string','url'],
            'ads_url' => ['string','url'],
            'bg_url' => ['string','url'],
            'payment' => 'int',
            'togel_prediction' => 'int',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        try {
            $bg_url = $request->bg_url;
            $ads_url = $request->ads_url;
            $payment = $request->payment;
            $togel_prediction = $request->togel_prediction;
            if ($request->hasFile('bg_urlfile')){

                $file = $request->file('bg_urlfile');
                $nama_file= $file->getClientOriginalName();
                $mimeType = $file->getMimeType();
                $nama_situs = $request->nama_situs;
                $dir = "$nama_situs/rtpslot";
                // $path = \Storage::disk('do_spaces')->putFileAs($sites[$id]['site_name'].'/rtpslot', $file, $nama_file, 'public');
                $path = \Storage::disk('do_spaces')->putFileAs($dir, $file, $nama_file, 'public');
                $bg_url="https://static.hokibagus.club/$path";
            }

            if ($request->hasFile('ads_urlfile')){

                $file_ads = $request->file('ads_urlfile');
                $nama_file_ads= $file_ads->getClientOriginalName();
                $mimeType = $file_ads->getMimeType();
                $nama_situss = $request->nama_situs;
                $dirs = "$nama_situss/rtpslot";
                // $path = \Storage::disk('do_spaces')->putFileAs($sites[$id]['site_name'].'/rtpslot', $file, $nama_file, 'public');
                $path_ads = \Storage::disk('do_spaces')->putFileAs($dirs, $file_ads, $nama_file_ads, 'public');
                $ads_url="https://static.hokibagus.club/$path_ads";
            }


            $input_data = [
                'site_url' => $request->input('site_url'),
                'site_title' => $request->input('site_title'),
                'site_description' => $request->input('site_description'),
                'site_marquee' => $request->input('site_marquee'),
                'logo_url' => $request->input('logo_url'),
                'ads_url' => $ads_url,
                'bg_url' => $bg_url,
                'payment' => $payment,
                'togel_prediction' => $togel_prediction,
            ];

            $update = Sitelist::where('id',$id)->update($input_data);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->withErrors($th->getMessage());
        }
        if($update){
            return redirect()->back()->with('success', 'Site settings has been updated successfully.');
        } else {
            return redirect()->back()->withInput()->withErrors('No data updated');
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
