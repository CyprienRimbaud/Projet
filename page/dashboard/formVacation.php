<div class="row">
    <div class="col-sm-6">
        <!-- Select multiple-->
        <div class="form-group">
            <label>Nouvelle demande</label>

            <form name = "test" action ="?route=dashboard&action=vacation" method="post">

                <label for="dataResa">Du : </label>
                <input type="date" name="dateResa">
                <label for="dataResa">au : </label>
                <input type="date" name="dateResa">

                <select multiple class="form-control">
                    <option selected value="CP">Congés annuels</option>
                    <option value="CS">Congés sans solde</option>
                    <option value="CC">Congés pour événements familial</option>
                    <option value="AA">Absence autorisée</option>
                    <option value="RTT">Jour de réduction du temps de travail</option>
                </select>

                <input type="submit" value="Valider">

            </form>
            <small><?php var_dump($_POST['test']);?></small>
        </div>
    </div>
</div>





