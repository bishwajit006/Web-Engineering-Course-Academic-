
function setRole(role, btn) {
    document.getElementById("role").value = role;

    let buttons = document.querySelectorAll(".role-toggle button");
    buttons.forEach(b => b.classList.remove("active"));
    btn.classList.add("active");

    let agriFields = document.getElementById("agronomistFields");
    agriFields.style.display = (role === "agronomist") ? "block" : "none";
}

function validateForm() {
    let role = document.getElementById("role").value;

    let pass = document.getElementById("password").value;
    let repass = document.getElementById("repassword").value;

    if (pass !== repass) {
        alert("Passwords do not match!");
        return false;
    }

    if (role === "agronomist") {
        let spec = document.querySelector("input[name='specialized']").value;
        let exp = document.querySelector("input[name='experienced']").value;

        if (spec === "" || exp === "") {
            alert("Please fill agronomist details!");
            return false;
        }
    }

    return true;
}

//for password in sign up form
function togglePassword(id) {
    let input = document.getElementById(id);

    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}


//dashboard
 function setRole(role, btn) {
    document.getElementById("role").value = role;

    let buttons = document.querySelectorAll(".role-toggle button");
    buttons.forEach(b => b.classList.remove("active"));
    btn.classList.add("active");

    let agriFields = document.getElementById("agronomistFields");
    agriFields.style.display = (role === "agronomist") ? "block" : "none";
}
 