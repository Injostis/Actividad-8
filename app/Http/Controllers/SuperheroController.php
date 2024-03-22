<?php

namespace App\Http\Controllers;

use App\Models\Superhero;
use App\Models\Gender;
use App\Models\Universe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuperheroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['superheroes']=Superhero::paginate(5);
        return view('superhero.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('superhero.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //$superheroData = request()->all();
        $superheroData = request()->except(['_token', 'gender', 'universe']);
        
        $gender = Gender::where('name', $request->gender)->first();
        if ($gender) {
            $superheroData['gender_id'] = $gender->id;
        }
    
        $universe = Universe::where('name', $request->universe)->first();
        if ($universe) {
            $superheroData['universe_id'] = $universe->id;
        }

        if($request->hasFile('photo_url')){
            $superheroData['photo_url']=$request->file('photo_url')->store('uploads','public');
        }


        Superhero::insert($superheroData);


        return redirect('superhero')->with('message', 'Superheroe agregado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Superhero $superhero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $superhero=Superhero::findOrFail($id);

        return view('superhero.edit', compact('superhero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $superheroData = request()->except(['_token','_method', 'gender', 'universe']);
        
        $gender = Gender::where('name', $request->gender)->first();
        if ($gender) {
            $superheroData['gender_id'] = $gender->id;
        }
    
        $universe = Universe::where('name', $request->universe)->first();
        if ($universe) {
            $superheroData['universe_id'] = $universe->id;
        }

        if($request->hasFile('photo_url')){
            $superhero=Superhero::findOrFail($id);
            Storage::delete('public/'.$superhero->photo_url);
            $superheroData['photo_url']=$request->file('photo_url')->store('uploads','public');
        }

        Superhero::where('id','=',$id)->update($superheroData);

        $superhero=Superhero::findOrFail($id);
        return view('superhero.edit', compact('superhero'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $superhero=Superhero::findOrFail($id);
        if(Storage::delete('public/'.$superhero->photo_url)){
            Superhero::destroy($id);
        }
        return redirect('superhero')->with('message', 'Superheroe borrado');
    }
}
