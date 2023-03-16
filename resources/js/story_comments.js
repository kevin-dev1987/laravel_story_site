$('#comments-textarea').on('keyup', function(){
    var comment_input_count = $(this).val().length
    $('.character-count').html(comment_input_count + '/300 characters.')
})

//Like a story comment
$(document).on('click', '.comment-like-btn', function(){
    var comment_id = $(this).data('comment_id')
    
    var commentLikeData = new FormData()
    commentLikeData.append('comment_id', comment_id)

    $.ajax({
        url: '/comment_like',
        method: 'POST',
        context: this,
        dataType: 'json',
        contentType: false,
        processData: false,
        cache: false,
        data: commentLikeData,
        success: function(response){
            if(response.comment_like == 'comment_liked'){
                $(this).attr('class', 'bi bi-hand-thumbs-up-fill comment-like-btn-disabled')
                $(this).siblings('span').html(response.like_count)
            }
        },
        error: function(xhr, status, error){
            console.log(error)
        }
    })
})