$(function () {
    let ajax = new AjaxHivas();
    let eleresiUt = "/api/ingatlan";

    function ingatlanLista(tomb) {
        const szuloElem = $(".table");
        const sablonElem = $(".elemek");

        tomb.forEach(function (adat) {
            let ujElem = sablonElem.clone().appendTo(szuloElem);
            const ujIngatlan = new Ingatlan(ujElem, adat);
        });

        sablonElem.remove();
    }
    ajax.getAjax(eleresiUt, ingatlanLista);

    $(window).on("erdekel", (event) => {
        console.log("modosit ingt");
        alert(event.detail.leiras+
            event.detail.nev+
            event.detail.ar);
    });

    $(window).on("torol", (event) => {
        console.log("töröl");
        ajax.deleteAjax(eleresiUt,event.detail.id);
        location.reload();
    });

    $(".torol").hide();

});
