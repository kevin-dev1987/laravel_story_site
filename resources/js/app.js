import './bootstrap';
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
     });

    $(document).on('click', '.expand-genre-menu', function(){
        $('.menu').animate({
            height: '110px'
        }, 'medium')

        $('.bi-caret-down-fill').hide()
        $('.bi-caret-left-fill').show()

        $('#expand-genre-menu').attr('class', 'collapse-genre-menu')
    })

    $(document).on('click', '.collapse-genre-menu', function(){
        $('.menu').animate({
            height: '30px'
        }, 'medium')

        $('.bi-caret-down-fill').show()
        $('.bi-caret-left-fill').hide()

        $('#expand-genre-menu').attr('class', 'expand-genre-menu')
    })

    //Click the Follow author button on story view
    $(document).on('click', '.story-author-follow-btn', function(e){
        e.preventDefault()
        var icon = $(this).find('.bi-plus')

        var id_to_follow = $(this).data('follow_id')
        console.log(id_to_follow)

        var followData = new FormData()
        followData.append('follow_id', id_to_follow)

        $.ajax({
            url: '/follow_user',
            method: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            data: followData,
            success: function(response){
                console.log(response)
                if(response.user_follow == 'success'){
                    icon.css('color', 'green')
                    $(this).css('background-color', 'rgba(0, 255, 0, 0.4)')
                    $(this).css('color', 'green')
                }
            },
            error: function(xhr, status, error){
                console.log(error)
            }

        })
    })








})