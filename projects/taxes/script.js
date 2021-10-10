function calculate() {
	var inc = document.getElementById('incomes').value * 1;
	var exp = document.getElementById('expenses').value * 1;

	var n_tax = document.getElementById('non-taxable').value * 1;
	var ins = document.getElementById('insurance').value * 1;

	var gft = document.getElementById('gifts').value * 1;
	var ls = document.getElementById('loss').value * 1;

	var mrg = document.getElementById('wife-husband').value * 1; // Not functional yet
	var chld = document.getElementById('children').value * 1; // Not functional yet

	var in_out_d = inc - exp;
	var tax_base_s = in_out_d + n_tax + ins;
	var ed_tax_base_r = tax_base_s + gft - ls;

	console.log(in_out_d);
	console.log(tax_base_s);
	console.log(ed_tax_base_r);

	document.getElementById('in_out_result').innerHTML = inc + " - " + exp + " = " + in_out_d;
	document.getElementById('tax_base_result').innerHTML = in_out_d + " + " + n_tax + " + " + ins + " = " + tax_base_s;
	document.getElementById('edited_tax_base_result').innerHTML = tax_base_s + " + " + gft + " - " + ls + " = " + ed_tax_base_r;
}