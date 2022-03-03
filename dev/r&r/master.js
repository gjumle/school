function empty_check() {
	let distance = document.getElementById("distance").value;
	let time = document.getElementById("time").value;
	let username = document.getElementById("username").value;

	if (distance == false || time == false || username == false) {
		window.alert("Fill out all fields.");
	}
}