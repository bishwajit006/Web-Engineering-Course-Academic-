function validateForm() {

    // Updated name regex (minimum 3 letters, only alphabets & spaces)
    let nameRegex = /^[A-Za-z ]{3,}$/;
    let phoneRegex = /^\d{11}$/;
    let heightRegex = /^[0-9]{1}'[0-9]{1,2}"?$/;

    let photo = document.getElementById("photo");
    let fullname = document.getElementById("fullname");
    let dob = document.getElementById("dob");
    let age = document.getElementById("age");
    let male = document.getElementById("male");
    let female = document.getElementById("female");
    let height = document.getElementById("height");
    let marital = document.getElementById("marital");
    let religion = document.getElementById("religion");
    let education = document.getElementById("education");
    let profession = document.getElementById("profession");
    let income = document.getElementById("income");
    let father = document.getElementById("father");
    let mother = document.getElementById("mother");
    let contact = document.getElementById("contact");
    let address = document.getElementById("address");

    let isValid = true;

    // Photo
    if (photo.files.length === 0) {
        photo.style.border = "2px solid red";
        isValid = false;
    } else {
        photo.style.border = "2px solid green";
    }

    // Full Name (Minimum 3 letters validation)
    if (fullname.value.trim().length >= 3 && nameRegex.test(fullname.value.trim())) {
        fullname.style.border = "2px solid green";
    } else {
        fullname.style.border = "2px solid red";
        isValid = false;
    }

    // DOB
    if (dob.value !== "") {
        dob.style.border = "2px solid green";
    } else {
        dob.style.border = "2px solid red";
        isValid = false;
    }

    // Age
    let ageValue = parseInt(age.value);
    if (!isNaN(ageValue) && ageValue >= 18) {
        age.style.border = "2px solid green";
    } else {
        age.style.border = "2px solid red";
        isValid = false;
    }

    // Gender
    if (male.checked || female.checked) {
        male.parentElement.style.border = "none";
    } else {
        male.parentElement.style.border = "2px solid red";
        isValid = false;
    }

    // Height
    if (heightRegex.test(height.value.trim())) {
        height.style.border = "2px solid green";
    } else {
        height.style.border = "2px solid red";
        isValid = false;
    }

    // Marital Status
    if (marital.value !== "") {
        marital.style.border = "2px solid green";
    } else {
        marital.style.border = "2px solid red";
        isValid = false;
    }

    // Religion
    if (religion.value.trim() !== "") {
        religion.style.border = "2px solid green";
    } else {
        religion.style.border = "2px solid red";
        isValid = false;
    }

    // Education
    if (education.value.trim() !== "") {
        education.style.border = "2px solid green";
    } else {
        education.style.border = "2px solid red";
        isValid = false;
    }

    // Profession
    if (profession.value.trim() !== "") {
        profession.style.border = "2px solid green";
    } else {
        profession.style.border = "2px solid red";
        isValid = false;
    }

    // Income
    if (income.value.trim() !== "") {
        income.style.border = "2px solid green";
    } else {
        income.style.border = "2px solid red";
        isValid = false;
    }

    // Father Name (Minimum 3 letters)
    if (father.value.trim().length >= 3 && nameRegex.test(father.value.trim())) {
        father.style.border = "2px solid green";
    } else {
        father.style.border = "2px solid red";
        isValid = false;
    }

    // Mother Name (Minimum 3 letters)
    if (mother.value.trim().length >= 3 && nameRegex.test(mother.value.trim())) {
        mother.style.border = "2px solid green";
    } else {
        mother.style.border = "2px solid red";
        isValid = false;
    }

    // Contact
    if (phoneRegex.test(contact.value.trim())) {
        contact.style.border = "2px solid green";
    } else {
        contact.style.border = "2px solid red";
        isValid = false;
    }

    // Address
    if (address.value.trim() !== "") {
        address.style.border = "2px solid green";
    } else {
        address.style.border = "2px solid red";
        isValid = false;
    }

    return isValid;
}
