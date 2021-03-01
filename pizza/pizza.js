document.getElementById("pizzaform").onsubmit = validate;

function validate()
{
    //Create flag variable
    let isValid = true;

    //Clear all error messages
    let errors = document.getElementsByClassName("err");
    for (let i=0; i<errors.length; i++) {
        errors[i].style.display = "none";
    }

    //Check first name
    let first = document.getElementById("fname").value;
    if (first == "") {
        let errFirst = document.getElementById("err-fname");
        errFirst.style.display = "inline";
        isValid = false;
    }

    //Check last name
    let last = document.getElementById("lname").value;
    if (last == "") {
        let errLast = document.getElementById("err-lname");
        errLast.style.display = "inline";
        isValid = false
    }

    //Check size
    let size = document.getElementById("size").value;
    if (size == "none") {
        let errSize = document.getElementById("err-size");
        errSize.style.display = "inline";
        isValid = false
    }

    //Check pickup or delivery
    let method = document.getElementsByName("method");
    let isSelected = false;
    for (let i=0; i<method.length; i++) {
        if (method[i].checked) {
            isSelected = true;
            break;
        }
    }
    if (!isSelected) {
        let errMethod = document.getElementById("err-method");
        errMethod.style.display = "inline";
        isValid = false
    }

    //Validate address if method = delivery
    if (method[1].checked) {
        let address = document.getElementById("address").value;
        if (address == "") {
            let errAddress = document.getElementById("err-address");
            errAddress.style.display = "inline";
            isValid = false;
        }
    }

    return isValid;
}

