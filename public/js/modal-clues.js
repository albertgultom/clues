$(document).ready(function(){
    $('.mymodal').click(function(e){
        e.preventDefault();
        var target = $(this).data('target');
        var header = $(this).data('header');
        var body = $(this).data('body');
        $('#'+target).css({
            'display': 'block',
            'z-index': '99'
        });;
        $('.modal-header-clues').html('<h2 class="center">'+header+'</h2>');
        $.ajax({
            url: body,
            type: 'GET',
            success: function(data){
                $('.modal-body-clues').html(data);
            }
        })
    })
    $('span.close').click(function() {
        $('.modal-clues').css({
            'display': 'none',
            'z-index': '-999'
        });
        $('.modal-body-clues').html('');
    });
    $(window).click(function(event) {
            // alert(event.target.className);
            if (event.target.className == 'modal-clues') {
                $('.modal-clues').css({
                    'display': 'none',
                    'z-index': '-999'
                });
                $('.modal-body-clues').html('');
            }
        });
})