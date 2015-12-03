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
        var validDate = /^[12]\d\d\d-[01]\d-[0-3]\d$/;
        var validArea = /^\d+(\.\d+)?$/;
        var validDescription = /^.+$/;

        if ( !validName.test($name.val() ) ){
            $name.addClass('invalid');
            e.preventDefault();
        }
        if ( !validLocation.test($location.val() ) ){
            $location.addClass('invalid');
            e.preventDefault();
        }
        if ( !validDate.test($date.val() ) ){
            $date.addClass('invalid');
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

    });

});
