class Pety {
    constructor(a,b) {
        this.name = a;
        this.age = b;
    }
    renderName() {
        alert(this.name);
        alert(this.age);
    }
}
new Pety('Vasya',33).renderName();