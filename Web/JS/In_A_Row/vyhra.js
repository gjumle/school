var deska;
var naTahu;
var radky, sloupce;

function start() {
	deska = document.getElementById('deska');
	radky = 5;
	sloupce = 5;
	naTahu = document.getElementById('naTahu');

	pridejKlik();

	priStartu();

}

function vymazDesku() {
	for (var i = 0; i < radky; i++) {
		for (var j = 0; j < sloupce; j++) {
			deska.rows[i].cells[j].innerText='';
		}
	}
}

function pridejKlik() {
	for (var i = 0; i < radky; i++) {
		for (var j = 0; j < sloupce; j++) {
	      deska.rows[i].cells[j].addEventListener('click', tah);
	    }
	}

}

function vyhral(hrac) {
  var sousedi = [
    [0, 1], // vpravo
    [1, 1], // vpravo dolu
    [1, 0], // dolu
    [1, -1] // vlevo dolu
  ];
  var i, j, s, m, n;
  var pocet;

  for (i = 0; i < radky; i++) {
    for (j = 0; j < sloupce; j++) {
      if (deska.rows[i].cells[j].innerText != hrac) {
          continue;
      }

      for (s = 0; s < sousedi.length; s++) {
        m = i; // vychozi pozice pro kontrolu rady ve zvolenem smeru
        n = j;
        pocet = 0; // pocet stejnych dlazdic v rade

        while (m >= 0 && n >= 0 && m < radky && n < sloupce && deska.rows[m].cells[n].innerText == hrac) {
          pocet++;
          m += sousedi[s][0];
          n += sousedi[s][1];
        }

        if (pocet === 4) {
        	return true;
        }
		else if (pocet > 4) {
        	return false;
        }
      }
    }
  }

  // nevyhral
  return false;

}
