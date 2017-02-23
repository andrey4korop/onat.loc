<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div>
    <h1>for student</h1>
    <form action="{{route('send_spravka')}}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="id_student" value="{{$id}}">
        <select name="id_type">
            <option value="1">type 1</option>
            <option value="2">type 2</option>
            <option value="3">type 3</option>
            <option value="4">type 4</option>
            <option value="5">type 5</option>
        </select>
        fast?<input name="is_fast" type="checkbox">
        <input type="submit">
    </form>
</div>
<div>
    <ul>
        @forelse($spravki as $spravka)
            <li>
                <a href="{{$spravka->id}}">zapros {{$spravka->id}}</a>
                <p>{{$spravka->id_student}}</p>
                <p>{{$spravka->id_type}}</p>
                <p>{{$spravka->is_fast}}</p>
                <p>{{$spravka->status}}</p>
            </li>
        @empty
            <li>Empty</li>
        @endforelse

    </ul>
</div>
</body>
</html>