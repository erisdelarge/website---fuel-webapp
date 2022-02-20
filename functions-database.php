<?php

function formatNumber($number){
    return number_format($number, 2, '.');
}
/**
 * Funzione che esegue una select 
 * e restituisce un array con un set di risultati,
 * cioè un array bidimensionale
 */
// la commento perché ora dovrebbe stare nel file "database.php" che contiene la classe Database
// function dbSelect($_query) {
//     global $conn;
//     $result = array();
    
//     $righe = $conn->query($_query);

//     if ($righe->num_rows > 0) {
//         // output data of each row
//         while($row = $righe->fetch_assoc()) {
//            $result[] = $row;
//         }
//     }
//     return $result;
// }

/**
 * Funzione che esegue una select 
 * e restituisce un array con un solo record,
 * cioè un array monodimensionale
 */
// la commento perché ora dovrebbe stare nel file "database.php" che contiene la classe Database
// function dbSelectByID($_query) {

//     $result = dbSelect($_query);

//     return (count($result)>0) ? $result[0] : $result;
// }

/**
 * Funzione che esegue una insert, una update o una delete 
 * e restituisce true o false.
 */
// la commento perché ora dovrebbe stare nel file "database.php" che contiene la classe Database
// function dbQuery($_query) {
//     global $conn;
//     return $conn->query($_query);
// }

/**
 * Funzione che controlla le credenziali inserite
 * e ritorna true in caso di credenziali corrette
 * o ritorna false in caso di credenziali inesistenti
 */
function checkLogin($_email, $_password) {
    $result = false;
    
    if($_email == "info@nicklongo.it" && $_password == "123456"){
        $result = true;
    }

    return $result;
}

/**
 * La funzione serve a formattare una data nel formato desiderato, 
 * di default "GG/MM/AAAA"
 */
function formattaData ($_date, $_format = "d/m/Y") {
    return date($_format, strtotime($_date));
}

/**
 * La funzione serve a ...
 */
function calcolaTempo($_date_1, $_date_2 = "", $format = "%y") {
    $result = 0;
    $_date_2 = ($_date_2 == "") ? date("y-m-d") : $_date_2;
    $date_diff = date_diff(date_create($_date_2),date_create($_date_1));
    if($format == "%m") {
        $mesi_anni = $date_diff->format("%y")*12;
        $mesi = $date_diff->format("%m");
        $result = $mesi + $mesi_anni;
    } else {
        $result = $date_diff->format($format);
    }
    
    return $result;
}


/**
 * La funzione che dato in ingresso un numero e una valuta restituisca 
 * € 1.234,56
 */
function formattaValuta($_numero, $_valuta = "€") {
    $result = "";
    $result = $_valuta." ".number_format($_numero, 2, ",", ".");
    return $result;
}

function formatPrice($number){
    return number_format($number, 2, ',','.');
}

/** 
 * Restituisce l'html di un elemento accordion con i dati delle esperienze
 * @param $_esperienze Array con elementi di tipo stdClass
 * @param $_nome nome dell'utente che serve a dare un id univoco all'accordion
*/
function accordionHtml($_esperienze, $_nome) {

    $html = '<div class="accordion" id="accordionEs'.$_nome.'">';

    foreach($_esperienze as $key=>$esperienza) {

        //$array = json_decode(json_encode($esperienza), true);

        $html .= '<div class="accordion-item">
                    <h2 class="accordion-header" id="heading'.$esperienza->id.'">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$esperienza->id.'" aria-controls="collapse'.$esperienza->id.'">
                        '.$esperienza->ruolo.' - '.$esperienza->azienda.'
                    </button>
                    </h2>
                    <div id="collapse'.$esperienza->id.'" class="accordion-collapse collapse" aria-labelledby="heading'.$esperienza->id.'" data-bs-parent="#accordionEs'.$_nome.'">
                    <div class="accordion-body">
                        <b>Azienda</b>: '.$esperienza->azienda.'<br>
                        <b>Ruolo</b>: '.$esperienza->ruolo.'<br>
                        <b>Mansione</b>: '.$esperienza->mansione.'<br>
                        <b>Date (DA - A)</b>: '.formattaData($esperienza->data_inizio).' - '.formattaData($esperienza->data_fine).' ( '.calcolaTempo($esperienza->data_fine, $esperienza->data_inizio, "%m").' Mesi)<br>

                        '.accordionInterno($esperienza->competenze_acquisite,$esperienza->id).'

                    </div>
                    </div>
                </div>';
    }
    
    $html .= '</div>';

    return $html;

}

function accordionInterno($_competenze, $_id) {

    $html = '<div class="accordion mt-4" id="accordionExample'.$_id.'">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne'.$_id.'">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne'.$_id.'" aria-expanded="true" aria-controls="collapseOne'.$_id.'">
                        Competenze
                        </button>
                    </h2>
                    <div id="collapseOne'.$_id.'" class="accordion-collapse collapse" aria-labelledby="headingOne'.$_id.'" data-bs-parent="#accordionExample'.$_id.'">
                        <div class="accordion-body">
                            <ul>';

    foreach($_competenze as $competenza) {
        $html .= '<li>'.$competenza.'</li>';
    }

    $html .= '</ul></div></div></div></div>';

    return $html;

}

?>