$(document).ready(function(){

    $('header .read').click(function() {
        var id = $(this).data('id');
        var taget = $(this);
        $.ajax({
            url: 'readnotif/'+id,
            type: 'GET',
            success: function(result){
                $('.read[data-id="'+result+'"]').remove();
                var n = $('.read').length;
                window.countread = n;
                if ($('.read').length == 0) {
                    $('.head-notif').hide();
                }
            }
        })
    });

    $('header a[id="toggle"]').click(function(event) {
        event.preventDefault();
    });

    $(window).click(function(event) {
        // console.log(event.target.id);
        // console.log(event.target.className);
        if(event.target.id == 'avaPic'){
            var dr = $('.dropdown-field');
            if (dr.hasClass('show')) {
                dr.removeClass('show');
            }else{
                dr.addClass('show');
            }
            var nt = $('.dropdown-field-notif');
            if (nt.hasClass('show')) {
                nt.removeClass('show');
            }
        }else if(event.target.id == 'notif'){
            var nt = $('.dropdown-field-notif');
            if (nt.hasClass('show')) {
                nt.removeClass('show');
            }else{
                nt.addClass('show');
            }

            var dr = $('.dropdown-field');
            if (dr.hasClass('show')) {
                $('.dropdown-field').removeClass('show');
            }

        }else if(event.target.className == 'dropdown-list' || event.target.className == 'date-notif' || event.target.className == 'read' || event.target.className == 'list'){
            var nt = $('.dropdown-field-notif');
            if (nt.hasClass('show')) {
                $('.dropdown-field-notif').addClass('show');
            }
            var dr = $('.dropdown-field');
            if (dr.hasClass('show')) {
                $('.dropdown-field').addClass('show');
            }
        }else{
            $('.dropdown-field').removeClass('show');
            $('.dropdown-field-notif').removeClass('show');
        }


    });

})