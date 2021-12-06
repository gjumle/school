//Zápis ifu na jeden řádek
a = b == 4 ? 1:7;


//Použítí modula a logických operátorů
if (a % 2 == 1 && b % 2 == 1) {
    window.alert("Vsechna cisla jsou licha")
}
else {
    window.alert("Vsechna cisla jsou suda")
}

//Vytvoření jednoduché sčítací funkce
function scitacka (a, b) {
    return a + b
}

//Objekty
const car = {type:"Fiat", model:"500", color:"White"};

//Volání objektů
var caros = car.type + " " + car.color