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
        .hide, .hideSubject, .hideRowQualification, .addRowQualification{display: none;}
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
            </form>

        </div>
        <!— /.navbar-collapse —>
    </div>
    <!— /.container —>
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
                <button type="button" id="addAspirantura" class="btn btn-primary" style=" border-bottom-width: 1px;   margin-bottom: 10px;">Додати аспірантуру</button>
                <button type="button" id="addDoctor" class="btn btn-primary" style=" border-bottom-width: 1px;   margin-bottom: 10px;">Додати докторнатуру</button>
            </div>
        </div>

        <div class="hide">
            <table>
                <tbody class="hideSubject">
                    <tr class="subject">
                        <td><span class="glyphicon glyphicon-plus addRowQualification"></span></td>
                        <td>
                            <select name="subject[]">
                                <option value="">Виберіть предмет</option>
                                @foreach($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->subject}}</option>
                                @endforeach
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
            <table>
                <tbody class="hideAsp">
                    <tr class="subject">
                        <td><span class="glyphicon glyphicon-plus addRowAsp"></span></td>
                        <td>

                            Аспірантура

                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <table>
                <tbody id="hideRowDoctor">
                    <tr>
                        <td><span class="glyphicon glyphicon-minus removeRowQualification"></span></td>
                        <td>
                            <input type="hidden" name="doctor[name]" value="doc">
                            Докторнатура

                        </td>
                        <td><input type="number" name="doctor[freeD]"></td>
                        <td><input type="number" name="doctor[payD]"></td>
                        <td></td>
                        <td><input type="number" name="doctor[freeZ]"></td>
                        <td><input type="number" name="doctor[payZ]"></td>
                    </tr>
                </tbody>
            </table>

            <table>
                <tbody class="hideRowQualification">
                    <tr>
                        <td><span class="glyphicon glyphicon-minus removeRowQualification"></span></td>
                        <td>
                            <select name="table[0][row_][qualification]">
                                <option>бакалаври</option>
                                <option>спеціалісти</option>
                                <option>магістри V</option>
                                <option>магістри VI</option>
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
            <table>
                <tbody class="hideOther">
                <tr>
                    <td><span class="glyphicon glyphicon-minus removeRowQualification"></span></td>
                    <td>
                        <select name="other[0][row_][qualification]">
                            <option value="">Виберіть науку</option>
                            @foreach($aspirantura as $asp)
                                <option value="{{$asp->id}}">{{$asp->subject}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="number" name="other[0][row_][freeD]"></td>
                    <td><input type="number" name="other[0][row_][payD]"></td>
                    <td></td>
                    <td><input type="number" name="other[0][row_][freeZ]"></td>
                    <td><input type="number" name="other[0][row_][payZ]"></td>
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
                <tbody id="sub">

                </tbody>
                <tbody id="asp">

                </tbody>
                <tbody id="doc">

                </tbody>
            </table>
            <button id="save" type="submit" class="btn btn-primary" style=" border-bottom-width: 1px;  margin-bottom: 10px;">Розрахувати</button>
        </form>

        <hr>

        <div id="result"></div>




    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>

    <script>



        $(document).ready(function(){

        });



        $('body').on('click', '.addRowAsp', function () {
            var t = $(this).parents('tr');
            if(t.nextUntil('tr.subject').length) {
                t.nextUntil('tr.subject').last().after($('.hideOther').children().clone())
            }else if(t.nextAll().length){
                t.nextAll().last().after($('.hideOther').children().clone())
            }else{
                t.after($('.hideOther').children().clone())
            }

            $('#firstTable [name*=0]').attr('name', function(){
                return $(this).attr('name')
                        .replace('0','other')
                        .replace('row_', 'row_'+$('#firstTable [name*=row_]').parents('tr:not(.subject)').length)
            })

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





        $('body').on('click', '#addDoctor', function () {
            if(!$('#doc').children().length) {
                $('#doc').append($('#hideRowDoctor').children().clone());
            }
        });

        $('body').on('click', '#addAspirantura', function () {
            if(!$('#asp').children().length) {
                $('#asp').append($('.hideAsp').children().clone());
            }
        });


        $('body').on('click', '#addSubject', function () {
            if(!$('#sub  tr:last').hasClass('subject')) {
                $('#sub').append($('.hideSubject').children().clone());
            }
        });




        $('body').on('click', '.removeRowQualification', function () {
            $(this).parents('tr').remove();
        });




        $('body').on('change', '.subject', function () {
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








    </script>

</body>

</html>
