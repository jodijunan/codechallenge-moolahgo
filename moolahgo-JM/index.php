<!DOCTYPE html>
<html lang="en">
<head>
  <title>MoolahGoh</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 >MoolahGo Code Changelle</h2>
  <br>
  <form class="form-horizontal" action="test.php" method="POST" id="frm01">

  <div class="form-group">
      <label class="control-label col-sm-2">Date:</label>
      <div class="col-sm-10">          
        <input type="date" class="form-control" id="choosenDate" name="choosenDate" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Percentage:</label>
      <div class="col-sm-10">          
        <input type="number" min="-10" max="10" class="form-control" id="percentage" name="percentage" placeholder="Enter Percentage" value="0">
      </div>
    </div>
       <div class="form-group">
      <label class="control-label col-sm-2" >Abritrary Amount:</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="AbritraryAmount" name="AbritraryAmount" placeholder="Enter Abritrary Amount" required>
      </div>
    </div>
    <div class="form-group" id="divFinalAmount" style="display: none;">
      <label class="control-label col-sm-2" >Final Amount:</label>
      <div class="col-sm-10">
          <p id="finalAmount" name="finalAmount"></p>
          <input type="hidden" name="famount" id="famount" value="">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" id="btnSubmit" name="btnSubmit" disabled="true" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
  <p id="history" name="history"></p>
</div>
<script type="text/javascript">
  //For Computing The Final Amount and Displaying it.
  $("#AbritraryAmount").change(function(){
      var AbritraryAmount = $("#AbritraryAmount").val();
      var Percentage = $("#percentage").val()+"%";
      if(AbritraryAmount == "" || AbritraryAmount == " "){
        
        $("#btnSubmit").attr("disabled", true);
        var decimal = parseFloat(Percentage)/100;
        var tempamount = parseInt(AbritraryAmount) * decimal;
        var finalAmount = parseInt(AbritraryAmount) + tempamount;
        $('#divFinalAmount').show();
        $("#finalAmount").html("$"+finalAmount);
        $("#famount").val(finalAmount);
      
      }else{

        $("#btnSubmit").attr("disabled", false);
        var decimal = parseFloat(Percentage)/100;
        var tempamount = parseInt(AbritraryAmount) * decimal;
        var finalAmount = parseInt(AbritraryAmount) + tempamount;
        $('#divFinalAmount').show();
        $("#finalAmount").html("$"+finalAmount);
        $("#famount").val(finalAmount);

      }
      
  });
$("#frm01").submit(function(event){
  event.preventDefault(); 
  var post_url = $(this).attr("action"); 
  var request_method = $(this).attr("method"); 
  var form_data = $(this).serialize(); 
  
  $.ajax({
    url : post_url,
    type: request_method,
    data : form_data
  }).done(function(response){ //
    $("#history").html(response);
  });
});
 $( document ).ready(function() {
   $.ajax({
    url : "test.php",
    type: "POST",
  }).done(function(response){ //
    $("#history").html(response);
  });
});

</script>
</body>
</html>
