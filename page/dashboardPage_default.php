<?php include('template/header.php'); 
include('../page/template/menu.php'); ?>

        <h1>Votre tableau bord</h1>
    <table class="table table-dark table-sm">
        <tr><th>Demandes</th><th>Date</th><th>Etat</th><th></th></tr>
        <?php
        $html="";
        for($compteur = 0; $compteur < count($userVacationData);$compteur++){
            $html.= '<tr><td>Demande numéro: '.$userVacationData[$compteur]['id'].'';
            $html.= '<td>'.$userVacationData[$compteur]['start'].'';
            $html.= " au ".$userVacationData[$compteur]['end'].'';
            $html.= '</td>';
            $html.= '<td>'.$userVacationData[$compteur]['status'].'</td>';
            $html.= '<td><div class="btn-group" role="group" aria-label="Basic mixed styles example">';
            $html.= '<button class="btn btn-danger">Supprimer</button></div></td>';
        }


        echo $html;
        ?>
    </table>
<p><a href="?route=dashboard&action=trash"> Corbeille </a></p>

        <h2>Nouvelle demande:</h2>
<form name="add" method="post">
    <p>Choisissez votre semaine :</p>
    <select name="age" onchange="showUser(this.value)">
        <option>Semaine 1</option>
        <option>Semaine 2</option>
        <option>Semaine 3</option>
    </select>
</form>



<p><b>Start typing a name in the input field below:</b></p>
<form action="">
    <label for="fname">First name:</label>
    <input type="text" id="fname" name="fname" onkeyup="showHint(this.value)">
</form>
<p>Suggestions: <span id="txtHint"></span></p>

<?php
// Array with names
$a[] = "Anna";
$a[] = "Brittany";
$a[] = "Cinderella";
$a[] = "Diana";
$a[] = "Eva";
$a[] = "Fiona";
$a[] = "Gunda";
$a[] = "Hege";
$a[] = "Inga";
$a[] = "Johanna";
$a[] = "Kitty";
$a[] = "Linda";
$a[] = "Nina";
$a[] = "Ophelia";
$a[] = "Petunia";
$a[] = "Amanda";
$a[] = "Raquel";
$a[] = "Cindy";
$a[] = "Doris";
$a[] = "Eve";
$a[] = "Evita";
$a[] = "Sunniva";
$a[] = "Tove";
$a[] = "Unni";
$a[] = "Violet";
$a[] = "Liza";
$a[] = "Elizabeth";
$a[] = "Ellen";
$a[] = "Wenche";
$a[] = "Vicky";

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>

<?php include('template/footer.php'); ?>


