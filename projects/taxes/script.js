function calculate() {
	var inc = document.getElementById('incomes').value * 1;
	var exp = document.getElementById('expenses').value * 1;

	var n_tax = document.getElementById('non-taxable').value * 1;
	var ins = document.getElementById('insurance').value * 1;

	var in_out_d = inc - exp;
	var tax_base_s = in_out_d + n_tax + ins;

	console.log(in_out_d);
	console.log(tax_base_s);

	document.getElementById('in_out_result').innerHTML = inc + " - " + exp + " = " + in_out_d;
	document.getElementById('tax_base').innerHTML = in_out_d + " + " + n_tax + " + " + ins + " = " + tax_base_s;
}