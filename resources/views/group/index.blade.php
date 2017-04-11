<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="/js/jquery.js"></script>
    <style>
        .add_group{
            display: none;
        }
    </style>
</head>
<body>
<form action="">
    {{ csrf_field() }}
    <select name="id">
        <option value="" disabled selected>Select your option</option>
        @forelse($groups as $group)
            <option value="{{$group->id}}">{{$group->group_name}}</option>
        @empty
        @endforelse
    </select>
    <input type="button" value="addGroup" class="addGroupToggle" onclick="toggle()">
    <div class="add_group">
        <input type="text" id="nameGroup" name="nameGroup">
        <input type="button" value="addGroup" onclick="addGroup()">
    </div>
    <table>

    </table>
</form>


<script>

    
    function toggle() {
        $('.addGroupToggle').toggle();
        $('.add_group').toggle();
    }
    function addGroup() {
        if($('input#nameGroup')[0].value != ''){
            $.ajax({
                type: 'POST',
                url: "{{route('newGroup')}}",
                data: $('form').serialize(),
                success: function(data) {

                    var select = '<select name="id">';
                    var obj = $.parseJSON(data);
                    v = $.parseJSON(data);
                    console.log(obj);
                    obj.forEach(function(group){
                        select+=' <option value="'+group.id+'">'+group.group_name+'</option>';
                    })


                    select+='</select>';
                    $('select').html(select);
                    $('input#nameGroup')[0].value = '';
                    toggle();
                },
                error:  function(xhr, str){

                }
            });
        }
    }
    $('body').on('change', 'select', function () {
        var button = '<input type="button" id="buttonAdd" value="ADD">';
        $.ajax({
            type: 'POST',
            url: "{{route('getGroupAjax')}}",
            data: $('form').serialize(),
            success: function(data) {
                var table = '<table><tbody>';
                var obj = $.parseJSON(data)[0];
                obj.students.forEach(function (student) {
                    table+='<tr><td>'+student.FIO+'</td><td class="button"></td></tr>'
                });
                table+='</tbody></table>';
                $('table').html(table);

                $('.button').last().append(button);
                if($('#buttonAdd').length==0){
                    $('table').append(button);
                }
            },
            error:  function(xhr, str){

            }
        });



    });

    $('body').on('click', '#buttonAdd', function () {
        var error = false;
        $('input[name="FIO[]"]').each(function (){
            if (this.value == '') {
                error = true;
            }
        });
        if (!error) {
            var row = $('<tr><td><input name="FIO[]"></td><td class="button"></td></tr>')
            $('table').append(row);
            $('.button').last().append($('#buttonAdd'));
        }
        if($('#save').length ==0 ){
            var save = $('<input type="button" id="save" value="save">')
            $('table').append(save);
        }
    });
    $('body').on('click', '#save', function () {
        if($('#nameGroup')[0].value !='') {
            $.ajax({
                type: 'POST',
                url: "{{route('saveGroupAjax')}}",
                data: $('form').serialize(),
                success: function (data) {
                    var table = '<table><tbody>';
                    var obj = $.parseJSON(data)[0];
                    obj.students.forEach(function (student) {
                        table += '<tr><td>' + student.FIO + '</td><td class="button"></td></tr>'
                    });
                    table += '</tbody></table>';
                    $('table').html(table);
                    var button = '<input type="button" id="buttonAdd" value="ADD">';
                    $('.button').last().append(button);
                },
                error: function (xhr, str) {

                }
            });
        }
    });
</script>
</body>
</html>