@extends('layouts.layShtat')

@section('content')
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                </h1>

            </div>
        </div>

        

<table class="table table-bordered">
    <tr>
        <td>№</td>
        <td>Переглянути таблицю</td>
        <td>Дата</td>
        <td>Завантажити</td>
        <td>Видалити</td>
    </tr>
    <?php $i = 1; ?>
    @foreach($arhive as $row)
        <tr>
            <td>{{$i++}}</td>
            <td><a href="{{route('open',['id' => $row->id])}}">ПЕРЕГЛЯНУТИ</a></td>
            <td>{{$row->updated_at}}</td>
            <td>
                <a class="padd" href="{{ route('excel',['id' => $row->id]) }}" class=""><img src="/img/excel.png"></a>
                <a class="padd" href="{{ route('pdf',['id' => $row->id]) }}" class=""><img src="/img/pdf.png"></a>
            </td>
            <td>
                <a class="del" del="{{$row->id}}" hreff="{{ route('del',['id' => $row->id]) }}" class=""><img src="/img/del.png"></a>
            </td>
        </tr>
    @endforeach

</table>






    </div>
@endsection

@section('header')

@endsection

@section('scripts')
    <script>
        $('body').on('click', '.del', function () {
            var deleting = this;
            var del = confirm("Ви впевнені?");

                if(del){
                    $.ajax({
                        type: 'POST',
                        url: $(this).attr('hreff'),
                        data: {_token: $('meta[name="csrf-token"]').attr('content')},
                        success: function (data) {

                           $(deleting).parents('tr').remove();
                        }
                    })
                }
            });
    </script>
@endsection

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    <style>

        table{text-align: center;
       font-weight: bold;
       }
       input{text-align: center;
       font-weight: normal;}
        img{
            width: 40px;
        }
        .padd{
            margin-right: 30px;
        }
    </style>
@endsection