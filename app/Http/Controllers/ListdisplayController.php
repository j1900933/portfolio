<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\engineer;

class ListdisplayController extends Controller
{
    public function index()
    {
        $md = new engineer();
        $data = $md->getData();
        return view('hakobunekensyu/listdisplay/list');
    }

    //public function model()
    //{
       // $md = new engineer();
       // $data = $md->getData();
       // return view('hakobunekensyu/listdisplay/list');
   // }
}
