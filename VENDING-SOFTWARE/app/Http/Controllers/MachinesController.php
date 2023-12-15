<?php

namespace App\Http\Controllers;

use App\Models\Machines;
use Illuminate\Http\Request;

class MachinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validatedData = $request->validate([
            'm_name' => 'required|string',
            // 'installation_date' => 'required|string',
            // 'expiry_date' => 'required|string',
            'address' => 'required|string',

        ]);

        // Handle image upload if it's included in the form

        // Create a new machine record in the database
        Machines::create($validatedData);

        return redirect()->back()->with('success', 'Machine data has been saved successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Machines  $machines
     * @return \Illuminate\Http\Response
     */
    public function show(Machines $machines)
    {
        $data = Machines::all();
        return view('contents/vending_machines', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Machines  $machines
     * @return \Illuminate\Http\Response
     */
    public function edit(Machines $machines)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Machines  $machines
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Machines $machines)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Machines  $machines
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Machines::destroy($id);
        return redirect('vending_machines')->with('flash_message', 'Machine deleted!');
    }
}
