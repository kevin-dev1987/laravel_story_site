$('#comments-textarea').on('keyup', function(){
    var comment_input_count = $(this).val().length
    $('.character-count').html(comment_input_count + '/300 characters.')
})