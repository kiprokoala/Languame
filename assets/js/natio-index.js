$(document).ready(function () {
  console.log("début");
  var search = $("#search");

  var choix_sens;
  // slider choix sens
  $('.sens1').on('click', function () {
    $('.sens1').addClass('active');
    $('.sens2').removeClass('active');
    choix_sens = 1;

  
  });
  $('.sens2').on('click', function () {
    $('.sens2').addClass('active');
    $('.sens1').removeClass('active');
    choix_sens = 2;
  });

  search.autocomplete({
    source: function (request, response) {
      $.ajax({
        url: "/search",
        dataType: "json",
        data: {
          term: request.term,
        },
        success: function (data) {
          response(
            $.map(data, function (item) {
              return {
                label: item.nomPays,
                value: item.nomPays,
                id: item.id_pays,
              };
            })
          );
        },
      });
    },
    minLength: 1,
    select: function (event, ui) {
      $("#expression").empty();
      $("#search").val(ui.item.value);
      $("#search-hidden").val(ui.item.id);
      getCodeByPays(ui.item.value);
      getInputValue();
      return false;
    },
  });

  var simplemaps_worldmap_mapdata = {
    main_settings: {
      //General settings
      width: "responsive", //'700' or 'responsive'
      height: "responsive",
      background_color: "#75CFF0",
      background_transparent: "no",
      border_color: "#000",
      popups: "detect",

      //State defaults
      state_description: "Cliquez pour voir les expressions",
      state_color: "#E2ECBD",
      state_hover_color: "#3B729F",
      state_url: "",
      border_size: "0.3",
      all_states_inactive: "no",
      all_states_zoomable: "no",

      //Location defaults
      location_description: "Location description",
      location_color: "#FF0067",
      location_opacity: 0.9,
      location_hover_opacity: 1,
      location_url: "",
      location_size: 2.5,
      location_type: "square",
      location_image_source: "",
      location_border_color: "#FFFFFF",
      location_border: 0.3,
      location_hover_border: 1,
      all_locations_inactive: "no",
      all_locations_hidden: "no",

      //Label defaults
      label_color: "#d5ddec",
      label_hover_color: "#d5ddec",
      label_size: 22,
      label_font: "Arial",
      hide_labels: "no",

      //Zoom settings
      zoom: "yes",
      back_image: "no",
      initial_back: "no",
      initial_zoom: -1,
      initial_zoom_solo: "no",
      region_opacity: 1,
      region_hover_opacity: 0.6,
      zoom_out_incrementally: "yes",
      zoom_percentage: 0.99,
      zoom_time: 0.5,

      //Popup settings
      popup_color: "white",
      popup_opacity: 0.9,
      popup_shadow: 1,
      popup_corners: 5,
      popup_font: "12px/1.5 Verdana, Arial, Helvetica, sans-serif",
      popup_nocss: "no",

      //Advanced settings
      div: "map",
      auto_load: "yes",
      url_new_tab: "yes",
      images_directory: "default",
      fade_time: 0.1,
      link_text: "View Website",
      state_image_url: "",
      state_image_position: "",
      location_image_url: "",
    },
    state_specific: {
      AF: {
        name: "Afghanistan",
        state_color: "#ffffff",
      },
      AO: {
        name: "Angola",
      },
      AL: {
        name: "Albanie",
      },
      AE: {
        name: "Émirats arabes unis",
      },
      AR: {
        name: "Argentine",
      },
      AM: {
        name: "Arménie",
      },
      AU: {
        name: "Australie",
      },
      AT: {
        name: "Autriche",
      },
      AZ: {
        name: "Azerbaïdjan",
      },
      BI: {
        name: "Burundi",
      },
      BE: {
        name: "Belgique",
      },
      BJ: {
        name: "Bénin",
      },
      BF: {
        name: "Burkina Faso",
      },
      BD: {
        name: "Bangladesh",
      },
      BG: {
        name: "Bulgarie",
      },
      BH: {
        name: "Bahreïn",
      },
      BA: {
        name: "Bosnie-Herzégovine",
      },
      BY: {
        name: "Biélorussie",
      },
      BZ: {
        name: "Belize",
      },
      BO: {
        name: "Bolivie",
      },
      BR: {
        name: "Brésil",
      },
      BN: {
        name: "Brunéi Darussalam",
      },
      BT: {
        name: "Bhoutan",
      },
      BW: {
        name: "Botswana",
      },
      CF: {
        name: "République centrafricaine",
      },
      CA: {
        name: "Canada",
      },
      CH: {
        name: "Suisse",
      },
      CL: {
        name: "Chili",
      },
      CN: {
        name: "Chine",
      },
      CI: {
        name: "Côte d'Ivoire",
      },
      CM: {
        name: "Cameroun",
      },
      CD: {
        name: "République démocratique du Congo",
      },
      CG: {
        name: "Congo",
      },
      CO: {
        name: "Colombie",
      },
      CR: {
        name: "Costa Rica",
      },
      CU: {
        name: "Cuba",
      },
      CZ: {
        name: "République tchèque",
      },
      DE: {
        name: "Allemagne",
      },
      DJ: {
        name: "Djibouti",
      },
      DK: {
        name: "Danemark",
      },
      DO: {
        name: "République dominicaine",
      },
      DZ: {
        name: "Algérie",
      },
      EC: {
        name: "Équateur",
      },
      EG: {
        name: "Égypte",
      },
      ER: {
        name: "Érythrée",
      },
      EE: {
        name: "Estonie",
      },
      ET: {
        name: "Éthiopie",
      },
      FI: {
        name: "Finlande",
      },
      FJ: {
        name: "Fidji",
      },
      GA: {
        name: "Gabon",
      },
      GB: {
        name: "Royaume-Uni",
      },
      GE: {
        name: "Géorgie",
      },
      GH: {
        name: "Ghana",
      },
      GN: {
        name: "Guinée",
      },
      GM: {
        name: "Gambie",
      },
      GW: {
        name: "Guinée-Bissau",
      },
      GQ: {
        name: "Guinée équatoriale",
      },
      GR: {
        name: "Grèce",
      },
      GL: {
        name: "Groenland",
      },
      GT: {
        name: "Guatémala",
      },
      GY: {
        name: "Guyana",
      },
      HN: {
        name: "Honduras",
      },
      HR: {
        name: "Croatie",
      },
      HT: {
        name: "Haïti",
      },
      HU: {
        name: "Hongrie",
      },
      ID: {
        name: "Indonésie",
      },
      IN: {
        name: "Inde",
      },
      IE: {
        name: "Irlande",
      },
      IR: {
        name: "Iran",
      },
      IQ: {
        name: "Irak",
      },
      IS: {
        name: "Islande",
      },
      IL: {
        name: "Israël",
      },
      IT: {
        name: "Italie",
      },
      JM: {
        name: "Jamaïque",
      },
      JO: {
        name: "Jordanie",
      },
      JP: {
        name: "Japon",
      },
      KZ: {
        name: "Kazakhstan",
      },
      KE: {
        name: "Kenya",
      },
      KG: {
        name: "Kirghizistan",
      },
      KH: {
        name: "Cambodge",
      },
      KR: {
        name: "Corée du Sud",
      },
      XK: {
        name: "Kosovo",
      },
      KW: {
        name: "Koweït",
      },
      LA: {
        name: "République démocratique populaire lao",
      },
      LB: {
        name: "Liban",
      },
      LR: {
        name: "Libéria",
      },
      LY: {
        name: "Libye",
      },
      LK: {
        name: "Sri Lanka",
      },
      LS: {
        name: "Lesotho",
      },
      LT: {
        name: "Lituanie",
      },
      LU: {
        name: "Luxembourg",
      },
      LV: {
        name: "Lettonie",
      },
      MA: {
        name: "Maroc",
      },
      MD: {
        name: "Moldavie",
      },
      MG: {
        name: "Madagascar",
      },
      MX: {
        name: "Mexique",
      },
      MK: {
        name: "Macédoine",
      },
      ML: {
        name: "Mali",
      },
      MM: {
        name: "Myanmar",
      },
      ME: {
        name: "Monténégro",
      },
      MN: {
        name: "Mongolie",
      },
      MZ: {
        name: "Mozambique",
      },
      MR: {
        name: "Mauritanie",
      },
      MW: {
        name: "Malawi",
      },
      MY: {
        name: "Malaisie",
      },
      NA: {
        name: "Namibie",
      },
      NE: {
        name: "Niger",
      },
      NG: {
        name: "Nigéria",
      },
      NI: {
        name: "Nicaragua",
      },
      NL: {
        name: "Pays-Bas",
      },
      NO: {
        name: "Norvège",
      },
      NP: {
        name: "Népal",
      },
      NZ: {
        name: "Nouvelle-Zélande",
      },
      OM: {
        name: "Oman",
      },
      PK: {
        name: "Pakistan",
      },
      PA: {
        name: "Panama",
      },
      PE: {
        name: "Pérou",
      },
      PH: {
        name: "Philippines",
      },
      PG: {
        name: "Papouasie-Nouvelle-Guinée",
      },
      PL: {
        name: "Pologne",
      },
      KP: {
        name: "République populaire démocratique de Corée",
      },
      PT: {
        name: "Portugal",
      },
      PY: {
        name: "Paraguay",
      },
      PS: {
        name: "Palestine",
      },
      QA: {
        name: "Qatar",
      },
      RO: {
        name: "Roumanie",
      },
      RU: {
        name: "Russie",
      },
      RW: {
        name: "Rwanda",
      },
      EH: {
        name: "Sahara occidental",
      },
      SA: {
        name: "Arabie saoudite",
      },
      SD: {
        name: "Soudan",
      },
      SS: {
        name: "Soudan du Sud",
      },
      SN: {
        name: "Sénégal",
      },
      SL: {
        name: "Sierra Leone",
      },
      SV: {
        name: "El Salvador",
      },
      RS: {
        name: "Serbie",
      },
      SR: {
        name: "Suriname",
      },
      SK: {
        name: "Slovaquie",
      },
      SI: {
        name: "Slovénie",
      },
      SE: {
        name: "Suède",
      },
      SZ: {
        name: "Eswatini",
      },
      SY: {
        name: "Syrie",
      },
      TD: {
        name: "Tchad",
      },
      TG: {
        name: "Togo",
      },
      TH: {
        name: "Thaïlande",
      },
      TJ: {
        name: "Tadjikistan",
      },
      TM: {
        name: "Turkménistan",
      },
      TL: {
        name: "Timor-Leste",
      },
      TN: {
        name: "Tunisie",
      },
      TR: {
        name: "Turquie",
      },
      TW: {
        name: "Taïwan",
      },
      TZ: {
        name: "Tanzanie",
      },
      UG: {
        name: "Ouganda",
      },
      UA: {
        name: "Ukraine",
      },
      UY: {
        name: "Uruguay",
      },
      US: {
        name: "États-Unis",
      },
      UZ: {
        name: "Ouzbékistan",
      },
      VE: {
        name: "Venezuela",
      },
      VN: {
        name: "Viêt Nam",
      },
      VU: {
        name: "Vanuatu",
      },
      YE: {
        name: "Yémen",
      },
      ZA: {
        name: "Afrique du Sud",
      },
      ZM: {
        name: "Zambie",
      },
      ZW: {
        name: "Zimbabwe",
      },
      SO: {
        name: "Somalie",
      },
      GF: {
        name: "Guyane française",
      },
      FR: {
        name: "France",
      },
      ES: {
        name: "Espagne",
      },
      AW: {
        name: "Aruba",
      },
      AI: {
        name: "Anguilla",
      },
      AD: {
        name: "Andorre",
      },
      AG: {
        name: "Antigua-et-Barbuda",
      },
      BS: {
        name: "Bahamas",
      },
      BM: {
        name: "Bermudes",
      },
      BB: {
        name: "Barbade",
      },
      KM: {
        name: "Comores",
      },
      CV: {
        name: "Cap-Vert",
      },
      KY: {
        name: "Îles Caïmans",
      },
      DM: {
        name: "Dominique",
      },
      FK: {
        name: "Îles Falkland",
      },
      FO: {
        name: "Îles Féroé",
      },
      GD: {
        name: "Grenade",
      },
      HK: {
        name: "Hong Kong",
      },
      KN: {
        name: "Saint-Christophe-et-Niévès",
      },
      LC: {
        name: "Sainte-Lucie",
      },
      LI: {
        name: "Liechtenstein",
      },
      MF: {
        name: "Saint-Martin (français)",
      },
      MV: {
        name: "Maldives",
      },
      MT: {
        name: "Malte",
      },
      MS: {
        name: "Montserrat",
      },
      MU: {
        name: "Maurice",
      },
      NC: {
        name: "Nouvelle-Calédonie",
      },
      NR: {
        name: "Nauru",
      },
      PN: {
        name: "Îles Pitcairn",
      },
      PR: {
        name: "Porto Rico",
      },
      PF: {
        name: "Polynésie française",
      },
      SG: {
        name: "Singapour",
      },
      SB: {
        name: "Îles Salomon",
      },
      ST: {
        name: "Sao Tomé-et-Principe",
      },
      SX: {
        name: "Saint-Martin (néerlandais)",
      },
      SC: {
        name: "Seychelles",
      },
      TC: {
        name: "Îles Turques-et-Caïques",
      },
      TO: {
        name: "Tonga",
      },
      TT: {
        name: "Trinité-et-Tobago",
      },
      VC: {
        name: "Saint-Vincent-et-les-Grenadines",
      },
      VG: {
        name: "Îles Vierges britanniques",
      },
      VI: {
        name: "Îles Vierges des États-Unis",
      },
      CY: {
        name: "Chypre",
      },
      RE: {
        name: "Réunion (France)",
      },
      YT: {
        name: "Mayotte (France)",
      },
      MQ: {
        name: "Martinique (France)",
      },
      GP: {
        name: "Guadeloupe (France)",
      },
      CW: {
        name: "Curaçao (Pays-Bas)",
      },
      IC: {
        name: "Îles Canaries (Espagne)",
      },
    },
    labels: {},
    legend: {
      entries: [],
    },
    regions: {},
  };
});
