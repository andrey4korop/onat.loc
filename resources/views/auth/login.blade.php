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

</head>

<body>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Заголовок модального окна -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title" id="myModalLabel">Вхід в систему</h4>
            </div>
            <!-- Основная часть модального окна, содержащая форму для регистрации -->
            <form role="form" class="form-horizontal" action="{{ url('/login') }}" method="POST">
            <div class="modal-body">
                <!-- Форма для регистрации -->

                {{ csrf_field() }}
                    <!-- Блок для ввода логина -->
                    <div class="form-group has-feedback">
                        <label for="login" class="control-label col-xs-3">Логін:</label>
                        <div class="col-xs-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" class="form-control" required="required" name="login" pattern="[A-Za-z]{3,}">
                            </div>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                    </div>
                    <!-- Блок для ввода email -->
                    <div class="form-group has-feedback">
                        <label for="email" class="control-label col-xs-3">Пароль:</label>
                        <div class="col-xs-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password" class="form-control" required="required" name="password">
                            </div>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                    </div>
                    <!-- Конец блока для ввода email-->

            </div>
            <!-- Нижняя часть модального окна -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Відмінити</button>
                <button id="save" type="submit" class="btn btn-primary">Ввійти</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->


        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-top: 8px">Вхід в систему</button>
            <button type="button" class="btn btn-primary" onclick="location.href='{{route('spravki')}}'" style="margin-top: 8px">#Spravki#</button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->

        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Header Carousel -->
<header id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <div class="fill" style="background-image:url('http://www.arconsulting.com.ua/obuchenie/obuchenie.jpg');"></div>
            <div class="carousel-caption">
                <h2></h2>
            </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('https://msb.khabkrai.ru/media/news/adult-learning3-small.jpg');"></div>
            <div class="carousel-caption">
                <h2></h2>
            </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('http://galaxycollege.ru/images/buhuchet2.jpg');"></div>
            <div class="carousel-caption">
                <h2></h2>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</header>

<!-- Page Content -->
<div class="container">

    <!-- Marketing Icons Section -->

    <!-- /.row -->

    <!-- Portfolio Section -->

    <!-- /.row -->

    <!-- Features Section -->

    <!-- /.row -->



    <!-- Call to Action Section -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Переваги online-системи розрахунку чисельності студентів</h2>
        </div>
        <div class="col-md-4">
            <div class="media">
                <div class="pull-left">
<span class="fa-stack fa-2x">
<i class="fa fa-circle fa-stack-2x text-primary"></i>
<i class="fa fa-exclamation fa-stack-1x fa-inverse"></i>
</span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Унікальність</h4>
                    <p>Система гарантує якісний і точний розрахунок даних.</p>
                </div>
            </div>
            <div class="media">
                <div class="pull-left">
<span class="fa-stack fa-2x">
<i class="fa fa-circle fa-stack-2x text-primary"></i>
<i class="fa fa-clock-o fa-stack-1x fa-inverse"></i>
</span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Швидкість</h4>
                    <p>Система дозволяє дуже швидко виконати необхідні розрахунки.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="media">
                <div class="pull-left">
<span class="fa-stack fa-2x">
<i class="fa fa-circle fa-stack-2x text-primary"></i>
<i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
</span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Легкість</h4>
                    <p>Не потрібно бути досвідченим користувачем, щоб користуватися системою.</p>
                </div>
            </div>
            <div class="media">
                <div class="pull-left">
<span class="fa-stack fa-2x">
<i class="fa fa-circle fa-stack-2x text-primary"></i>
<i class="fa fa-save fa-stack-1x fa-inverse"></i>
</span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Експорт</h4>

                    <p>Система дозволяє експортувати дані до файлів формату Excel, PDF та на електронну пошту.</p>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="media">
                <div class="pull-left">
<span class="fa-stack fa-2x">
<i class="fa fa-circle fa-stack-2x text-primary"></i>
<i class="fa fa-lock fa-stack-1x fa-inverse"></i>
</span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Конфіденційність</h4>
                    <p>Гарантії захисту інформації, що містяться в даній системі.</p>
                </div>
            </div>
            <div class="media">
                <div class="pull-left">
<span class="fa-stack fa-2x">
<i class="fa fa-circle fa-stack-2x text-primary"></i>
<i class="fa fa-print fa-stack-1x fa-inverse"></i>
</span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Друкування</h4>
                    <p>Система дозволяє в режимі online друк документів.</p>
                </div>
            </div>

        </div>
    </div>

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>&copy; 2016 Одеська національна академія зв'язку імені О.С.Попова</p>
            </div>
        </div>
    </footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/js/bootstrap.min.js"></script>

<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>

</body>

</html>
