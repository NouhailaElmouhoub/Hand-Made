<?php

namespace App\Http\Controllers;

use App\Models\Bols;
use Illuminate\Http\Request;

class BolsController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "assiets - Hand-made";
        $viewData["subtitle"] =  "List of Bols";
        $viewData["bols"] = Bols::all();
        return view('bol.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $bol = Bols::findOrFail($id);
        $viewData["title"] = $bol->getName()." - Hand-made";
        $viewData["subtitle"] =  $bol->getName()." - bol information";
        $viewData["bol"] = $bol;
        return view('bol.show')->with("viewData", $viewData);
    }
}
