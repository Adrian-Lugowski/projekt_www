$(document).ready(function() {
    $('#zgloszenieForm').submit(function(event) {
        event.preventDefault(); 

        $.post('report_smth.php', $(this).serialize(), function(response) {
            alert("Zgłoszenie zostało dodane.");
        }).fail(function() {
            alert("Wystąpił błąd podczas wysyłania zgłoszenia.");
        });
    });
});