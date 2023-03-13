//Click the Follow author button on story view
$(document).on('click', '.story-author-follow-btn', function(e){
    e.preventDefault()
    var icon = $(this).find('.bi-plus')

    var id_to_follow = $(this).data('author_id')


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
                $('.story-author-follow-btn').prop('disabled', true)
            }
        },
        error: function(xhr, status, error){
            console.log(error)
        }

    })
})

// Click the Kudos button on story view to give the author Kudos
$(document).on('click', '.story-author-kudos-btn', function(e){
    e.preventDefault()
    var icon = $(this).find('.bi-heart')

    var id_to_kudos = $(this).data('author_id')


    var kudosData = new FormData()
    kudosData.append('kudos_id', id_to_kudos)

    $.ajax({
        url: '/kudos_user',
        method: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: kudosData,
        success: function(response){
            console.log(response)
            if(response.user_kudos == 'success'){
                icon.attr('class', 'bi bi-heart-fill')
                $('.story-author-kudos-btn').prop('disabled', true)
            }
        },
        error: function(xhr, status, error){
            console.log(error)
        }

    })
})