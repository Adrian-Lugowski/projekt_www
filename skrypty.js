$(document).ready(function() {

    $("#gallery-item").on("click", "img", function(){
        $("#big").attr("src", $(this).attr("src"));
    });

    $('.tab-button').on('click', function () {
        const targetTab = $(this).attr('id') === 'reviews-tab' ? '#reviews-section' : '#comments-section';

        $('.tab-content').hide();
        $(targetTab).show();

        $('.tab-button').removeClass('active');
        $(this).addClass('active');
    });

    $('.tab-button').first().click();

    $('#form').submit(function(){
        if(!$('#form input[type="checkbox"]').is(':checked')){
          alert("Wybierz przynajmniej jedną konsolę.");
          return false;
        }
    });
});
