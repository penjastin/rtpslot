<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Gamelists;
use App\Models\Sitelist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        $id = preg_replace('/[^0-9]/', '', $id);
        $site_name = '';
        $results = '';
        $count = 0;
        $getData = false;
        $sites = Sitelist::select('id', 'site_name', 'site_url')->get()->keyBy('id')->toArray();

        if (auth()->user()->sites->site_name != 'all' && !empty($id)) {
            return abort(404);
        } else if (auth()->user()->sites->site_name != 'all') {
            $table_name = $sites[auth()->user()->site_permission]['site_name'] . "_gamelists";
            $getData = true;
        } else if (!empty($id)) {
            $table_name = $sites[$id]['site_name'] . "_gamelists";
            $getData = true;
        }

        if ($getData == true) {
            $results = DB::table($table_name)->orderBy('order', 'ASC')->get();
            $results = json_decode(json_encode($results), true);


            $count = count($results);
        }

        return view('dashboard', ['results' => $results, 'count' => $count, 'sites' => $sites, 'id' => $id]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {
        // dd($request->all(),$id);
        $validator = Validator::make($request->all(), [
            'rtp_value.*' => ['required', 'numeric', 'min:1', 'max:100'],
            'pola_rtp.*' => ['string'],

        ], [
            // 'rtp_value.*.required' => 'RTP Value field of :index and :position is required',
            // 'rtp_value.*.numeric' => 'RTP Value must be a number',
            // 'rtp_value.*.min' => 'RTP Value must be at least :min',
            // 'rtp_value.*.max' => 'RTP Value must not be greater than :max',
        ]);
        if ($validator->fails()) {
            return redirect('dashboard')->withErrors($validator)->withInput();
        }
        $case = "(case";
        $sts_game = "(case";
        $pola = "(case";
        $pola_rtp = $request->input('pola_rtp');

        $checkedVids = $request->input('status_vendor', []);
        $uncheckedVids = array_diff(['1','2', '3', '4', '5', '6', '7', '8'], $checkedVids);

        foreach ($request->input('rtp_value') as $key => $value) {
            $case .= " when id = " . strval($key + 1) . " then " . strval($value);
            $pola .= " when id = " . strval($key + 1) . " then \"" . htmlentities($pola_rtp[$key]) . "\"";
        }
        foreach ($request->input('status_game') as $key => $value2) {
            // if($value2 == null) "0";
            $sts_game .= " when id = " . strval($key + 1) . " then " . strval($value2);
        }

        $case .= " end)";
        $sts_game .= " end)";
        $pola .= " end)";
        try {
            $sites = Sitelist::select('id', 'site_name', 'site_url')->get()->keyBy('id')->toArray();
            if (auth()->user()->sites->site_name != 'all') {
                $table_name = $sites[auth()->user()->site_permission]['site_name'] . "_gamelists";
                $getData = true;
            } else if (!empty($id)) {
                $table_name = $sites[$id]['site_name'] . "_gamelists";
                $getData = true;
            }

            DB::beginTransaction();

            DB::table($table_name)->whereIn('vid', $uncheckedVids)->update(['status_vendor' => 0]);
            DB::table($table_name)->whereIn('vid', $checkedVids)->update(['status_vendor' => 1]);
            $update = DB::table($table_name)->update(['value' => DB::raw($case), 'pola_rtp' => DB::raw($pola), 'status_game' => DB::raw($sts_game)]);

            DB::commit();
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->withErrors($th->getMessage());
        }

        if ($update) {
            return redirect()->back()->with('success', 'Data has been updated successfully.');
        } else {
            return redirect()->back()->withInput()->withErrors('No data updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
    // public function test(Request $request)
    // {
    //     return redirect('test');
    // }


}
