$(document).ready(function() {
    $(".fav").on("click", function() {
        const img = $(this);
        $.post("changeFav.php", { idGry: img.data("gra") }, function(data) {
            img.attr("src", (img.attr("src") == "obrazki/unlike.png") ? "obrazki/like.png" : "obrazki/unlike.png");     
        });
        
    });
});