function count(exp, inc) {
	var exp = document.getElementById('expenses').value;
	var inc = document.getElementById('incomes').value;
	result = inc - exp;
	document.getElementById('result').innerHTML = result;
}
