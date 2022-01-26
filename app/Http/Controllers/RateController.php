<?php

namespace App\Http\Controllers;

use App\Package;
use App\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // $j = Rate::where('package_id', '=', $id)
        // ->orderBy('rates', 'asc')
        // ->get();
        // return $j->first();

        $result = Package::with(['rate', 'room'])
            // ->select(DB::raw('(SELECT MIN(rates) FROM rates WHERE package_id = packages.id) as rates'), 'packages.package_name')
            // ->whereHas('rate', function ($q) {
            //      $q->where('rates', DB::raw('(SELECT min(rates) FROM rates WHERE package_id = packages.id ORDER BY rates ASC LIMIT 1)'));
            // })
            ->when($id, function ($query, $id) {
                return $query->where('room_id', $id);
            })

            ->whereHas('rate', function ($q) {
                 $q->where('rates', Rate::where('package_id', '=', 'packages.id')->min('rates'));
            })
            
            ->get();

        return $result;
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
     * @param  \App\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function show(Rate $rate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function edit(Rate $rate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rate $rate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rate $rate)
    {
        //
    }
}
