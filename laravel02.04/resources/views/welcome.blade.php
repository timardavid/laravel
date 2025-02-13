<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Laravel</title>
        @vite('resources/css/welcome.css')
    </head>
    <body>
        
        <h1>Add new game</h1>
        <form method="POST" action="/games">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title"/> <br>
            <label for="developer_id">developer_id</label>      
            <input type="text" name="developer_id"/> <br>
            <label for="release_date">release_date</label>        
            <input type="text" name="release_date"/>  <br>
            <label for="genre">genre</label>       
            <input type="text" name="genre"/>
            <button type="submit">Submit Form</button>
        </form>

        <h1>Add new developer</h1>
        <form method="POST" action="/developers">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name"/> <br>
            
            <button type="submit">Submit Form</button>
        </form>
        <form method="GET" action="/games">
            <button type="submit">
                Get Games
            </button>
        </form>
        <form method="GET" action="/developers">
            <button type="submit">
                Get Developers
            </button>
        </form>
        <br>
        <form method="GET" action="/searchGames">
            <input name="title" type="text"/>
            <button type="submit">Serach for title</button>
        </form>
        @isset($games)
           <table>
            <thead>
                <tr>
                    <td>Game Title</td>
                    <td>Game Developer</td>
                    <td>Release Date</td>
                    <td>Genre</td>
                    <td>Update</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($games as $game)
                <tr>
                <td>{{$game->title}}</td>
                <td>{{$game->developer->name ?? "unkown developer"}}</td>
                <td>{{$game->release_date}}</td>
                <td>
                @isset($game->genre)
                    @foreach ($game->genre["genre"] as $singleGenre)
                        {{$singleGenre}}
                    @endforeach
                @endisset
                
                </td>
                <td>
                    <form action="/games/{{$game->id}}/edit" method="GET">

                        <button type="submit">Update</button>
                    </form>
                    </td>
                <td>
                <form method="POST" action="/games/{{$game->id}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
                </td>
                </tr>
            @endforeach 
            </tbody>
        </table>
         
        @endisset

        @isset($developers)
           <table>
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($developers as $developer)
                <tr>
                <td>{{$developer->name}}</td>
                <td>
                <form method="POST" action="/developers/{{$developer->id}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
                </td>
                </tr>
            @endforeach 
            </tbody>
        </table>
         
        @endisset
        
    </body>
</html>
