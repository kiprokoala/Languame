<?php
require_once("resources/views/header.html");
?>

<body style="background-color: #d5d5d5;">
    <div class="container d-flex justify-content-center mt-5" >
        <div class="card text-dark bg-light mt-5 shadow" style="width: 400px; border-radius: 15px;">
            <div class="card-body">
                <form action="typeExpression.php" method="GET">
                    <div class="mb-3">
                        <label for="paysId" class="form-label">Pays :</label>
                        <select class="form-select" name="pays" id="paysId">
                            <option value="1">France</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="langueId" class="form-label">Langue :</label>
                        <input type="text" class="form-control" id="langueId" name="langue">
                    </div>
                    <button type="submit" class="btn form-control text-light" style="background-color:  #92de85;">Suivant</button>
                </form>
            </div>
        </div>
    </div>
</body>

<?php
require_once("resources/views/footer.html");
?>