<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\Reslot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReslotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('https://retoolapi.dev/SII5b3/data', ['cache' => 0]);

        if ($response->successful()) {
            $dataslot = $response->json();
            // dd($dataslot);
            foreach ($dataslot as $slot) {
                Reslot::updateOrCreate(
                    [
                        'id_slots' => $slot['id'],
                    ],
                    [
                        'slot' => $slot['slot'] ?? null,
                        'date' => $slot['date'] ?? null,
                        'adddress' => $slot['adddress'] ?? null,
                        'location' => $slot['location'] ?? null,
                    ]
                );
            }

            $reslotData = Reslot::all();

            return view('welcome', compact('reslotData'));
        } else {
            $statusCode = $response->status();
            $errorMessage = $response->body();
            return response()->json(['error' => $errorMessage], $statusCode);
        }
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
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reslot  $reslot
     * @return \Illuminate\Http\Response
     */
    public function show(Reslot $reslot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reslot  $reslot
     * @return \Illuminate\Http\Response
     */
    public function edit(Reslot $reslot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reslot  $reslot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reslot $reslot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reslot  $reslot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reslot $reslot)
    {
        //
    }
}
