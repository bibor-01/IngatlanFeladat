class Kategoria {
    constructor(elem, adat) {
        this.elem = elem;
        this.adat = adat;
        this.elem.html(this.adat.nev);
        this.elem.val(this.adat.id);
    }
}
