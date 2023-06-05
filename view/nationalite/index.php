<?php
 ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Languizz</title>
    <link href="../../assets/styles/styles.css" rel="stylesheet">
    <link href="../../assets/styles/nationalite.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col1">
                <div class="minimap">

                </div>
                <div id="divPays" class="pays">
                    <p>FRANCE</p>
                </div>

                <div class="menu-deroulant">


                </div>

            </div>
            <div class="col2">
                <div class="search-bar">
                    <i class='bx bxs-location-plus' style="font-size: 30px;color:#2a9d8f; margin-right:20px"></i>
                    <input id="search" type="text">
                    <i class='bx bx-search-alt-2' style="font-size: 30px;color:#2a9d8f"></i>
                </div>
                <div id="map" class="map">
                    <script src="../../mapdata.js"></script>
                    <script src="../../worldmap.js"></script>
                </div>
                <div class="choix-sens">

                </div>
            </div>

        </div>
    </div>
</body>

</html>