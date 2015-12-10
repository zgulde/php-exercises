$(document).ready(function(){

    if (currentPage >= maxNumPages) {
        $('#next').attr('disabled','disabled');
    } else if (currentPage <= 0){
        $('#prev').attr('disabled','disabled');
    }

    $('option').each(function(){
        if ($(this).val() == limit) {
            $(this).attr('selected','selected');
        }
    });

    $('#prev').click(function(){
        $('#page').attr('value', $('#page').attr('value') - 1);
    });

    $('#next').click(function(){
        $('#page').attr('value', parseInt($('#page').attr('value')) + 1);
    });

    $('#limit').change(function(){
        $('#form').submit();
    });

    $('#area').on('input', function(){
        $(this).val($(this).val().replace(/[^\d\.]/g, ''));
    });

    $('#clear-form').click(function(){
        $('.insert-form input').each(function(){
            $(this).removeClass('invalid');
        });
        $('.insert-form textarea').removeClass('invalid');
    });

    $('#add-park-form').submit(function(e){

        $('.insert-form input').each(function(){
            $(this).removeClass('invalid');
        });

        var $name = $('#name');
        var $location = $('#location');
        var $date = $('#date-estb');
        var $area = $('#area');
        var $description = $('#description');

        var validName = /^[a-zA-Z]{2,}$/;
        var validLocation = /^[a-zA-Z][a-zA-Z\d]+(\s*[a-zA-Z,\d])*$/;
        var validArea = /^\d+(\.\d+)?$/;
        var validDescription = /^.+(\s*.+)*$/;

        if ( !validName.test($name.val() ) ){
            $name.addClass('invalid');
            e.preventDefault();
        }
        
        if ( !validLocation.test($location.val() ) ){
            $location.addClass('invalid');
            e.preventDefault();
        }
        
        if ( !validArea.test($area.val() ) ){
            $area.addClass('invalid');
            e.preventDefault();
        }
        
        if ( !validDescription.test($description.val() ) ){
            $description.addClass('invalid');
            e.preventDefault();
        }

        var formattedDate = moment($date.val()).format('YYYY-MM-DD');

        if (formattedDate == 'Invalid date') {
            e.preventDefault();
            $date.val('Could not parse date!');
            $date.addClass('invalid');
            $date.focus();
        } else {
            $date.val(formattedDate);
        }

    });

});
