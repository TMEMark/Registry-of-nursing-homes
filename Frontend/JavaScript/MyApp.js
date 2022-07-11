
$(function() {

    $( "#search" ).autocomplete({
       source: pruzatelj
    });

    $('#search').select2({
        dropdownParent: $('#sidebar')
    });
 });