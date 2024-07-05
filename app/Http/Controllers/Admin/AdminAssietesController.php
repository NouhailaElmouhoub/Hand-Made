<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Assietes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminAssietesController extends Controller
{
   
    
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - assiets -Hand-made";
        $viewData["assiets"] = Assietes::all();
        return view('admin.assiete.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        Assietes::validate($request);

        $newassiete = new Assietes();
        $newassiete->setName($request->input('name'));
        $newassiete->setDescription($request->input('description'));
        $newassiete->setPrice($request->input('price'));
        $newassiete->setImage("game.png");
        $newassiete->save();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' .$request->file('image')->getClientOriginalExtension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newassiete->setImage($imageName);
            $newassiete->save();
        }

        return back();
    }

    public function delete($id)
    {
        Assietes::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit assiete - Hand-made";
        $viewData["assiete"] = Assietes::findOrFail($id);
        return view('admin.assiete.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        Assietes::validate($request);

        $assiete = Assietes::findOrFail($id);
        $assiete->setName($request->input('name'));
        $assiete->setDescription($request->input('description'));
        $assiete->setPrice($request->input('price'));

        if ($request->hasFile('image')) {
            $imageName = time() . '.' .$request->file('image')->getClientOriginalExtension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $assiete->setImage($imageName);
        }

        $assiete->save();
        return redirect()->route('admin.assiete.index');
    }
}
