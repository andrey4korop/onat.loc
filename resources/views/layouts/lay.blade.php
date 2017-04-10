<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Система розрахунку чисельності студентів</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/pushy.css">
    <!-- Custom Fonts -->
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

@yield('style')
    <style>
        aside{
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 1050;
            width: 300px;
        }
        #help{
            display: none;
              opacity: 0.7;
            margin-top: 20px;

        }
        #help_button{
            width: 300px;
        }
        #send{
                margin-bottom: 10px;
                margin-top: 10px;
        }
        textarea{width:300px;}
        
    </style>

</head>

<body>
<nav class="pushy pushy-left">
    <div class="pushy-content">
        <ul>
            @foreach($menus as $menu)
                <li><a href="{{ route($menu->url)  }}">{{$menu->menu}}</a></li>
            @endforeach
            <li><a href="#" onclick="postToUrl('{{ route('logout')  }}', {'_token':'{{ csrf_token() }}'}, 'POST')">Вихід із системи</a></li>
        </ul>
    </div>
</nav>
<!— Navigation —>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form id="logout-form" action="{{ route('logout')  }}" method="POST">
                {{ csrf_field() }}
                <button type="button" class="menu-btn btn btn-primary" style="border-bottom-width: 1px;margin-bottom: 10px;margin-top: 10px;">&#9776; Меню</button>


                @yield('header')

            </form>

        </div>
        <!— /.navbar-collapse —>
    </div>
    <!— /.container —>
</nav>

<!-- Page Content -->
@yield('content')
<!-- /.container -->
<aside>
    <button id="help_button" class="btn btn-primary" type="button">Повідомити про помилку!</button>
    <form id="help" action="{{route('send_help')}}" method="POST">
        {{ csrf_field() }}
        <textarea name="text"  rows="10"></textarea>
        <button id="send" class="btn btn-primary" type="button">Відправити</button>
    </form>
<div id="res"></div>

</aside>
<!-- jQuery -->
<script src="/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/js/bootstrap.min.js"></script>

<script src="/js/pushy.min.js"></script>
@yield('scripts')
<script>
    $('body').on('click', '#help_button', function () {
        $('#help').slideToggle("slow");
    });

    $('body').on('click', '#send', function () {
        $.ajax({
            type: 'POST',
            url: $('#help').first().attr('action'),
            data: $('#help').serialize(),
            success: function(data) {
                $('#help').slideToggle("slow");
                $('#res').append('<p>mail send</p>');
                setTimeout(function(){
                    $("#res p").remove();
                }, 3000);
            },
            error:  function(xhr, str){
                $('#help').slideToggle("slow");
                $('#res').append('<p>Error ;(</p>');
                setTimeout(function(){
                    $("#res p").remove();
                }, 3000);
            }
        });
    });




    function postToUrl(path, params, method) {
        method = method || "post"; // Устанавливаем метод отправки.

        var form = document.createElement("form");
        form.setAttribute("method", method);
        form.setAttribute("action", path);
        for(var key in params) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
        }

        document.body.appendChild(form);
        form.submit();
    }
</script>
</body>

</html>
