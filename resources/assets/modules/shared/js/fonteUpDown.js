$(document).ready(function () {
    var section = new Array('span', 'li', 'b', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'table', 'div');
    section = section.join(',');

    // Reset Font Size
    var originalFontSize = $(section).css('font-size');

    $(".resetFont").click(function () {
        $(section).css('font-size', originalFontSize);
    });

    // Increase Font Size
    $(".increaseFont").click(function () {
        var currentFontSize = $(section).css('font-size');
        var currentFontSizeNum = parseFloat(currentFontSize, 5);
        if (currentFontSizeNum < 20) {
            var newFontSize = currentFontSizeNum * 1.2;
            $(section).css('font-size', newFontSize);
        }
        return false;
    });

    // Decrease Font Size
    $(".decreaseFont").click(function () {
        var currentFontSize = $(section).css('font-size');
        var currentFontSizeNum = parseFloat(currentFontSize, 5);
        if (currentFontSizeNum > 10) {
            var newFontSize = currentFontSizeNum * 0.8;
            $(section).css('font-size', newFontSize);
        }
        return false;
    });
});
