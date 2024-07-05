<?php

namespace App\Http\Controllers;

use App\Models\Plats;
use Illuminate\Http\Request;

class PlatsController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "plats - Hand-made";
        $viewData["subtitle"] =  "List of plats";
        $viewData["plats"] =Plats::all();
        return view('plat.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $plat =Plats::findOrFail($id);
        $viewData["title"] = $plat->getName()." - Hand-made";
        $viewData["subtitle"] =  $plat->getName()." - plat information";
        $viewData["plat"] = $plat;
        return view('plat.show')->with("viewData", $viewData);
    }
}
