<html>
<head> 
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
 <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" i>
<link rel="stylesheet" href="css/style.css">
</head> 
<body>
<?php require_once('config.php'); ?>
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- Login form creation starts-->
  <section class="container-fluid">
    <!-- row and justify-content-center class is used to place the form in center -->
    <section class="row justify-content-center">
      <section class="col-12 col-sm-6 col-md-4">
        <form class="form-container" id="frm-ref">
        <div class="form-group">
          <h4 class="text-center font-weight-bold">Client MoolahGo </h4>
          <label for="referalcode">Enter Your Referal Code</label>
           <input type="text" class="form-control" name="referalcode" id="referalcode" minlength="6" maxlength="6" onkeyup="this.value = this.value.toUpperCase();" placeholder="Enter Referal Code">
        </div>       
        <button id="btn-submit2" class="btn btn-primary btn-block">Process</button>
        <div style="text-align: center">
           <img src="spinner.gif" style="width: 150px;" lowsrc="spinner.gif" id="spinner" />
        </div>

        <div class="form-footer">
          <!-- <p> Don't have an account? <a href="#">Sign Up</a></p>       -->  
          <p id="msg"></p>     
          <div id="records_table"></div>       
        </div>
        </form>
      </section>
    </section>
  </section>
<!-- Login form creation ends -->
<script type="text/javascript">
  $(document).ready(function(){

      $( "#spinner" ).hide();
      //Referal Code validator      
      $.validator.addMethod("referalcodeallowed", function(value, element) {
        return this.optional(element) || /^[A-Z0-9]+$/i.test(value); 
       }, "Referal Code must contain only letters, numbers."); 
       //form validation
        var validator = $('#frm-ref').validate({
            rules: {
                referalcode: {
                    required : true,
                    referalcodeallowed : true,
                },                   
            },
            messages: {
                referalcode: {
                    required: "Please Enter your Referal Code"
                }
            }
        });

      $( "#btn-submit2" ).click(function(e){ 
        e.preventDefault(); 
        if($('#frm-ref').validate().form()) { 
          $( "#spinner" ).show();                
          var postdata = new Object();  
          postdata.referalcode = btoa($('#referalcode').val());                
          $.ajax({
              url: '<?php echo SERVICE; ?>' + 'api/referalcode',            
              type: 'POST',            
              dataType: 'json',
              data: postdata,                      
              success: function(res){  $( "#spinner" ).hide();
                  console.log(res);   $('#records_table').html('');   $('#msg').html('');             
                  if(!res.messages.status){ $( "#msg" ).html("Referal Code Not Found!") }
                  else { responseHandler(res); }
              },
              error: function (res) {          
                console.log(res.responseText);              
              }
          });
        }
      });

      function responseHandler(response)
      {
           var c = [];
           c.push("<br/><br/><table class='table'><thead><tr><th>Owner</th><th>Ref.Code</th><th>Used</th></tr></thead><tbody>");
           $.each(response, function(i, item) {             
               c.push("<tr><td>" + item.owner_name + "</td>");
               c.push("<td>" + item.referal_code + "</td>");
               c.push("<td>" + item.ref_code_used + "</td></tr>");               
           });
           c.push("</tbody></table>");
           $('#records_table').html(c.join(""));
      }

    });

</script>
</body>
</html>