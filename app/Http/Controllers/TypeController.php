<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();

        return view("type.index", compact("types"));
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'string|required'
        ]);

        Type::create($attributes);

        return redirect('/types');
    }

    public function show(Type $type)
    {
        return view('type.show', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $validated = $request->validate([
            'name' => 'string|required'
        ]);

        $type->update($validated);

        return response($type->toArray(), 204);
    }

    public function destroy(Type $type)
    {
        $type->delete();

        return response(null, 204);
    }
}
