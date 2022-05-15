$(function () {
    let ajax = new AjaxHivas();
    let eleresiUt = "/api/kategoria";

    function tevekenysegLista(tomb) {
        const szuloElem = $(".kategoriaSelect");
        const sablonElem = $(".kategoriaElem");

        tomb.forEach(function (adat) {
            let ujElem = sablonElem.clone().appendTo(szuloElem);
            const ujKategoria = new Kategoria(ujElem, adat);

        });
        sablonElem.remove();
    }
    ajax.getAjax(eleresiUt, tevekenysegLista);
});
