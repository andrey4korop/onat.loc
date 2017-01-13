<!doctype html>
<html lang="en">
<head>
    <style type="text/css">
        td{
            border: 4px double black;
        }
    </style>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="{{ route('auto') }}" method="POST" >
<table>
    <tr>
        <td><input type="text" name="hh[]"></td>
        <td><input type="text" name="hh[]"></td>
        <td><input type="text" name="hh[]"></td>
        <td><input type="text" name="hh[]"></td>
        <td><input type="text" name="hh[]"></td>
    </tr>
    <tr>
        <td><input type="text" name="hh1[]"></td>
        <td><input type="text" name="hh1[]"></td>
        <td><input type="text" name="hh1[]"></td>
        <td><input type="text" name="hh1[]"></td>
        <td><input type="text" name="hh1[]"></td>
    </tr>
    <input type="submit">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

</table>
</form>
@foreach ($view as $f)
    {{ dump($f->tableg) }}
    @foreach ($f->tableg as $v)

        {{ dump($v) }}
    @endforeach
@endforeach
</body>
</html>