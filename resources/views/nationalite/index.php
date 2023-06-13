<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Languizz</title>
    <link href="/resources/css/styles.css" rel="stylesheet">
    <link href="/resources/css/nationalite.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"
            integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css"
          integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>

<body>
<div class="container">
    <div class="nav">
        <a href="/profil">
                <span class="material-symbols-outlined iconAccount">
                    account_circle
                </span>
        </a>
    </div>
    <div class="row">
        <div class="col1">

            <div class="minimap">
                <img id="flag" src="" alt="Drapeau" style="display: none;"/>
            </div>
            <div id="divPays" class="pays">
            </div>

            <div id="expression" class="menu-deroulant">
            </div>

        </div>
        <div class="col2">
            <div class="search-bar">
                <i class='bx bxs-location-plus' style="font-size: 30px;color:#2a9d8f; margin-right:20px"></i>
                <input id="search" type="text">
                <i class='bx bx-search-alt-2' style="font-size: 30px;color:#2a9d8f"></i>
            </div>
            <div id="map" class="map">
                <script src="/resources/js/mapdata.js"></script>
                <script src="/resources/js/natio-index.js"></script>
                <script src="/resources/js/worldmap.js"></script>
            </div>
            <div class="choix-sens">
                <div class="sens1 active">
                    <p>
                        Expression entrante
                    </p>
                </div>

                <div class="sens2">
                    <p>
                        Expression sortante
                    </p>
                </div>

            </div>
        </div>

    </div>
</div>
</body>

</html>