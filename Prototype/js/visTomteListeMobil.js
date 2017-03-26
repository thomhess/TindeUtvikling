$( "#filterKnapp" ).click(function() {
  $( ".liste" ).toggle( "slow", function() {
  });
});


$('#filterKnapp').on('click', function() {
    $(".visLister").toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
});
