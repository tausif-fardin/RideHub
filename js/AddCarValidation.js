function validateUserForm() {
    var name = document.getElementById("carname").value;
    var model = document.getElementById("carm").value;
    var SitCount = document.getElementById("scount").value;
    var from = document.getElementById("from").value;
    var to = document.getElementById("to").value;
    var error = document.getElementById("error");
    // var uploadcar = document.getElementById("carphptp").value;

    if (name == "" || model == "" || SitCount == "" || from == "" || to == "") {
        error.innerHTML = "All fields are required js ";
        return false;
    }
    else if (typeof name !== 'string') {
        error.innerHTML = "User Name should be string";
        return false;
    }
    else if (name.length < 1) {
        error.innerHTML = "Car Name should be at least 1 characters long";
        return false;
    }
    else if (model < 8) {
        error.innerHTML = "Invalid model Number";
        return false;

    }

    else if (SitCount.length > 2) {
        error.innerHTML = "Seat should be 1 characters long";
        return false;
    }

}
