<?php
require_once("resources/views/header.html");

$pays = $_GET["pays"];
$langue = $_GET["langue"];

?>

<body style="background-color: #d5d5d5;">
    <div class="container d-flex justify-content-center mt-5" style="width: max-width; height: max-height;">
        <div class="card text-dark bg-light mb-3 mt-5 shadow" style="width: 400px; border-radius: 15px;">
            <div class="card-body">
                <form action="" method="GET">

                    <div class="mb-3">
                        <button type="submit" class="btn form-control text-light" style="background-color:  #92de85;" value="Difficilement_traduisible" name="difficilTraduisible">Difficilement traduisible</button>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn form-control text-light" style="background-color:  #92de85;" value="Qui_vise_un_pays" name="visePays">Qui vise un pays</button>
                    </div>
                    <div>
                        <button type="submit" class="btn form-control text-light" style="background-color:  #92de85;" value="Exprimer_un_sens_donné" name="sensDonné">Exprimer un sens donné</button>
                    </div>


                    <div class="mb-3" style="display: none;">
                        <label for="paysId" class="form-label">Pays :</label>
                        <input type="text" class="form-control" id="paysId" name="pays" value="<?php echo $pays; ?>">
                    </div>
                    <div class="mb-3" style="display: none;">
                        <label for="langueId" class="form-label">Langue :</label>
                        <input type="text" class="form-control" id="langueId" name="langue" value="<?php echo $langue; ?>">
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

<?php
require_once("resources/views/footer.html");
?>