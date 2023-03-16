// Click eye to show/hide password
$(document).on('click', '.show-password-1', function(){
    $('#password1').attr('type', 'text')
    $(this).hide()
    $('.hide-password-1').show()
})

$(document).on('click', '.hide-password-1', function(){
    $('#password1').attr('type', 'password')
    $(this).hide()
    $('.show-password-1').show()
})

$(document).on('click', '.show-password-2', function(){
    $('#password2').attr('type', 'text')
    $(this).hide()
    $('.hide-password-2').show()
})

$(document).on('click', '.hide-password-2', function(){
    $('#password2').attr('type', 'password')
    $(this).hide()
    $('.show-password-2').show()
})

$(document).on('click', '.form-agree-label', function(){
    var checkmark = $(this).find('.auth-agree-check')
    checkmark.toggle()
})

//Submit Register Form
var regForm = $('#register-form')[0]

$(document).on('click', '.reg-submit-btn', function(e){
    e.preventDefault()
    var regData = new FormData(regForm)
    $.ajax({
        url: '/create_user',
        method: 'POST',
        dataType: false,
        contentType: false,
        processData: false,
        cache: false,
        data: regData,
        success: function(response){
            if(responseJson.errors){
                console.log('there are errors')
            }
        },
        error: function(error){
            console.log(error.responseJson.errors)
        }
    })
})
