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
            bottom: 10px;
            right: 10px;
            z-index: 101;
            width: 300px;
        }
        #help{
            display: none;
              opacity: 0.7; 
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

<!— Navigation —>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary" style="border-bottom-width: 1px;margin-bottom: 10px;margin-top: 10px;">Вихід із системи</button>
                <button type="button" onClick='location.href="{{route('home')}}"'  class="btn btn-primary" style="border-bottom-width: 1px;margin-bottom: 10px;margin-top: 10px;">Інструкція</button>
                <button type="button" onClick='location.href="{{route('arhive')}}"' class="btn btn-primary" style="border-bottom-width: 1px;margin-bottom: 10px;margin-top: 10px;">Архів</button>
                <button type="button" onClick='location.href="{{route('editnorms')}}"' class="btn btn-primary" style="border-bottom-width: 1px;margin-bottom: 10px;margin-top: 10px;">Змінити норми</button>
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
    <form id="help" action="{{route('send_help')}}" method="POST">
        {{ csrf_field() }}
        <textarea name="text"  rows="10"></textarea>
        <button id="send" class="btn btn-primary" type="button">Відправити</button>
    </form>
<div id="res"></div>
    <button id="help_button" class="btn btn-primary" type="button">Повідомити про помилку!</button>
</aside>
<!-- jQuery -->
<script src="/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/js/bootstrap.min.js"></script>
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
</script>
</body>

</html>
