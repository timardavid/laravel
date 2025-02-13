<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Laravel</title>
        @vite('resources/css/welcome.css')
    </head>
    <body>
        
        <h1>Update Game</h1>
        <form method="POST" action="/games/{{$game->id}}">
            @csrf
            @method("PATCH")
            <label for="title">Title</label>
            <input type="text" name="title" value="{{$game->title}}"/> <br>
            <label for="developer_id">developer_id</label>      
            <input type="text" name="developer_id" value="{{$game->developer_id ?? ""}}"/> <br>
            <label for="release_date">release_date</label>        
            <input type="text" name="release_date"  value="{{$game->release_date}}"/>  <br>
            {{-- <label for="genre">genre</label>        --}}
            {{-- <input type="text" name="genre" value="{{$game->genre ?? ""}}"/> --}}
            <input type="text" name="id" hidden value={{$game->id}}>
            <button type="submit">Submit Form</button>
        </form>        
    </body>
</html>
