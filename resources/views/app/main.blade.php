<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ route('auto') }}">
        <input type="text" name="login">
        <input type="password" name="pass">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit">
    </form>
</body>
</html>