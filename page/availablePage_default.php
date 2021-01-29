<?php include('template/header.php'); ?>
<?php include('template/menu.php'); 

        // faire un if user.id=1 faire demande1 sinon/*  */
        $jours =['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
        $tranches=['Nuit','Matin','Après-midi','Soir'];
        //action="?route=available&action=store"
?>

        <h1>Formulaire d'indication des disponibilités pour les pompiers</h1>      

        <form method="POST" >
                <label>Semaine :</label>
                <select>                        
                        <option>1 du 01/2021</option>
                        <option>2 du 01/2021</option>
                        <option>3 du 01/2021</option>
                        <option>4 du 01/2021</option>

                </select>
                <input type="submit" value="Enregistrer">

                <table style="width:100%">

                        <caption><h2>Formulaire<h2></caption>
                                <tr><th>Jour</th><th>0-6 Heures</th><th>6-12 Heures</th><th>12-18 Heures</th><th>18-0 Heures</th></tr>
                                <?php
                                $html="";
                                for ($compteur = 0; $compteur <= 6; $compteur++){
                                        $html.="<tr><td>".$jours[$compteur];
                                        
                                        foreach(range(0,3) as $i){      
                                                $html.="</td><td><form><select name=formulaire".$tranches[$i].$jours[$compteur].">";
                                                $html.="<option>Disponible</option>";
                                                $html.="<option>Indisponible</option>";
                                                $html.="<option>Au travail</option>";
                                                $html.="</select>";
                                                $html.="</td>";
                                        }          
                                }
                                echo $html;
                                var_dump($_POST);

                                ?>
        </table>
        </form>

<?php include('template/footer.php'); ?>