<div class="row">
    <div class="col-sm-6">
        <!-- Select multiple-->
        <div class="form-group">
            <label>Nouvelle demande</label>

            <form method="post" action ="?route=dashboard&action=store">

                <label for="dataResa">Du : </label>
                <input type="date" name="dateStart">
                <label for="dataResa">au : </label>
                <input type="date" name="dateEnd">

                <select name ="typeVacation" multiple class="form-control">
                    <option selected value="1">Congés annuels</option>
                    <option value="2">Congés sans solde</option>
                    <option value="3">Congés pour événements familial</option>
                    <option value="4">Absence autorisée</option>
                    <option value="5">Jour de réduction du temps de travail</option>
                </select>

                <input type="submit" value="Valider">
            </form>
        </div>
    </div>
</div>





