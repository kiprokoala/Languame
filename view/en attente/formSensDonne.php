<?php
require_once('header.html');
?>

<body style="background-color: #d5d5d5;">
    <div class="container d-flex justify-content-center mt-5" style="width: max-width; height: max-height;">
        <div class="card text-dark bg-light mt-5 shadow" style="width: 400px; border-radius: 15px;">
            <div class="card-body">
                <form action="" method="GET">
                <div class="mb-3">
                        <label for="sensId" class="form-label">Selectionner un sens :</label>
                        <select class="form-select" name="sens" id="sensId">
                            <option value="1">un sens</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="origineId" name="origine" placeholder="Expression dans la langue d'origine">
                    </div>
                    <div class="mb-3">
                    <input type="text" class="form-control" id="translitterationId" name="translitteration" placeholder="Translittération (si nécessaire)">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="litteraleId" name="littérale" placeholder="Signification littérale">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="idiomatiqueId" name="idiomatique" placeholder="Signification idiomatique">
                    </div>
                    <button type="submit" class="btn form-control text-light" style="background-color:  #92de85;">Suivant</button>
                </form>
            </div>
        </div>
    </div>
</body>

<?php
require_once('footer.html');
?>