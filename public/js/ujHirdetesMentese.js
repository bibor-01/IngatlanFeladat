$(function () {
    let ajax = new AjaxHivas();
    let eleresiUt = "/api/ingatlan";

    $(".kuldes").on("click", function () {
        console.log("küld!");
        let kategoria = $("select[name=kategoriaSelect]").val();
        let leiras = $("#ingatlanLeiras").val();
        let hirdetesDatum = $("#HirdetesDatum").val();
        let ar = 0;
        let kep = $("#fenykepURL").val();
        let tehermentes;

        if ($("#tehermentes").is(":checked")) {
            tehermentes = 1;
            console.log("igen");
        } else {
            tehermentes = 0;
            console.log("nem");
        }

        let adat = {
            kategoria: kategoria,
            leiras: leiras,
            hirdetesDatuma: hirdetesDatum,
            ar: ar,
            kepURL: kep,
            tehermentes: tehermentes,
        };
        console.log(adat);

        ajax.postAjax(eleresiUt, adat);
        location.reload();
    });
});
