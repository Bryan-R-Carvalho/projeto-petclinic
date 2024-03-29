<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Owner,
    Pet
};
class PetController extends Controller
{
    private $owner;
    private $pet;
    
    public function __construct(Owner $owner, Pet $pet)
    {
        $this->owner = new $owner;
        $this->pet = new $pet;
    }

    public function index()
    {
        //
    }
    public function show($id)
    {
        $pets = $this->owner->find($id)->pets;
        $owner = $this->owner->find($id);
        return view('pets.show', compact('pets','owner'));
    }
    public function create($id)
    {
        $owner = Owner::findOrFail($id);
        return view('pets.create', compact('owner'));
    }
    public function store(Request $request, $id)
    {
        $data = $request->all();
        $data['owner_id'] = $id;
        $this->pet->create($data);
        return redirect()->route('pets.show', $id);
    }
    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        return view('pets.edit', compact('pet'));
    }
    public function update(Request $request, $id)
    {
        $pet = Pet::findOrFail($id);
        $pet->update($request->all());
        return redirect()->route('pets.show', $id);
    }
    public function destroy($id)
    {
        //
    }
    
}
