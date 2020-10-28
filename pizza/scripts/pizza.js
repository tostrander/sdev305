//document.getElementById("pizzaform").onsubmit = validate;

/* Register the validate function for the form submit event */
let form = document.getElementById("pizzaform");
form.onsubmit = validate;

/* Make all error messages invisible */
function clearErrors() {
    let errors = document.getElementsByClassName("text-danger");
    for (let i=0; i<errors.length; i++) {
        errors[i].classList.add("d-none");
    }
}

/* Validate the pizza form */
function validate() {

    clearErrors();

    //Create an error flag
    let isValid = true;

    //Validate first name
    let first = document.getElementById("fname").value;
    if (first == "") {
        let errFname = document.getElementById("err-fname");
        errFname.classList.remove("d-none");
        //alert("First name is required");
        isValid = false; //Stay on the page
    }

    //Validate last name
    let last = document.getElementById("lname").value;
    if (last == "") {
        let errLname = document.getElementById("err-lname");
        errLname.classList.remove("d-none");
        //alert("Last name is required");
        isValid = false; //Stay on the page
    }

    //Validate address


    //Validate method
    let method = document.getElementsByName("method");
    let count = 0;
    for (let i=0; i<method.length; i++) {
        if (method[i].checked) {
            count++;
        }
    }
    if (count == 0) {
        let errMethod = document.getElementById("err-method");
        errMethod.classList.remove("d-none");
        isValid = false;
    }

    //Validate toppings


    //Validate size
    let size = document.getElementById("size").value;
    //alert(size);
    if (size == "none") {
        let errSize = document.getElementById("err-size");
        errSize.classList.remove("d-none");

        isValid = false; //Stay on the page
    }

    return isValid;
}

