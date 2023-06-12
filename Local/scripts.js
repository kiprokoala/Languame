var btnSuivant1 = document.getElementById('btnSuivant1');
var btnSuivant2 = document.getElementsByClassName('btnSuivant2');
var btnSuivant3 = document.getElementById('btnSuivant3');
var btnSuivant4 = document.getElementById('btnSuivant4');
var btnSuivant5 = document.getElementById('btnSuivant5');

var btnRetour2 = document.getElementById('btnRetour2');
var btnRetour3 = document.getElementById('btnRetour3');
var btnRetour4 = document.getElementById('btnRetour4');
var btnRetour5 = document.getElementById('btnRetour5');

var form1 = document.getElementById('form1');
var form2 = document.getElementById('form2');
var form3 = document.getElementById('form3');
var form4 = document.getElementById('form4');
var form5 = document.getElementById('form5');

var pays = "";
var langue = "";

var typeExpression = "";

var expression = "";
var transliteration = "";
var significationLitterale = "";
var significationIdiomatique = "";

var paysVise = "";

var sens = "";

btnSuivant1.addEventListener('click', function () {
    langue = document.getElementById('langueId').value;
    if (langue != "") {
        form1.style.display = 'none';
        form2.style.display = 'block';
    }
    else {
        alert('Veuillez remplir le champ langue !');
    }
});

for (var i = 0; i < btnSuivant2.length; i++) {
    if (i == 0) {
        btnSuivant2[i].addEventListener('click', function () {
            form2.style.display = 'none';
            form3.style.display = 'block';
        });
    } else if (i == 1) {
        btnSuivant2[i].addEventListener('click', function () {
            form2.style.display = 'none';
            form4.style.display = 'block';
        });
    } else {
        btnSuivant2[i].addEventListener('click', function () {
            form2.style.display = 'none';
            form5.style.display = 'block';
        });
    }
}

btnSuivant3.addEventListener('click', function () {
    expression = document.getElementById('origineId3').value;
    transliteration = document.getElementById('translitterationId3').value;
    significationLitterale = document.getElementById('litteraleId3').value;
    significationIdiomatique = document.getElementById('idiomatiqueId3').value;
    if (expression != "" && significationLitterale != "" && significationIdiomatique != "") {
        alert('Merci pour votre participation !');
    } else {
        alert('Veuillez remplir les champs obligatoires !');
    }
});

btnSuivant4.addEventListener('click', function () {
    expression = document.getElementById('origineId4').value;
    transliteration = document.getElementById('translitterationId4').value;
    significationLitterale = document.getElementById('litteraleId4').value;
    significationIdiomatique = document.getElementById('idiomatiqueId4').value;
    paysVise = document.getElementById('paysViseId4').value;
    if (expression != "" && significationLitterale != "" && significationIdiomatique != "") {
        alert('Merci pour votre participation !');
    } else {
        alert('Veuillez remplir les champs obligatoires !');
    }
});

btnSuivant5.addEventListener('click', function () {
    sens = document.getElementById('sensId5').value;
    expression = document.getElementById('origineId5').value;
    transliteration = document.getElementById('translitterationId5').value;
    significationLitterale = document.getElementById('litteraleId5').value;
    significationIdiomatique = document.getElementById('idiomatiqueId5').value;
    if (expression != "" && significationLitterale != "" && significationIdiomatique != "") {
        alert('Merci pour votre participation !');
    } else {
        alert('Veuillez remplir les champs obligatoires !');
    }
});

btnRetour2.addEventListener('click', function () {
    form2.style.display = 'none';
    form1.style.display = 'block';
});

btnRetour3.addEventListener('click', function () {
    form3.style.display = 'none';
    form2.style.display = 'block';
});

btnRetour4.addEventListener('click', function () {
    form4.style.display = 'none';
    form2.style.display = 'block';
});

btnRetour5.addEventListener('click', function () {
    form5.style.display = 'none';
    form2.style.display = 'block';
});
