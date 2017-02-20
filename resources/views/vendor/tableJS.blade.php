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

    $('body').on('click', '.addRowImozemQualification', function () {
        var t = $(this).parents('tr');
        if(t.nextUntil('tr.subjectInozem').length) {
            t.nextUntil('tr.subjectInozem').last().after($('.hideRowInozemQualification').children().clone())
        }else if(t.nextAll().length){
            t.nextAll().last().after($('.hideRowInozemQualification').children().clone())
        }else{
            t.after($('.hideRowInozemQualification').children().clone())
        }

        $('#firstTable [name*=0]').attr('name', function(){
            return $(this).attr('name')
                .replace('0',$(this).parents('tr').prevAll('tr.subjectImozem').first().find('select').val())
                .replace('row_', 'row_'+$('#firstTable [name*=row_]').parents('tr:not(.subject)').length)
        })

    });

    $('body').on('click', '.addRowImozem', function () {

        if(!$('#inozem  tr:last').hasClass('subjectImozem')) {
            $('#inozem').append($('.hideImozemSubject').children().clone());
        }
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
    $('body').on('click', '#addInozem', function () {
        if($('#inozem').children().length == 0){
            $('#inozem').append($('.hideInozem').children().clone());
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

    $('body').on('change', '.subjectImozem', function () {
        var t = $(this);
        t.find('.addRowImozemQualification').show();
        t.find("select [value='']").remove();
        console.log(this);
        if(t.nextUntil('tr.subjectImozem').length) {
            console.log(this);
            t.nextUntil('tr.subjectImozem').find('[name]').each(function () {
                var atr = $(this).attr('name');
                if(atr.indexOf(']')>7) {
                    console.log(this);
                    $(this).attr('name', atr.replace(atr.substring(7, atr.indexOf(']')), t.find('select').val()));
                }
            })
        }else if(t.nextAll().length){
            t.nextAll().last().after($('.hideRowQualification').children().clone())
        }
    });
</script>