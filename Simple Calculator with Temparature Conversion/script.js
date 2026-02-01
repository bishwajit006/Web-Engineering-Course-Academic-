let display = document.getElementById("display");

function appendValue(value) {
    display.value += value;
}

function clearDisplay() {
    display.value = "";
}

function deleteLast() {
    display.value = display.value.slice(0, -1);
}

function calculate() {
    try {
        display.value = eval(display.value);
    } catch {
        display.value = "Error";
    }
}

/* Temperature conversions */
function cToF() {
    let c = parseFloat(display.value);
    if (!isNaN(c)) {
        display.value = (c * 9/5 + 32).toFixed(2);
    }
}

function fToC() {
    let f = parseFloat(display.value);
    if (!isNaN(f)) {
        display.value = ((f - 32) * 5/9).toFixed(2);
    }
}

function cToK() {
    let c = parseFloat(display.value);
    if (!isNaN(c)) {
        display.value = (c + 273.15).toFixed(2);
    }
}
