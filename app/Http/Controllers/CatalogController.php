<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $catalogs =(object)
        [
            'id'=> 123,
            'title'=> 'компьютер',
            'content'=>'купи копьютер',
            'price'=>'1000',
            'count'=>'4',
        ];
        $catalog = array_fill(0,10,$catalogs);;
        return view('catalog.index',compact('catalog'));

    }
    public function show($catalogs)
    {
        $catalogs =(object)
        [
            'id'=> 123,
            'title'=> 'компьютер',
            'content'=>'купи копьютер',
            'price'=>'1000',
            'count'=>'4',
        ];
        return view('catalog.show',compact('catalogs'));
    }
}
