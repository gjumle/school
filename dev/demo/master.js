function delete_ok() {
    alert('Do you want to delete this record?');s
}


function empty_check() {
    let distance = document.getElementById('distance').value;
    let time = document.getElementById('time').value;
    let username = document.getElementById('username').value;
    if (distance == "" || time == "" || username == "")
        alert("Fill out all fields.");
}