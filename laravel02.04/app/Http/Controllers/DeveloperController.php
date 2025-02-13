<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{

    static function index(){
        $developers = Developer::all();
        return view('welcome',["developers"=>$developers]);

    }

    static function create(Request $request){
        $developers = new Developer([
            "name"=>$request->name,
        ]);

        $developers->save();
        return redirect("/");
    }

    static function destroy(Request $request,$id){
        $developer = Developer::find($id);
        $developer->delete();
        return redirect("/");
    }
}
