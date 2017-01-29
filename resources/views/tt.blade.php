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

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"  >
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary" style="border-bottom-width: 1px;margin-bottom: 10px;margin-top: 10px;">Вихід із системи</button>

                        <button type="button" id="print" class="btn btn-primary" style="border-bottom-width: 1px;margin-bottom: 10px;margin-top: 10px;">Друкувати</button>
                        <button type="button" onClick='location.href="{{route('excel')}}"' class="btn btn-primary" style="border-bottom-width: 1px;margin-bottom: 10px;margin-top: 10px;">Зберегти в форматі Exсel</button>
                        <button type="button" class="btn btn-primary" style="border-bottom-width: 1px;margin-bottom: 10px;margin-top: 10px;">Зберегти в форматі PDF</button>
                        <button type="button" class="btn btn-primary" style="border-bottom-width: 1px;margin-bottom: 10px;margin-top: 10px;">Відправити на електронну пошту</button>
                        </form>
                    </div>

                </div>

            </nav>
        </div>
        <!— /.navbar-collapse —>
    </div>
    <!— /.container —>
</nav>

<!-- Page Content -->
<div class="container"  style="margin-top: 30px">

    <!-- Page Heading/Breadcrumbs -->



    <table  class="table table-bordered">
        <thead>
        <tr>
            <td rowspan="2">№<br>п/п</td>
            <td rowspan="2">форма навчання</td>
            <td colspan="2">контингент</td>
            <td rowspan="2">норматив<br>пост</td>
            <td colspan="2">кількість ставок</td>
            <td></td>
            <td colspan="2">контингент</td>
            <td rowspan="2">норматив<br>пост</td>
            <td colspan="2">кількість ставок</td>
            <td colspan="3">всього ставок пвп</td>
        </tr>
        <tr>
            <td>б</td>
            <td>к</td>
            <td>б</td>
            <td>к</td>
            <td></td>
            <td>б</td>
            <td>к</td>
            <td>б</td>
            <td>к</td>
            <td>б</td>
            <td>к</td>
            <td>б+к</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan="5">денна форма навчання</td>
            <td></td>
            <td colspan="5">заочна форма навчання</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        @forelse($subject as $s)
            <tr>
                <td>{{$subjectRows[$s]['num']}}</td>
                <td>{{$subjectRows[$s]['name']}}</td>
                <td>{{$subjectRows[$s]['freeD']}}</td>
                <td>{{$subjectRows[$s]['payD']}}</td>
                <td></td>
                <td>{{round($subjectRows[$s]['stavkaFD'],2)}}</td>
                <td>{{round($subjectRows[$s]['stavkaPD'],2)}}</td>
                <td></td>
                <td>{{$subjectRows[$s]['freeZ']}}</td>
                <td>{{$subjectRows[$s]['payZ']}}</td>
                <td></td>
                <td>{{round($subjectRows[$s]['stavkaFZ'],2)}}</td>
                <td>{{round($subjectRows[$s]['stavkaPZ'],2)}}</td>
                <td>{{round($subjectRows[$s]['allF'],2)}}</td>
                <td>{{round($subjectRows[$s]['allP'],2)}}</td>
                <td>{{round($subjectRows[$s]['all'],2)}}</td>
            </tr>
            @forelse($table[$s] as $row)
                <tr>
                    <td></td>
                    <td>{{$row['qualification']}}</td>
                    <td>{{$row['freeD']}}</td>
                    <td>{{$row['payD']}}</td>
                    <td>{{$row['normD']}}</td>
                    <td>{{round($row['stavkaFD'],2)}}</td>
                    <td>{{round($row['stavkaPD'],2)}}</td>
                    <td></td>
                    <td>{{$row['freeZ']}}</td>
                    <td>{{$row['payZ']}}</td>
                    <td>{{$row['normZ']}}</td>
                    <td>{{round($row['stavkaFZ'],2)}}</td>
                    <td>{{round($row['stavkaPZ'],2)}}</td>
                    <td>{{round($row['allF'],2)}}</td>
                    <td>{{round($row['allP'],2)}}</td>
                    <td>{{round($row['all'],2)}}</td>
                </tr>
            @empty
            @endforelse
        @empty
        @endforelse

        <tr>
            <td></td>
            <td>Всього по формі навчання</td>
            <td>{{$all['freeD']}}</td>
            <td>{{$all['payD']}}</td>
            <td></td>
            <td>{{round($all['stavkaFD'],2)}}</td>
            <td>{{round($all['stavkaPD'],2)}}</td>
            <td></td>
            <td>{{$all['freeZ']}}</td>
            <td>{{$all['payZ']}}</td>
            <td></td>
            <td>{{round($all['stavkaFZ'],2)}}</td>
            <td>{{round($all['stavkaPZ'],2)}}</td>
            <td>{{round($all['allF'],2)}}</td>
            <td>{{round($all['allP'],2)}}</td>
            <td>{{round($all['all'],2)}}</td>
        </tr>

        @foreach($allSubject as $key => $row)
            <tr>
                <td></td>
                <td>{{$key}}</td>
                <td>{{$row['freeD']}}</td>
                <td>{{$row['payD']}}</td>
                <td></td>
                <td>{{round($row['stavkaFD'],2)}}</td>
                <td>{{round($row['stavkaPD'],2)}}</td>
                <td></td>
                <td>{{$row['freeZ']}}</td>
                <td>{{$row['payZ']}}</td>
                <td></td>
                <td>{{round($row['stavkaFZ'],2)}}</td>
                <td>{{round($row['stavkaPZ'],2)}}</td>
                <td>{{round($row['allF'],2)}}</td>
                <td>{{round($row['allP'],2)}}</td>
                <td>{{round($row['all'],2)}}</td>
            </tr>
        @endforeach

        @forelse($aspRow as $s)
            <tr>
                <td>{{$s['num']}}</td>
                <td>{{$s['name']}}</td>
                <td>{{$s['freeD']}}</td>
                <td>{{$s['payD']}}</td>
                <td></td>
                <td>{{round($s['stavkaFD'],2)}}</td>
                <td>{{round($s['stavkaPD'],2)}}</td>
                <td></td>
                <td>{{$s['freeZ']}}</td>
                <td>{{$s['payZ']}}</td>
                <td></td>
                <td>{{round($s['stavkaFZ'],2)}}</td>
                <td>{{round($s['stavkaPZ'],2)}}</td>
                <td>{{round($s['allF'],2)}}</td>
                <td>{{round($s['allP'],2)}}</td>
                <td>{{round($s['all'],2)}}</td>
            </tr>
            @foreach($tableAsp as $row)
                <tr>
                    <td></td>
                    <td>{{$row['qualification']}}</td>
                    <td>{{$row['freeD']}}</td>
                    <td>{{$row['payD']}}</td>
                    <td>{{$row['normD']}}</td>
                    <td>{{round($row['stavkaFD'],2)}}</td>
                    <td>{{round($row['stavkaPD'],2)}}</td>
                    <td></td>
                    <td>{{$row['freeZ']}}</td>
                    <td>{{$row['payZ']}}</td>
                    <td>{{$row['normZ']}}</td>
                    <td>{{round($row['stavkaFZ'],2)}}</td>
                    <td>{{round($row['stavkaPZ'],2)}}</td>
                    <td>{{round($row['allF'],2)}}</td>
                    <td>{{round($row['allP'],2)}}</td>
                    <td>{{round($row['all'],2)}}</td>
                </tr>
            @endforeach
        @empty
        @endforelse

        @if(!empty($docRow))
            <tr>
                <td>{{$docRow['num']}}</td>
                <td>{{$docRow['qualification']}}</td>
                <td>{{$docRow['freeD']}}</td>
                <td>{{$docRow['payD']}}</td>
                <td>{{$docRow['normD']}}</td>
                <td>{{round($docRow['stavkaFD'],2)}}</td>
                <td>{{round($docRow['stavkaPD'],2)}}</td>
                <td></td>
                <td>{{$docRow['freeZ']}}</td>
                <td>{{$docRow['payZ']}}</td>
                <td>{{$docRow['normZ']}}</td>
                <td>{{round($docRow['stavkaFZ'],2)}}</td>
                <td>{{round($docRow['stavkaPZ'],2)}}</td>
                <td>{{round($docRow['allF'],2)}}</td>
                <td>{{round($docRow['allP'],2)}}</td>
                <td>{{round($docRow['all'],2)}}</td>
            </tr>
        @endif

        <tr>
            <td></td>
            <td>ВСЬОГО</td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{round($superAll['stavkaFD'],2)}}</td>
            <td>{{round($superAll['stavkaPD'],2)}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{round($superAll['stavkaFZ'],2)}}</td>
            <td>{{round($superAll['stavkaPZ'],2)}}</td>
            <td>{{round($superAll['allF'],2)}}</td>
            <td>{{round($superAll['allP'],2)}}</td>
            <td>{{round($superAll['all'],2)}}</td>
        </tr>



        </tbody>
    </table>






</div>
<!-- /.container -->

<!-- jQuery -->
<script src="/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/js/bootstrap.min.js"></script>

<script>

    $(function(){
        $('#print').click(function(){


            var iframe=$('<iframe id="print_frame">');
            iframe.hide();
            $('body').append(iframe);
            var doc = $('#print_frame')[0].contentDocument || $('#print_frame')[0].contentWindow.document;
            var win = $('#print_frame')[0].contentWindow || $('#print_frame')[0];
            $(doc).find('head').append($('link').clone());
            $(doc).find('body').append($('table').clone());
            setTimeout(function () {
                win.print();
                $('iframe').remove();
            }, 1000); // время в мс






        });
    });

</script>

</body>

</html>






























