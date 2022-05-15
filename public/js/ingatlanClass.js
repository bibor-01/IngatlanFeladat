class Ingatlan {
    constructor(elem, adat) {
        this.elem = elem;
        this.adat = adat;

        this.erdekelGomb = elem.children(".erdekel");
        this.torolGomb = elem.children(".torol");

        this.kategoria = elem.children(".kategoria");
        this.leiras = elem.children(".leiras");
        this.datum = elem.children(".hirdetesDatuma");
        this.tehermentes = elem.children(".tehermentes");
        this.fenykep = elem.children(".kep").children("img");
        this.setAdatok(this.adat);

        this.erdekelGomb.on("click", () => {
            console.log("erdekel");
            this.kattintasTrigger("erdekel");
        });

        this.torolGomb.on("click", () => {
            console.log("torol");
            this.kattintasTrigger("torol");
        });
    }
    setAdatok(ertekek) {
        this.kategoria.html(ertekek.kategoria.nev);
        this.leiras.html(ertekek.leiras);
        this.datum.html(ertekek.hirdetesDatuma);

        if (ertekek.tehermentes != 1) {
            this.tehermentes.html("nem");
        } else {
            this.tehermentes.html("igen");
        }
        this.fenykep.attr("src", ertekek.kepURL);


    }

    kattintasTrigger(esemenyneve) {
        let esemeny = new CustomEvent(esemenyneve, { detail: this.adat });
        window.dispatchEvent(esemeny);
    }
}
