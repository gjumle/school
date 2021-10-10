function difference(x, y) {
	return x - y;
}


function in_out() {
	var inc = document.getElementById('incomes').value;
	var exp = document.getElementById('expenses').value;

	document.getElementById('result').innerHTML = difference(inc, exp);
}
