$(document).ready(function(){
  $("#submitBtn").attr("disabled", true);

  $("#rcInput").on("keyup blur", function() {
    var iV = $("#rcInput").val();
    var pattern = /[A-Z0-9]/;
    if (iV.length==6 && iV.match(pattern)) {
      $("#submitBtn").attr("disabled",false);
    }
  });

$( "#searchform" ).submit(function( event ) {
 
  event.preventDefault();
  $("#spin").show();
  var $form = $( this ),
    refcode = $form.find( "input[name='rc']" ).val(),
    myurl = $form.attr( "action" );

    $.post(myurl, 
    {
      code: refcode
    },
    
    function(data, status){
      $("#spin").hide();
      if (status == "success") {
        if (data != "") {
          $("#results").show();
          $("#error").hide();
          var content = JSON.parse(data);
          $("#name").text(content.name);
          $("#phone").text(content.phone);
          $("#ref").text(content.code);
        }
        else {
          $("#name").text("");
          $("#phone").text("");
          $("#ref").text("");
          $("#results").hide();
          $("#error").show();
        }
      }
      
    });
});
})