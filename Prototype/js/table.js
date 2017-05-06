$(document).ready(function() {
    $("td:nth-of-type(4)").each(function() {
        if ($(this).text() === "Solgt") {
            $(this).parent().addClass("solgt");
    	}
        else {
            $(this).parent().addClass("ledig");
        }
    });
});