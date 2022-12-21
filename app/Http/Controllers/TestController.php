<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function byName(){
            return "Hello";
    }

    public function cool($name,$age,$id){
        return  " Hello " . $name . $age . $id . " cool ";
    }

    public function about(){
        $name="WAI YAN AUNG ";
        $age= 25;
        return view('about',compact('name','age'));
    }
}
