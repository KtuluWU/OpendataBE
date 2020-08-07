console.log("Auteur: Yun WU");

function getData() {
    var siren = document.form_BE.siren.value.replace(/\s+/g, "");
    var codeGreffe = document.form_BE.codeGreffe.value;
    var libelleFormeJuridique = document.form_BE.libelleFormeJuridique.value;
    var prenomBE = document.form_BE.prenomBE.value;
    var numDepot = document.form_BE.numDepot.value;
    var url = "./action/be.php";
    var data = new FormData();

    if (!siren && !codeGreffe && !libelleFormeJuridique && !prenomBE && !numDepot) {
        swal({
            title: "Échoué!",
            text: "Veuillez renseigner au moins un facet!",
            type: "error"
        })
    } else {
        siren = siren_checked(siren);
        if (siren) {
            url += "?siren="+siren+"&codeGreffe="+codeGreffe+"&libelleFormeJuridique="+libelleFormeJuridique+"&prenomBE="+prenomBE+"&numDepot="+numDepot;
            window.location.href = url;
        }
    }
}

function getOpendata() {
    
}

function siren_checked(siren) {
    var len = siren.length;

    if (siren != null ) {
        if (siren.length > 9) {
            swal({
                title: "Échoué!",
                text: "Siren non disponible!",
                type: "error"
            })
            return false;
        } else {
            for (let i = 0; i < (9 - len); i++) {
                siren = "0" + siren;
            }
        }
    } else return null;

    return siren;
}


function getSelectValues(select) {
    var result = [];
    var options = select && select.options;
    var opt;

    for (var i = 0, iLen = options.length; i < iLen; i++) {
        opt = options[i];

        if (opt.selected) {
            result.push(opt.value || opt.text);
        }
    }
    return result;
}