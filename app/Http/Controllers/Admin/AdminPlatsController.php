<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Plats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPlatsController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - plats -Hand-made";
        $viewData["plats"] = Plats::all();
        return view('admin.plat.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        Plats::validate($request);

        $newplat = new Plats();
        $newplat->setName($request->input('name'));
        $newplat->setDescription($request->input('description'));
        $newplat->setPrice($request->input('price'));
        $newplat->setImage("game.png");
        $newplat->save();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' .$request->file('image')->getClientOriginalExtension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newplat->setImage($imageName);
            $newplat->save();
        }

        return back();
    }

    public function delete($id)
    {
        Plats::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit plat - Hand-made";
        $viewData["plat"] = Plats::findOrFail($id);
        return view('admin.plat.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        Plats::validate($request);

        $plat = Plats::findOrFail($id);
        $plat->setName($request->input('name'));
        $plat->setDescription($request->input('description'));
        $plat->setPrice($request->input('price'));

        if ($request->hasFile('image')) {
            $imageName = time() . '.' .$request->file('image')->getClientOriginalExtension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $plat->setImage($imageName);
        }

        $plat->save();
        return redirect()->route('admin.plat.index');
    }
}
