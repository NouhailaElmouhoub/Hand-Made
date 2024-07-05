<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AdminPromoController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - promo -Hand-made";
        $viewData["promo"] = Promo::all();
        return view('admin.promo.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        Promo::validate($request);

        $newpromo = new Promo();
        $newpromo->setName($request->input('name'));
        $newpromo->setDescription($request->input('description'));
        $newpromo->setPrice($request->input('price'));
        $newpromo->setImage("game.png");
        $newpromo->save();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' .$request->file('image')->getClientOriginalExtension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newpromo->setImage($imageName);
            $newpromo->save();
        }

        return back();
    }

    public function delete($id)
    {
        Promo::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit promo - Hand-made";
        $viewData["promo"] = Promo::findOrFail($id);
        return view('admin.promo.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        Promo::validate($request);

        $promo = Promo::findOrFail($id);
        $promo->setName($request->input('name'));
        $promo->setDescription($request->input('description'));
        $promo->setPrice($request->input('price'));

        if ($request->hasFile('image')) {
            $imageName = time() . '.' .$request->file('image')->getClientOriginalExtension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $promo->setImage($imageName);
        }

        $promo->save();
        return redirect()->route('admin.promo.index');
    }
}
