import './bootstrap';
$(document).ready(function(){

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








})