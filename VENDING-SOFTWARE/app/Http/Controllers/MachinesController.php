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
        $data = Machines::all();
        return view('contents/create/create_machine', compact('data'));
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
            // 'province' => 'required|g©string',
            // 'district' => 'required|string',
            // 'commune' => 'required|string',
            // 'village' => 'required|string',

        ], [
            'm_name.required' => 'Please input Name',
            'address.required' => 'Please input Address',
            'installation_date.required' => 'Please input Installation date',
            'expiry_date.required' => 'Please input Expired Date',
            'slot.required' => 'Please input Slot',
        ]);
        if ($request->hasFile('m_image')) {
            $image = $request->file('m_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
            $validatedData['m_image'] = 'images/' . $imageName; // Store the path relative to the public directory
        }

        Machines::create($validatedData);

        return redirect('/vending_machines')->with('success', 'Machine data has been saved successfully.');
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
        return view('contents/vending_machines', compact('data',));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Machines  $machines
     * @return \Illuminate\Http\Response
     */
    public function edit(Machines $machines, $id)
    {
        //
        $data = Machines::findOrFail($id);
        return view('contents/update/edit_machine', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Machines  $machines
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'm_name' => 'required|string',
            'address' => 'required|string',
            'installation_date' => 'required|date',
            'expiry_date' => 'required|date',
            'slot' => 'required|int',
        ], [
            'm_name.required' => 'Please input Name',
            'address.required' => 'Please input Address',
            'installation_date.required' => 'Please input Installation date',
            'expiry_date.required' => 'Please input Expired Date',
            'slot.required' => 'Please input Slot',
        ]); 
        $machine = Machines::find($id);
        $machine->m_name = $validatedData['m_name'];
        $machine->address = $validatedData['address'];
        $machine->installation_date = $validatedData['installation_date'];
        $machine->expiry_date = $validatedData['expiry_date'];
        $machine->slot = $validatedData['slot'];
        $machine->save();
    
        return redirect('vending_machines')->with('flash_message', 'Machine Updated Successfully');
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
