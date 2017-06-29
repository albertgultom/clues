$(document).ready(function(){
    $('header a[id="toggle"]').click(function(event) {
        event.preventDefault();
    });

    $(window).click(function(event) {
        // console.log(event.target.className);
        if(event.target.id == 'avaPic'){
            var dr = $('.dropdown-field');
            if (dr.hasClass('show')) {
                dr.removeClass('show');
            }else{
                dr.addClass('show');
            }
        }else if(event.target.className == 'dropdown-list'){
            $('.dropdown-field').addClass('show');
        }else{
            $('.dropdown-field').removeClass('show');
        }
    });

})