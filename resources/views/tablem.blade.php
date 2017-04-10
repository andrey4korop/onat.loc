@extends('layouts.lay')

@section('content')
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                </h1>

                <button type="button" id="addSubject" class="btn btn-primary" style=" border-bottom-width: 1px;   margin-bottom: 10px;">Додати спеціальність</button>
                <button type="button" id="addAspirantura" class="btn btn-primary" style=" border-bottom-width: 1px;   margin-bottom: 10px;">Додати аспірантуру</button>
                <button type="button" id="addDoctor" class="btn btn-primary" style=" border-bottom-width: 1px;   margin-bottom: 10px;">Додати докторнатуру</button>
            </div>
        </div>

        

<table class="table table-bordered" id="firstTable">
    <tr>
        <td>№</td>
        <td>таблиця</td>
        <td>дата</td>
        <td>зберегти</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>




        
        <form action="{{ route('save') }}" id="form" method="POST">
            {{ csrf_field() }}
            <table class="table table-bordered" id="firstTable">
               <thead>
                    <tr>
                        <td rowspan="2">№</td>
                        <td rowspan="2">Форма навчання Факультет</td>
                        <td colspan="2">Контингент</td>
                        <td></td>
                        <td colspan="2">Контингент</td>
                    </tr>
                    <tr>
                        <td>Б</td>
                        <td>К</td>
                        <td></td>
                        <td>Б</td>
                        <td>Д</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2">Денна форма навчання</td>
                        <td></td>
                        <td colspan="2">Заочна форма навчання</td>
                    </tr>
                </thead>
                <tbody id="sub">

                </tbody>
                <tbody id="asp">

                </tbody>
                <tbody id="doc">

                </tbody>
            </table>
            <button id="save" type="button" class="btn btn-primary" style=" border-bottom-width: 1px;  margin-bottom: 10px;">Розрахувати</button>
        </form>

        <hr>

        <div id="result"></div>

    </div>
@endsection

@section('header')
     <button type="button" onClick='location.href="{{route('home')}}"'
            class="btn btn-primary" style="border-bottom-width: 1px;margin-bottom: 10px;margin-top: 10px;">Інструкція</button>
    <button type="button" onClick='location.href="{{route('editnorms')}}"'
            class="btn btn-primary" style="border-bottom-width: 1px;margin-bottom: 10px;margin-top: 10px;">Змінити норми</button>
            
@endsection

@section('scripts')
    <script>


        $('body').on('click', '#save', function () {
            var error = false;
            $('#firstTable #sub tr.subject').each(function () {
                if($('#firstTable #sub [name*="['+$(this).find('select').val()+']"]').length==0 || $(this).find('select').val()==''){
                    error = true;
                }
            })
            if($('#firstTable #asp tr.subject').length > 0 ) {
                if($('#firstTable #asp select').length = 0){
                    error = true;
                }
                $('#firstTable #asp select').each(function () {
                    if ($(this).val() == '') {
                        error = true;
                    }
                })
            }
            if(error){
                alert('У вас є не заповнені поля, заповніть будь ласка, або видаліть їх.')
            }
            else{
                $('#form').submit();
            }
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
@endsection

@section('style')
    <style>
        .hide, .hideSubject, .hideRowQualification, .addRowQualification{display: none;}
       
        table{text-align: center;
       font-weight: bold;
       }
       input{text-align: center;
       font-weight: normal;}
    </style>
@endsection