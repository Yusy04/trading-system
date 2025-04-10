function changeAmmount() {
    var ratio = 5;
    var x = document.getElementById("ammount").value;
    document.getElementById("price").value = x * ratio;
}

function changePrice() {
    var ratio = 1 / 5;
    var x = document.getElementById("price").value * ratio;
    var ammount = (Math.round(x * 100) / 100).toFixed(2);
    document.getElementById("ammount").value = ammount;
}