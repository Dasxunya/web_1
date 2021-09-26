let y;

document.getElementById("btn").addEventListener("click", validate);

function validate() {
    if (!validateY()) return;
}

function validateY() {
    let yText = document.getElementById("yField");
    y = yText.value.replace(",", ".").trim();
    if (/^-?\d+\.?\d*$/.test(y)) {
        if (y >= 5 || y <= -3) {
            yText.setCustomValidity("Число вне допустимого диапазона");
            return false;
        } else {
            yText.setCustomValidity("")
            return true;
        }
    } else {
        yText.setCustomValidity("Некорректный вид числа");
        return false;
    }
}

function controlCheckbox(element) {
    let checkboxes = document.getElementsByName(element.name);
    for (let i = 0; i < checkboxes.length; i++)
    {
        checkboxes[i].checked = false;
    }
    element.checked = true;
}