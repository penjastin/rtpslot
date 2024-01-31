<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Sitelist;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        if (auth()->user()->sites->site_name == 'all'){
            $sites = Sitelist::select('id','site_name','site_url')->get()->keyBy('id')->toArray();
        } else {
            $sites = auth()->user()->sites->toArray();
        }
        return view('berita',compact('berita'));
    }
    public function edit($id)
    {
        $sites = [];

        $berita = [];
        if (auth()->user()->sites->site_name == 'all'){
            $sites = Sitelist::get()->keyBy('id')->toArray();
            $berita = Berita::join('sitelists', 'berita.site', '=', 'sitelists.id')
            ->join('users', 'berita.author', '=', 'users.id')
            ->select('berita.*', 'sitelists.site_name', 'users.name as author_name')
            ->orderBy('berita.id', 'desc')
            ->get();

            if(!isset($sites[$id])){
                return abort(404);
            }
        } else if (auth()->user()->sites->site_name != 'all')  {
            $berita = Berita::join('sitelists', 'berita.site', '=', 'sitelists.id')
            ->join('users', 'berita.author', '=', 'users.id')
            ->select('berita.*', 'sitelists.site_name', 'users.name as author_name')
            ->where('berita.site', $id)
            ->orderBy('berita.id', 'desc')
            ->get();

        }

        return view('berita', compact('sites', 'id', 'berita'));
    }
    public function update(Request $request, $id)
    {

    $data = Berita::find($id);

    $data->judul = $request->judul;
    $data->konten_atas = $request->konten_atas;
    $data->konten_bawah = $request->konten_bawah;



    $data->save();

    // Kembalikan respons atau arahkan pengguna ke halaman yang sesuai
    return redirect()->back()->with('success', 'Data has been updated successfully.');
    }

    public function delete($id)
    {
    $data = Berita::find($id);

    if (!$data) {
        return redirect()->back()->withErrors('Data not found.');
    }
    $data->delete();
    return redirect()->back()->with('success', 'Data has been deleted successfully.');
    }


    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'konten_atas' => 'required',
            'konten_bawah' => 'required',
            'gambar_1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar_2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author' => 'required',
        ]);

        try {

            DB::beginTransaction();
            $insert = new Berita;
            $siteId = $request->site;
            $site = Sitelist::find($siteId);
            $siteName = $site->site_name;


        if ($request->hasFile('gambar_1')) {
                $gambar1 = $request->file('gambar_1');
                $mimeType = $gambar1->getMimeType();
                $dir = "$siteName/bukti_bayar";
                $originalFileName1 = $gambar1->getClientOriginalName();
                $path1 = \Storage::disk('do_spaces')->putFileAs($dir, $gambar1, $originalFileName1, 'public');
                $url_gambar1="https://static.hokibagus.club/$path1";

                //untuk simpan di server
                // $gambar1 = $request->file('gambar_1');
                // $gambar1Path = $gambar1->store('public/images');
                // $gambar1Path = str_replace('public', 'storage', $gambar1Path);
                // $insert->gambar_1 = $gambar1Path;
            }
        if ($request->hasFile('gambar_2')) {
                $gambar2 = $request->file('gambar_2');
                $mimeType = $gambar2->getMimeType();
                $dir = "$siteName/bukti_bayar";
                $originalFileName2 = $gambar2->getClientOriginalName();
                $path2 = \Storage::disk('do_spaces')->putFileAs($dir, $gambar2, $originalFileName2,'public');
                $url_gambar2 = "https://static.hokibagus.club/$path2";

                //untuk simpan di server
                // $gambar2 = $request->file('gambar_2');
                // $gambar2Path = $gambar2->store('public/images');
                // $gambar2Path = str_replace('public', 'storage', $gambar2Path);
                // $insert->gambar_2 = $gambar2Path;
            }

            $insert->site = $request->site;
            $insert->judul = $request->judul;
            $insert->kategori_id = 1;
            $insert->konten_atas = $request->konten_atas;
            $insert->konten_bawah = $request->konten_bawah;
            $insert->author = $request->author;
            $insert->gambar_1 = $url_gambar1;
            $insert->gambar_2 = $url_gambar2;
            $insert->save();

        DB::commit();
            // return response()->json($insert, 200);
            return redirect()->back()->with('success', 'Data has been add successfully.');
        } catch (\Throwable $th) {
            //throw $th;

            DB::rollback();
        }
    }

}
