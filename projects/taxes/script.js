function count(exp, inc) {
	exp = document.getElementByName('expenses').value;
	inc = document.getElementByName('incomes').value;
	return inc - exp;
}