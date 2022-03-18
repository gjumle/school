function delete_ok() {
    alert('Do you want to delete this record?');s
}


function empty_check() {
    let values = [];
    let empty = true;
    values.pop(document.getElementById('distance').value);
    values.pop(document.getElementById('time').value);
    values.pop(document.getElementById('username').value);
    for (let i = 0; i < values.length; i++) {
        if (values[i] != "") {
            empty = false;
        }
    }
    if (empty == true) {
        alert("Fill out all the fields.")
    }
}