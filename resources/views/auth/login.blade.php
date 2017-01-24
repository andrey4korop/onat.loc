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

<div class="container">
    <div class="alert alert-success hidden" id="success-alert">
        <h2>Успіх</h2>
        <div>Вхід виконано успішно</div>
    </div>
    <!-- Кнопка для открытия модального окна -->

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
            <button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#myModal">Вхід в систему</button>
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
            <h2 class="page-header">Service List</h2>
        </div>
        <div class="col-md-4">
            <div class="media">
                <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                        </span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Service One</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                </div>
            </div>
            <div class="media">
                <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-car fa-stack-1x fa-inverse"></i>
                        </span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Service Two</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                </div>
            </div>
            <div class="media">
                <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-support fa-stack-1x fa-inverse"></i>
                        </span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Service Three</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="media">
                <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-database fa-stack-1x fa-inverse"></i>
                        </span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Service Four</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                </div>
            </div>
            <div class="media">
                <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-bomb fa-stack-1x fa-inverse"></i>
                        </span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Service Five</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                </div>
            </div>
            <div class="media">
                <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-bank fa-stack-1x fa-inverse"></i>
                        </span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Service Six</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="media">
                <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-paper-plane fa-stack-1x fa-inverse"></i>
                        </span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Service Seven</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                </div>
            </div>
            <div class="media">
                <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-space-shuttle fa-stack-1x fa-inverse"></i>
                        </span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Service Eight</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                </div>
            </div>
            <div class="media">
                <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-recycle fa-stack-1x fa-inverse"></i>
                        </span>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Service Nine</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
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

<!-- Подлючаем библиотеку jQuery -->
<script src="/assets/demo/jquery/jquery-1.11.2.min.js"></script>
<!-- Подлючаем js файл Bootstrap -->
<script src="/assets/demo/bootstrap-3/js/bootstrap.min.js"></script>

<script>
   /* $(function() {
        //при нажатии на кнопку с id="save"
        $('#save').click(function() {
            //переменная formValid
            var formValid = true;
            //перебрать все элементы управления input
            $('input').each(function() {
                //найти предков, которые имеют класс .form-group, для установления success/error
                var formGroup = $(this).parents('.form-group');
                //найти glyphicon, который предназначен для показа иконки успеха или ошибки
                var glyphicon = formGroup.find('.form-control-feedback');
                //для валидации данных используем HTML5 функцию checkValidity
                if (this.checkValidity()) {
                    //добавить к formGroup класс .has-success, удалить has-error
                    formGroup.addClass('has-success').removeClass('has-error');
                    //добавить к glyphicon класс glyphicon-ok, удалить glyphicon-remove
                    glyphicon.addClass('glyphicon-ok').removeClass('glyphicon-remove');
                } else {
                    //добавить к formGroup класс .has-error, удалить .has-success
                    formGroup.addClass('has-error').removeClass('has-success');
                    //добавить к glyphicon класс glyphicon-remove, удалить glyphicon-ok
                    glyphicon.addClass('glyphicon-remove').removeClass('glyphicon-ok');
                    //отметить форму как невалидную
                    formValid = false;
                }
            });
            //если форма валидна, то
            if (formValid) {
                //сркыть модальное окно
                $('#myModal').modal('hide');
                //отобразить сообщение об успехе
                $('#success-alert').removeClass('hidden');
            }
        });
    });*/
</script>

</body>

</html>
