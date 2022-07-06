$(function() {
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
    });
 });