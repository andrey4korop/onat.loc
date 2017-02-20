@extends('layouts.lay')

@section('header')

@endsection

@section('style')
    <style>
        .rowBolid, thead{font-weight: 600;}
        table, .row{
            text-align:center;
        }
    </style>
@endsection

@section('scripts')
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

        function postToUrl(path, params, method) {
            method = method || "post"; // Устанавливаем метод отправки.

            var form = document.createElement("form");
            form.setAttribute("method", method);
            form.setAttribute("action", path);
            if(params){
                for (var key in params) {
                    var hiddenField = document.createElement("input");
                    hiddenField.setAttribute("type", "hidden");
                    hiddenField.setAttribute("name", key);
                    hiddenField.setAttribute("value", params[key]);

                    form.appendChild(hiddenField);
                }
            }

            document.body.appendChild(form);
            form.submit();
        }
    </script>
@endsection







@section('content')
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Заголовок модального окна -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <h4 class="modal-title" id="myModalLabel">Вхід в систему</h4>
                </div>
                <!-- Основная часть модального окна, содержащая форму для регистрации -->
                <form role="form" class="form-horizontal" action="{{isset($id) ? route('mail',['id' => $id]) : route('mail')}}" method="POST">
                    <div class="modal-body">
                        <!-- Форма для регистрации -->

                    {{ csrf_field() }}
                    <!-- Блок для ввода логина -->
                        <div class="form-group has-feedback">
                            <label for="login" class="control-label col-xs-3">Email:</label>
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input type="email" class="form-control" required="required" name="email">
                                </div>
                                <span class="glyphicon form-control-feedback"></span>
                            </div>
                        </div>
                        <!-- Блок для ввода email -->

                        <!-- Конец блока для ввода email-->

                    </div>
                    <!-- Нижняя часть модального окна -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Відмінити</button>
                        <button id="save" type="submit" class="btn btn-primary">Відправити</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<div class="row">
    <button type="button" onclick="postToUrl('{{isset($id) ? route('tableedit',['id' => $id]) : route('tableedit')}}', {'_token':  '{{csrf_token()}}' }, 'POST')" class="btn btn-primary" style="border-bottom-width: 1px;margin-bottom: 10px;margin-top: 10px;">Редагувати</button>
    <button type="button" id="print" class="btn btn-primary" style="border-bottom-width: 1px;margin-bottom: 10px;margin-top: 10px;">Друкувати</button>
    <button type="button" onClick='location.href="{{ isset($id) ? route('excel',['id' => $id]) : route('excel') }}"' class="btn btn-primary" style="border-bottom-width: 1px;margin-bottom: 10px;margin-top: 10px;">Зберегти в форматі Exсel</button>
    <button type="button" onClick='location.href="{{isset($id) ? route('pdf',['id' => $id]) : route('pdf')}}"'class="btn btn-primary" style="border-bottom-width: 1px;margin-bottom: 10px;margin-top: 10px;">Зберегти в форматі PDF</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="border-bottom-width: 1px;margin-bottom: 10px;margin-top: 10px;">Відправити на електронну пошту</button>
</div>
<div class="container"  style="margin-top: 30px">
    <table  class="table table-bordered">
        <thead>
        <tr>
            <td rowspan="2">№<br>п/п</td>
            <td rowspan="2">Форма навчання</td>
            <td colspan="2">Контингент</td>
            <td rowspan="2">Норматив<br>пост</td>
            <td colspan="2">Кількість ставок</td>
            <td></td>
            <td colspan="2">Контингент</td>
            <td rowspan="2">Норматив<br>пост</td>
            <td colspan="2">Кількість ставок</td>
            <td colspan="3">Всього ставок ПВП</td>
        </tr>
        <tr>
            <td>Б</td>
            <td>К</td>
            <td>Б</td>
            <td>К</td>
            <td></td>
            <td>Б</td>
            <td>К</td>
            <td>Б</td>
            <td>К</td>
            <td>Б</td>
            <td>К</td>
            <td>Б+К</td>
        </tr>
        <tr class="rowBolid">
            <td></td>
            <td></td>
            <td colspan="5">Денна форма навчання</td>
            <td></td>
            <td colspan="5">Заочна форма навчання</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        @forelse($subject as $s)
            <tr class="rowBolid">
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

        <tr class="rowBolid">
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

        @if(!empty($subjectInozem))
            <tr class="rowBolid">
                <td></td>
                <td>Іноземці</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @forelse($subjectInozem as $s)
                <tr class="rowBolid">
                    <td>{{$subjectInozemRows[$s]['num']}}</td>
                    <td>{{$subjectInozemRows[$s]['name']}}</td>
                    <td>{{$subjectInozemRows[$s]['freeD']}}</td>
                    <td>{{$subjectInozemRows[$s]['payD']}}</td>
                    <td></td>
                    <td>{{round($subjectInozemRows[$s]['stavkaFD'],2)}}</td>
                    <td>{{round($subjectInozemRows[$s]['stavkaPD'],2)}}</td>
                    <td></td>
                    <td>{{$subjectInozemRows[$s]['freeZ']}}</td>
                    <td>{{$subjectInozemRows[$s]['payZ']}}</td>
                    <td></td>
                    <td>{{round($subjectInozemRows[$s]['stavkaFZ'],2)}}</td>
                    <td>{{round($subjectInozemRows[$s]['stavkaPZ'],2)}}</td>
                    <td>{{round($subjectInozemRows[$s]['allF'],2)}}</td>
                    <td>{{round($subjectInozemRows[$s]['allP'],2)}}</td>
                    <td>{{round($subjectInozemRows[$s]['all'],2)}}</td>
                </tr>
                @forelse($inozem[$s] as $row)
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
            <tr class="rowBolid">
                <td></td>
                <td>Всього по формі навчання</td>
                <td>{{$allInozem['freeD']}}</td>
                <td>{{$allInozem['payD']}}</td>
                <td></td>
                <td>{{round($allInozem['stavkaFD'],2)}}</td>
                <td>{{round($allInozem['stavkaPD'],2)}}</td>
                <td></td>
                <td>{{$allInozem['freeZ']}}</td>
                <td>{{$allInozem['payZ']}}</td>
                <td></td>
                <td>{{round($allInozem['stavkaFZ'],2)}}</td>
                <td>{{round($allInozem['stavkaPZ'],2)}}</td>
                <td>{{round($allInozem['allF'],2)}}</td>
                <td>{{round($allInozem['allP'],2)}}</td>
                <td>{{round($allInozem['all'],2)}}</td>
            </tr>

            @foreach($allInozemSubject as $key => $row)
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
        @endif

        @forelse($aspRow as $s)
            <tr class="rowBolid">
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
                <tr class="rowBolid">
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
            <tr class="rowBolid">
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

        <tr class="rowBolid">
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
@endsection





























