<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
        public function index()
    {
        $viewData = [];
        $viewData["title"] = "Products - Hand-made";
        $viewData["subtitle"] =  "List of products";
        $viewData["promos"] = Promo::all();
        return view('promo.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $promo = Promo::findOrFail($id);
        $viewData["title"] = $promo->getName()." - Hand-made";
        $viewData["subtitle"] =  $promo->getName()." - Promo information";
        $viewData["promo"] = $promo;
        return view('promo.show')->with("viewData", $viewData);
    }
}
