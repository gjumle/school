function count(exp, inc) {
	exp = document.getElementById('expenses').value;
	inc = document.getElementById('incomes').value;
	return inc - exp;
}