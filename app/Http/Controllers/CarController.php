<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class CarController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::orderBy('id', 'asc')->paginate(10);
        return view('car.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('car.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'model' => 'required|max:255',
            'color' => 'required|max:255',
            'price' => 'required'
        ]);

        Car::create($data);

        return redirect()->route('car');
    }

    public function update(Request $request, Car $car)
    {
        $data = $request->validate([
            'model' => 'required|max:255',
            'color' => 'required|max:255',
            'price' => 'required',
        ]);
        $car->update($data);
        return redirect()->route('car');
    }

    public function destroy(Request $request, Car $car)
    {
        $id = $request->id;
        $destroy = Car::findOrFail($id);
        $destroy->delete();
        return redirect()->route('car');
    }
}
