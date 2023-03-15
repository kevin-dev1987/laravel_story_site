// Give the story a like
$(document).on('click', '.story-like-btn', function(e){
    e.preventDefault()
    var icon = $(this).find('.bi-hand-thumbs-up')
    var story_id = $(this).data('story_id')
    
    var likeData = new FormData()
    likeData.append('story_id', story_id)

    $.ajax({
        url: '/like_story',
        method: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: likeData,
        success: function(response){
            if(response.like == 'liked'){
                
                icon.attr('class', 'bi bi-hand-thumbs-up-fill')
                $('.story-like-btn').prop('disabled', true)
                
            }
        },
        error: function(xhr, status, error){
            console.log(error)
        }
    })
})

//Favourite the story
$(document).on('click', '.story-favourite-btn', function(e){
    e.preventDefault()
    var icon = $(this).find('.bi-star')
    var story_id = $(this).data('story_id')
    
    var favData = new FormData()
    favData.append('story_id', story_id)

    $.ajax({
        url: '/favourite_story',
        method: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: favData,
        success: function(response){
            if(response.favourite == 'favourited'){
                icon.attr('class', 'bi bi-star-fill')
                $('.story-favourite-btn').prop('disabled', true)

            }
        },
        error: function(xhr, status, error){
            console.log(error)
        }
    })
})

//Report a story - close/open modal
$('.cancel-story-report').on('click', function(e){
    e.preventDefault()
    $('.report-story-modal').hide()

})

$(document).on('click', '.report-story-modal-open', function(e){
    e.preventDefault()
    var story_id = $(this).data('story_id')
    $('.report-story-modal').show()
    $('#story-report-id').val(story_id)
})

var story_report_form = $('#story_report_form')[0]
$(document).on('click', '.submit-story-report', function(e){
    e.preventDefault()
    var storyReportData = new FormData(story_report_form)
    console.log(storyReportData)
    
    $.ajax({
        url: '/report_story',
        method: 'POST',
        dataType: 'json',
        contentType: false,
        processData: false,
        cache: false,
        data: storyReportData,
        success: function(response){
            if(response.required == 'empty'){
                $('.report-modal-errors').show()
                $('.report-modal-errors').html('Please select a reason')
            }

            if(response.auth == 'not_auth'){
                $('.report-modal-errors').show()
                $('.report-modal-errors').html('You must be logged in to do this')
            }

            if(response.report == 'story_reported'){
                $('.report-story-modal .modal-content form').hide()
                $('.report-story-modal .modal-content > p').html('Thank you for your report!')
                setTimeout(function() {
                    $('.report-story-modal').hide()
                }, 2000)
            }
        },
        error: function(xhr, status, error){
            console.log(error)
        }
    })

})