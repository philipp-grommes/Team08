<div class="container mt-5" style="display: flex; align-items: center; justify-content: center">
    <div class="card w-100">

            <div class="card-header d-flex justify-content-between">
                <strong>
                    <h1 class="fs-4">Spalte erstellen</h1>
                </strong>
            </div>

        <div class="card-body">
            <fieldset>
                <div class="row mb-2">
                    <label for="designation" class="col-sm-2 col-form-label">Spalten-Bezeichnung</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="designation" name="designation" placeholder="Bezeichnung für die Spalte">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="description" class="col-sm-2 col-form-label">Spalten-Beschreibung</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="description" rows="4" style="resize : none" name="description" placeholder=""></textarea>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="sortid" class="col-sm-2 col-form-label">Sortid</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="sortid" name="sortid" placeholder="Sortid angeben">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="board" class="col-sm-2 col-form-label">Board auswählen</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="board" name="board">
                            <option value="todos">Allgemeine Todos</option>
                            <option value="inprogress">In Bearbeitung</option>
                            <option value="done">Erledigt</option>
                        </select>
                    </div>
                </div>
            </fieldset>
            <div class="row mt-4">
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-success mb-2 me-2" name="btnSpeichern" id="btnSpeichern">
                        Speichern
                    </button>
                </div>
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-secondary mb-2 me-2" name="btnAbbrechen" id="btnAbbrechen">
                        Abbrechen
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

