<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuscriptionRequest;
use App\Http\Requests\UpdateSuscriptionRequest;
use App\Models\State;
use App\Models\Suscription;
use Illuminate\Http\Request;

class SuscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $email = $request->get('email');

        $state_id = $request->get('state_id');

        $states = State::get();

        $suscriptions = Suscription::orderBy('id','desc')
                        ->where('deleted',Suscription::ACTIVE)
                        ->filterByEmail($email)
                        ->filterByState($state_id)
                        ->paginate(5);

        return view('suscription.index', compact('suscriptions','email','states','state_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suscription = new Suscription();
        $states = State::get();
        return view('suscription.create', compact('suscription','states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreSuscriptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuscriptionRequest $request)
    {
        Suscription::create($request->all());      
        return redirect()->route('suscriptions.index')->with('success', 'Registro creado.');

    }  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suscription  $suscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Suscription $suscription)
    {
        $states = State::get();
        return view('suscription.edit', compact('suscription','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateSuscriptionRequest  $request
     * @param  \App\Models\Suscription  $suscription
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSuscriptionRequest $request, Suscription $suscription)
    {
        $suscription->update($request->all());
        return redirect()->route('suscriptions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suscription  $suscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suscription $suscription)
    {
        $suscription->deleted = Suscription::DELETED;
        $suscription->save();
        return redirect()->route('suscriptions.index')->with('success', 'Registro eliminado satisfactoriamente.');
    }
}
