
$( "#filterKnapp" ).click(function() {
  $( ".filterDiv" ).toggle( "slow", function() {
  });
});


$('#filterKnapp').on('click', function() {
    $("span").toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
});
