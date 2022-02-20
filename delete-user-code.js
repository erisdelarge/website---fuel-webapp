var eliminaModal = new bootstrap.Modal(document.getElementById('eliminaUser'), {});
 // Collegare tutti i button con classe elimina all'evento click dopo averli aggiunti alla pagina html
 $('.eliminaUser').on('click', function() {
    //Leggiamo l'id e il name del campione nella tabella
    var userid= $(this).attr('data-id');
    var nome = $('#name' + userid).html();
            //Scriviamo i valori letti nel modal
            $('#usernamee').html(nome);
    // var nome = $('#name' + userid).html();
    //Scriviamo i valori letti nel modal
    // $('#champname').html(nome);
    $('#yesElimina').attr('data-id', userid);
    $('#yesElimina').attr('href', 'elimina_utente.php?id='+ userid);
    //Mostrare il modal
    eliminaModal.show(); 
  
});

$(".chiudi-modal").on('click', function() {
    eliminaModal.hide();
})
$(".annulla").on('click', function() {
    eliminaModal.hide();
})