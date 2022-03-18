function delete_ok() {
    alert('Do you want to delete this record?');s
}


function empty_check() {
    let values = [];
    let empty = true;
    let value = '';
    values.pop(document.getElementById('distance').value);
    values.pop(document.getElementById('time').value);
    values.pop(document.getElementById('username').value);
    for (let i = 0; i < values.length; i++) {
        if (values[i] != "") {
            empty = false;
            switch(i) {
                case 1:
                    getElementById('distance').style.color = 'red';
                    break;
                case 2:
                    getElementById('time').style.color = 'red';
                    break;
                case 3:
                    getElementById('usernames').style.color = 'red';
                    break;
            }
        } else {
            empty = false;
        }
    }
    if (empty == true) {
        alert("Fill out all the fields.")
    }
}