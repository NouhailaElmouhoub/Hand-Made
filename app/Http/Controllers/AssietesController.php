<?php

namespace App\Http\Controllers;

use App\Models\Assietes;
use Illuminate\Http\Request;

class AssietesController extends Controller
{
   
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "assiets - Hand-made";
        $viewData["subtitle"] =  "List of assiets";
        $viewData["assiets"] = Assietes::all();
        return view('assiete.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $assiete = Assietes::findOrFail($id);
        $viewData["title"] = $assiete->getName()." - Hand-made";
        $viewData["subtitle"] =  $assiete->getName()." - assiete information";
        $viewData["assiete"] = $assiete;
        return view('assiete.show')->with("viewData", $viewData);
    }
}
