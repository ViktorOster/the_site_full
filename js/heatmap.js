let wagerData = {

}

const heatmappedNumbers = document.querySelectorAll("[data-js='heatmapped-number']")
let minNumber, maxNumber = 0

heatmappedNumbers.forEach((elem, i) => {
    number = parseInt(elem.textContent)
    if (i === 0) minNumber = number
    if (number > maxNumber) maxNumber = number
    else if (number < minNumber) minNumber = number
})

applyColors()
function applyColors() {
    heatmappedNumbers.forEach((elem, i) => {
        number = parseInt(elem.textContent)

        const percentage = (number - minNumber) / (maxNumber - minNumber);

        const color = GetColorAtPos(ConvertToInt("00FF00"), ConvertToInt("FF0000"), percentage)
        const hexColor = "#" + fullColorHex(color)
        console.log(hexColor)
        elem.style.color = hexColor;
    })
}
function rgbToHex(rgb) {
    var hex = Number(rgb).toString(16);
    if (hex.length < 2) {
        hex = "0" + hex;
    }
    return hex;
}

function fullColorHex(rgb) {
    var red = rgbToHex(rgb[0]);
    var green = rgbToHex(rgb[1]);
    var blue = rgbToHex(rgb[2]);
    return red + green + blue;
}

function ConvertToInt(colorHex) {
    if (colorHex.length != 6) { return 0; }
    var R = colorHex.substring(0, 2);
    var G = colorHex.substring(2, 4);
    var B = colorHex.substring(4, 6);

    return [parseInt(R, 16), parseInt(G, 16), parseInt(B, 16)];
}
function GetColorAtPos(color1, color2, position) {

    color1Multiplier = position;
    color2Multiplier = 1 - position;
    finalRGB = [];
    for (i = 0; i <= 2; i++) {
        finalRGB.push(parseInt((color1[i] * color1Multiplier) + (color2[i] * color2Multiplier)))
    }
    //console.log(finalRGB)
    return finalRGB
}
