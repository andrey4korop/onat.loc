@extends('layouts.layShtat')

@section('header')

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
           cursor: pointer;
       }
    </style>
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
                        console.log(this);
                        $(deleting).parents('tr').remove();
                    }
                })
            }
        });
    </script>
@endsection

@section('content')
    <div class="container" style="margin-top: 50px;">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
            </div>
        </div>


        <form action="{{ route('savenorm') }}" id="form" method="POST">
            {{ csrf_field() }}

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>№ п/п</td>
                        <td>Спеціальність</td>
                        <td>Видалення</td>

                    </tr>

                </thead>
                <tbody>
                <?php $i=1; ?>
                @foreach($subjects as $key => $subject)

                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$subject->subject}}</td>
                            <td> <a class="del" del="{{$subject->id}}" hreff="{{ route('delSubject',['id' => $subject->id]) }}" class=""><img src="/img/del.png"></a></td>

                        </tr>
                @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary center-block" style=" border-bottom-width: 1px; margin-bottom: 10px;">Зберегти</button>
        </form>

        <hr>

    </div>
@endsection