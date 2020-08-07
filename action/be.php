<?php
error_reporting(E_ALL || ~E_NOTICE);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='../assets/css/style.css'>
    <link rel='stylesheet' href='../assets/vendor/css/sweet-alert.css'>
    <link rel='shortcut icon' href='../assets/data_favicon.png' />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jq-3.3.1/jszip-2.5.0/dt-1.10.21/af-2.3.5/b-1.6.3/b-colvis-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/r-2.2.5/sp-1.1.1/datatables.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title> Bénéficiares Effectifs </title>
</head>

<?php

@$siren = $_GET["siren"];
@$codeGreffe = $_GET["codeGreffe"];
@$libelleFormeJuridique = $_GET["libelleFormeJuridique"];
@$prenomBE = $_GET["prenomBE"];
@$numDepot = $_GET["numDepot"];

function getOpendata($siren = null, $codeGreffe = null, $libelleFormeJuridique = null, $prenomBE = null, $numDepot = null)
{
    $authorization = "Authorization: apikey 767b3e8fe70a3df80dc5d36ee051777e541757b590cbaa2870185f7a";

    $rows = [];
    $filter = null;
    if ($siren) {
        $filter .= "siren%3D" . $siren . "+";
    }
    if ($codeGreffe) {
        $filter .= "codeGreffe%3D" . $codeGreffe . "+";
    }
    if ($libelleFormeJuridique) {
        $filter .= "libelleFormeJuridique%3D" . $libelleFormeJuridique . "+";
    }
    if ($prenomBE) {
        $filter .= "prenomBE%3D" . $prenomBE . "+";
    }
    if ($numDepot) {
        $filter .= "numDepot%3D" . $numDepot . "+";
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, array($authorization));
    curl_setopt($ch, CURLOPT_URL, "https://opendata.datainfogreffe.fr/api/records/1.0/search/?dataset=beffectifs&q=$filter&rows=10000&sort=siren&facet=siren&facet=codegreffe&facet=libelleformejuridique&facet=prenomsbeneficiaireeffectif&facet=numerodepot");
    // curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);

    $res = curl_exec($ch);

    curl_close($ch);

    return json_decode($res, true);
}

$res = getOpendata($siren, $codeGreffe, $libelleFormeJuridique, $prenomBE, $numDepot);

//var_dump($res["records"]);

?>

<body>
    <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Siren</th>
                <th>Prénom bénéficiaire effectif</th>
                <th>Code postal domicile bénéficiaire effectif</th>
                <th>libelleformejuridique</th>
                <th>datesaisie</th>
                <th>codeformejuridique</th>
                <th>codepostalsiegesocial</th>
                <th>dateacte</th>
                <th>payssiegesocial</th>
                <th>datedepot</th>
                <th>departementpaysnaissancebeneficiaireeffectif</th>
                <th>codecommuneinsee</th>
                <th>datenaissancebeneficiaireeffectif</th>
                <th>numeroacte</th>
                <th>coderetour</th>
                <th>denominationsociale</th>
                <th>paysdomicilebeneficiaireeffectif</th>
                <th>codecommuneinseedomicilebeneficiaireeffectif</th>
                <th>typedeclaration</th>
                <th>adressedomicilebeneficiaireeffectif</th>
                <th>nationalitebeneficiaireeffectif</th>
                <th>numerodepot</th>
                <th>codegreffe</th>
                <th>paysnaissancebeneficiaireeffectif</th>
                <th>communesiegesocial</th>
                <th>communenaissancebeneficiaireeffectif</th>
                <th>civilitebeneficiaireeffectif</th>
                <th>communedomicilebeneficiaireeffectif</th>
                <th>nombredebeneficiaireeffectif</th>
                <th>codecommuneinseenaissancebeneficiaireeffectif</th>
                <th>nompatronymiquebeneficiaireeffectif</th>
                <th>representantlegalestbeneficiaireeffectif</th>
                <th>adressesiegesocial</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>323191106</td>
                <td>LAURENCE MARCELLE</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td><i>Null</i></td>
                <td>33063</td>
            </tr>
            <tr>
                <td>323191106</td>
                <td>RICHARD PIERRE PHILIPPE</td>
                <td>33318</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td><i>Null</i></td>
                <td>33063</td>
            </tr>
            <tr>
                <td>323191106</td>
                <td>Delphine Agnès Béatrice</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td><i>Null</i></td>
                <td>33063</td>
            </tr>
            <tr>
                <td>323191106</td>
                <td>Franck Frédéric</td>
                <td>33234</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td><i>Null</i></td>
                <td>33063</td>
            </tr>
            <tr>
                <td>323191106</td>
                <td>PIERRE OLIVIER</td>
                <td>33522</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td><i>Null</i></td>
                <td>33063</td>
            </tr>
            <tr>
                <td>323191106</td>
                <td>Philippe</td>
                <td>33115</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td><i>Null</i></td>
                <td>33063</td>
            </tr>
            <tr>
                <td>323191106</td>
                <td>François</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td><i>Null</i></td>
                <td>33063</td>
            </tr>
            <tr>
                <td>323191106</td>
                <td>MICHEL JEAN LOU</td>
                <td>33047</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td><i>Null</i></td>
                <td>33063</td>
            </tr>
            <tr>
                <td>323191106</td>
                <td>Sophie</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td><i>Null</i></td>
                <td>33063</td>
            </tr>
            <tr>
                <td>323191106</td>
                <td>Patrick</td>
                <td>33000</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td><i>Null</i></td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td>33063</td>
                <td><i>Null</i></td>
                <td>33063</td>
            </tr>
        </tbody>
    </table>
    </doby>

    <script src='../assets/js/script.js'></script>
    <script src='../assets/vendor/js/jquery-3.4.1.min.js'></script>
    <script src='../assets/vendor/js/sweet-alert.js'></script>
    <script src='../assets/vendor/js/classie.js'></script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js'></script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js'></script>
    <script type='text/javascript'
        src='https://cdn.datatables.net/v/dt/jq-3.3.1/jszip-2.5.0/dt-1.10.21/af-2.3.5/b-1.6.3/b-colvis-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/r-2.2.5/sp-1.1.1/datatables.min.js'></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                responsive: true,
                "scrollX": true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel'
                ],
                language: {
                    processing: "Traitement en cours...",
                    search: "Rechercher&nbsp;:",
                    lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
                    info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                    infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                    infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    infoPostFix: "",
                    loadingRecords: "Chargement en cours...",
                    zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    emptyTable: "Aucune donnée disponible dans le tableau",
                    paginate: {
                        first: "Premier",
                        previous: "Pr&eacute;c&eacute;dent",
                        next: "Suivant",
                        last: "Dernier"
                    },
                    aria: {
                        sortAscending: ": activer pour trier la colonne par ordre croissant",
                        sortDescending: ": activer pour trier la colonne par ordre décroissant"
                    }
                }
            });
        });
    </script>