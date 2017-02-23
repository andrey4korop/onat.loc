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
    <h1>for personal</h1>
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