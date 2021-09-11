var hrac, vyherce;

function priStartu() {
    hrac = 'X';
    naTahu.innerText = hrac;
    vymazDesku();
}

function tah() {
    if (this.innerText) {
    alert('Sem nemůžeš táhnout!');
    }
    else {
        this.innerText = hrac;
        if (vyhral(hrac)) {
            vyherce = hrac;
        setTimeout(function() {
            alert('Hráč ' + vyherce + ' vyhrál!');
            vymazDesku();
            }, 50);
    }
    if (hrac == 'X') {
        hrac = 'O';
    }
    else {
        hrac = 'X';
    }
    naTahu.innerText = hrac;
  }
}
