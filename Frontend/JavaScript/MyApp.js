$(function() {
    var pruzatelj = [
        "PRIMUM",
        "STARČEVIĆ",
        "ĐURIĆ"
     ];
    $( "#search" ).autocomplete({
       source: pruzatelj
    });
 });
