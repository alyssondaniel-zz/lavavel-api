<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departament;

class DepartamentController extends Controller
{
    public function index()
    {
        return Departament::all();
    }

    public function show(Departament $departament)
    {
        return $departament;
    }

    public function store(Request $request)
    {
        $departament = Departament::create($request->all());

        return response()->json($departament, 201);
    }

    public function update(Request $request, Departament $departament)
    {
        $departament->update($request->all());

        return response()->json($departament, 200);
    }

    public function delete(Departament $departament)
    {
        $departament->delete();

        return response()->json(null, 204);
    }
}
