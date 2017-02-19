$(function() {
    $("#regione_auto").autocomplete({
        source: function(request, response) {
            $.getJSON("php_scripts/autocomplete_regione.php",
                {term: request.term},
                response);
        },
        autofocus: true
    });

    $("#provincia_auto").autocomplete({
        source: function(request, response) {
            var regione=$("#regione_auto").val();
            $.getJSON("php_scripts/autocomplete_provincia.php",
                {term: request.term, regione: regione},
                response);
        },
        autofocus: true
    });

    $("#comune_auto").autocomplete({
        source: function(request, response) {
            var provincia=$("#provincia_auto").val();
            $.getJSON("php_scripts/autocomplete_comune.php",
                {term: request.term, provincia: provincia},
                response);
        },
        autofocus: true
    });

    $.cascadingAutocompletes(["#regione_auto", "#provincia_auto", "#comune_auto"]);
});