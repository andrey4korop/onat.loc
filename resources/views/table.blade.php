<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Modern Business - Start Bootstrap Template</title>

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
    <style>
        .hideSubject, .hideRowQualification, .addRowQualification{display: none;}
    </style>

</head>

<body>

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
                <a class="navbar-brand" href="{{route('home')}}">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li class="active">
                        <a href="services.html">Services</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Portfolio <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="portfolio-1-col.html">1 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-2-col.html">2 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-3-col.html">3 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-4-col.html">4 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-item.html">Single Portfolio Item</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="blog-home-1.html">Blog Home 1</a>
                            </li>
                            <li>
                                <a href="blog-home-2.html">Blog Home 2</a>
                            </li>
                            <li>
                                <a href="blog-post.html">Blog Post</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other Pages <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="full-width.html">Full Width Page</a>
                            </li>
                            <li>
                                <a href="sidebar.html">Sidebar Page</a>
                            </li>
                            <li>
                                <a href="faq.html">FAQ</a>
                            </li>
                            <li>
                                <a href="404.html">404</a>
                            </li>
                            <li>
                                <a href="pricing.html">Pricing Table</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Services
                    <small>Subheading</small>
                </h1>

                <button type="button" id="addSubject" class="btn btn-primary" style=" border-bottom-width: 1px;   margin-bottom: 10px;">Додати предмет</button>
            </div>
        </div>

        <div>
            <table>
                <tbody class="hideSubject">
                    <tr class="subject">
                        <td><span class="glyphicon glyphicon-plus addRowQualification"></span></td>
                        <td>
                            <select name="subject[]">
                                <option value="">Выберите предмет</option>
                                <option value="1">економіка і прідприємництво</option>
                                <option value="2">Менеджмент</option>
                                <option value="3">Другие предметы</option>
                            </select>

                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <table>
                <tbody class="hideRowQualification">
                    <tr>
                        <td><span class="glyphicon glyphicon-minus removeRowQualification"></span></td>
                        <td>
                            <select name="table[0][row_][qualification]">
                                <option>Бакалавр</option>
                                <option>Магістр</option>
                            </select>
                        </td>
                        <td><input type="number" name="table[0][row_][freeD]"></td>
                        <td><input type="number" name="table[0][row_][payD]"></td>
                        <td></td>
                        <td><input type="number" name="table[0][row_][freeZ]"></td>
                        <td><input type="number" name="table[0][row_][payZ]"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <form action="{{ route('save') }}" id="form" method="POST">
            {{ csrf_field() }}
            <table class="table table-bordered" id="firstTable">
               <thead>
                    <tr>
                        <td rowspan="2">№</td>
                        <td rowspan="2">форма навчання</td>
                        <td colspan="2">контингент</td>
                        <td></td>
                        <td colspan="2">контингент</td>
                    </tr>
                    <tr>
                        <td>б</td>
                        <td>к</td>
                        <td></td>
                        <td>б</td>
                        <td>к</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2">денна форма навчання</td>
                        <td></td>
                        <td colspan="2">заочна форма навчання</td>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </form>
        <button id="save" type="button" class="btn btn-primary" style=" border-bottom-width: 1px;  margin-bottom: 10px;">Розрахувати</button>
        <hr>

        <div id="result"></div>


        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>

                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>

    <script>

        var rowForFirstTable = '<tr><td>Вставка</td><td>бакалаври</td><td></td><td></td><td></td><td></td><td></td></tr>';
        var subject = $('.hideSubject').children().clone();

        $(document).ready(function(){

        });



        $('body').on('click', '.addRowQualification', function () {
            var t = $(this).parents('tr');
            if(t.nextUntil('tr.subject').length) {
                t.nextUntil('tr.subject').last().after($('.hideRowQualification').children().clone())
            }else if(t.nextAll().length){
                t.nextAll().last().after($('.hideRowQualification').children().clone())
            }else{
                t.after($('.hideRowQualification').children().clone())
            }

            $('#firstTable [name*=0]').attr('name', function(){
                return $(this).attr('name')
                        .replace('0',$(this).parents('tr').prevAll('tr.subject').first().find('select').val())
                        .replace('row_', 'row_'+$('#firstTable [name*=row_]').parents('tr:not(.subject)').length)
            })

        });
        $('body').on('click', '#addSubject', function () {
            $('#firstTable > tbody:last').append($('.hideSubject').children().clone());

        });
        $('body').on('click', '.removeRowQualification', function () {
            $(this).parents('tr').remove();

        });
        $('body').on('change', '.subject', function () {
            console.log(this);

            var t = $(this);
            t.find('.addRowQualification').show();
            t.find("select [value='']").remove();
            if(t.nextUntil('tr.subject').length) {
                console.log(this);
                t.nextUntil('tr.subject').find('[name]').each(function () {
                    var atr = $(this).attr('name');
                    if(atr.indexOf(']')>6) {
                        console.log(this);
                        $(this).attr('name', atr.replace(atr.substring(6, atr.indexOf(']')), t.find('select').val()));
                    }
                })

            }else if(t.nextAll().length){
                t.nextAll().last().after($('.hideRowQualification').children().clone())
            }
        });

        $('body').on('click', '#save', function () {
            console.log($('#form').serialize())
            $.ajax({
                type: 'POST',
                url: '/save',
                data: $('#form').serialize(),
                success: function(data) {
                    $('#result').html(data);
                },
                error:  function(xhr, str){
                   // alert('Возникла ошибка: ' + xhr.responseCode);
                    console.log(xhr);
                    console.log(str);
                }
            });


        });


    </script>

</body>

</html>
