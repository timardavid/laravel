<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;


class GameController extends Controller
{
    static function index(){
        $games = Game::all()->get();
        return view('welcome',["games"=>$games]);

    }

    static function edit(Request $request, $id){

        $game = Game::find($id);
        return view('edit',["game"=>$game]);
    }

    static function store(Request $request){
        $genres = [];
        $genre_iterate = 1;
        $gameArray = $request->all();

        while(isset($gameArray["genre-$genre_iterate"])){

            $genres["genre-$genre_iterate"] = $gameArray["genre-$genre_iterate"];
            $genre_iterate += 1;
        }

        $game = new Game([
            "title" => $request->title,
            "developer_id" => $request->developer_id,
            "release_date" => $request->release_date,
            "genre" => json_encode($genres)
            ]
        );

        $game->save();
        return redirect("/");
    }

    static function update(Request $request, $id){

        $title = $request->title;
        $developerId = $request->developer_id;
        $releaseDate = $request->release_date;
        $genre = $request->genre;
        $game = Game::find($id);
        
        $game->title = $title;
        $game->developer_id = $developerId;
        $game->release_date = $releaseDate;
        $game->genre = $genre;

        $game->save();
        return redirect("/");
    }

    static function destroy(Request $request, $id){
        $game = Game::find($id);
        $game->delete();
        return redirect("/");
    }

    static function search(Request $request){
        $title = $request->title;
        $games = Game::where("title","like",'%'.$title.'%')->get();
        return view('welcome',["games"=>$games]);
    }
}