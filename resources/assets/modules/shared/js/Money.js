function moneyToBrl(amount, decimalCount, decimal, thousands) {
    decimal = decimal == null ? ',' : decimal;
    thousands = thousands == null ? '.' : thousands;

    try {
        decimalCount = Math.abs(decimalCount);
        decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

        const negativeSign = amount < 0 ? "-" : "";

        var mathVar = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
        var mathVar2 = (mathVar.length > 3) ? mathVar.length % 3 : 0;

        return negativeSign + (mathVar2 ? mathVar.substr(0, mathVar2) + thousands : '') + mathVar.substr(mathVar2).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - mathVar).toFixed(decimalCount).slice(2) : "");
                        
    } catch (e) {
        console.log(e)
    }
}
