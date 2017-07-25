$(document).ready(function(){
    $('.mymodal').click(function(e){
        e.preventDefault();
        var target = $(this).data('target');
        var body = $(this).data('body');
        var url_yes = $(this).attr('url-yes');
        var run_function = $(this).data('function');
        var header = $(this).data('header');
        show_modal(target, body, header, url_yes, run_function);
    })
    $('span.close, .modal-clues-ask .option .red, .modal-clues-ask .option .blue').click(function(e) {
        // e.preventDefault();
        $('body').css('overflow', 'scroll');
        $('.modal-clues, .modal-clues-ask').css({
            'display': 'none',
            'z-index': '-999'
        });
        $('.modal-content-clues').removeClass('show');
        $('.modal-header-clues').html('');
        $('.modal-body-clues').html('');
    });
    $(window).click(function(event) {
            // alert(event.target.className);
            if (event.target.className == 'modal-clues' || event.target.className == 'modal-clues-ask') {
                $('body').css('overflow', 'scroll');
                $('.modal-clues, .modal-clues-ask').css({
                    'display': 'none',
                    'z-index': '-999'
                });
                $('.modal-content-clues').removeClass('show');
                $('.modal-header-clues').html('');
                $('.modal-body-clues').html('');
            }
        });
})

function show_modal(target, body, header, url_yes, run_function){
    // var target = $(this).data('target');
    // var body = $(this).data('body');
    $('body').css('overflow', 'hidden');
    $('#'+target).css({
        'display': 'block',
        'z-index': '99'
    });;
    if (target == 'modal-clues') {
        // var header = $(this).data('header');
        $.ajax({
            url: body,
            type: 'GET',
            success: function(data){
                $('.modal-header-clues').html('<h2 class="center">'+header+'</h2>');
                $('.modal-body-clues').html(data);
                $('.modal-content-clues').addClass('show');
            },
            beforeSend: function(){
                $('.bar-container').css('visibility', 'visible');
            },
            complete: function(){
                $('.bar-container').css('visibility', 'hidden');
            }
        })
    }else{
        $('.modal-body-clues').html('<h4><strong>'+body+'</strong></h4>');
        $('.modal-clues-ask .modal-content-clues').addClass('show');
        if (url_yes != '') {
            $('.modal-clues-ask .option a.blue').attr('href', yes);
        }else{
            $('.modal-clues-ask .option a.blue').attr('onclick', run_function);
        }
    }
}




