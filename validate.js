function onlyDigits() {
    var separator = this.dataset.separator;
    var replaced = new RegExp('[^\\d\\'+separator+'\\-]', "g");
    var regex = new RegExp('\\'+separator, "g");
    this.value = this.value.replace(replaced, "");

    var minValue = parseFloat(this.dataset.min);
    var maxValue = parseFloat(this.dataset.max);
    var val = parseFloat(separator == "." ? this.value : this.value.replace(new RegExp(separator, "g"), "."));
    if (minValue <= maxValue) {
        if (this.value[0] == "-") {
            if (this.value.length > 8)
                this.value = this.value.substr(0, 8);
        } else {
            if (this.value.length > 7)
                this.value = this.value.substr(0, 7);
        }

        if (minValue < 0 && maxValue < 0) {
            if (this.value[0] != "-")
                this.value = "-" + this.value[0];
        } else if (minValue >= 0 && maxValue >= 0) {
            if (this.value[0] == "-")
                this.value = this.value.substr(0, 0);
        }

        if (val < minValue || val > maxValue)
            this.value = this.value.substr(0, 0);

        if (this.value.match(regex))
            if (this.value.match(regex).length > 1)
                this.value = this.value.substr(0, 0);

        if (this.value.match(/\-/g))
            if (this.value.match(/\-/g).length > 1)
                this.value = this.value.substr(0, 0);
    }
}

document.querySelector(".number").onkeyup = onlyDigits;