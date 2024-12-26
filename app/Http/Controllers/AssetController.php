<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::all();

        return view("asset.index", compact("assets"));
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'string|required'
        ]);

        Asset::create($attributes);

        return redirect('/assets');
    }

    public function show(Asset $asset)
    {
        return view('asset.show', compact('asset'));
    }

    public function update(Request $request, Asset $asset)
    {
        $validated = $request->validate([
            'name' => 'string|required'
        ]);

        $asset->update($validated);

        return response($asset->toArray(), 204);
    }

    public function destroy(Asset $asset)
    {
        $asset->delete();

        return response(null, 204);
    }
}
