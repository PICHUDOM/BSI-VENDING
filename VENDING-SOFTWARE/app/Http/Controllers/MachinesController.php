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
            'address' => 'required|string',
            'installation_date' => 'required|date',
            'expiry_date' => 'required|date',
            'm_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'slot' => 'required|int',
            // 'province' => 'required|string',
            // 'district' => 'required|string',
            // 'commune' => 'required|string',
            // 'village' => 'required|string',

        ]);
        if ($request->hasFile('m_image')) {
            $image = $request->file('m_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
            $validatedData['m_image'] = 'images/' . $imageName; // Store the path relative to the public directory
        }

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
