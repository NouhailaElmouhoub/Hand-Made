<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Bols;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBolsController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - bols -Hand-made";
        $viewData["bols"] = Bols::all();
        return view('admin.bol.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        Bols::validate($request);

        $newbol = new Bols();
        $newbol->setName($request->input('name'));
        $newbol->setDescription($request->input('description'));
        $newbol->setPrice($request->input('price'));
        $newbol->setImage("game.png");
        $newbol->save();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' .$request->file('image')->getClientOriginalExtension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newbol->setImage($imageName);
            $newbol->save();
        }

        return back();
    }

    public function delete($id)
    {
        Bols::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit bol - Hand-made";
        $viewData["bol"] = Bols::findOrFail($id);
        return view('admin.bol.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        Bols::validate($request);

        $bol = Bols::findOrFail($id);
        $bol->setName($request->input('name'));
        $bol->setDescription($request->input('description'));
        $bol->setPrice($request->input('price'));

        if ($request->hasFile('image')) {
            $imageName = time() . '.' .$request->file('image')->getClientOriginalExtension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $bol->setImage($imageName);
        }

        $bol->save();
        return redirect()->route('admin.bol.index');
    }
}
