
$(function() {

    $('#search').select2({
        placeholder: 'Pretražite pružatelje',
        ajax: {
            url: '../Components/query_JS.php',
            dataType: 'json',
            delay: 250,
            data: function (data) {
                return {
                    searchTerm: data.term // search term
                };
            },
            processResults: function (response) {
                return {
                    results:response
                };
            },
            cache: true
        }
    });

    /*
    var pruzatelj = [
        "PRIMUM",
        "STARČEVIĆ",
        "ĐURIĆ"
     ];

    $( "#search" ).autocomplete({
       source: pruzatelj
    });

    $('#search').select2({
        dropdownParent: $('#sidebar')
    });*/
 });