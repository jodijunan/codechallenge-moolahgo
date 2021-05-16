"use strict" 

const API_URL = 'http://localhost:8000/process';
  $(document).ready(function(){
      $( "#spinner" ).hide();
      //Referal Code validator      
      $.validator.addMethod("alphaNumeric", function(value, element) {
        return this.optional(element) || /^[A-Z0-9]+$/i.test(value); 
       }, "Referral Code must contain only letters, numbers."); 
       //form validation
        var validator = $('#form-ref').validate({
            rules: {
                referralcode: {
                    required : true,
                    alphaNumeric : true,
                },                   
            },
            messages: {
                referralcode: {
                    required: "Please provide referral code"
                }
            }   
        });

      $( "#btn-submit" ).click(function(e){ 
        e.preventDefault(); 
        $('#owner_data').html("");
        $('#error_message').html("");             
        if($('#form-ref').validate().form()) { 
          $( "#spinner" ).show();                
          var postdata = new Object();  
          postdata.referralcode = $('#referralcode').val();     
          $.ajax({
              url: API_URL,            
              type: 'POST',            
              dataType: 'json',
              data: postdata,                      
              success: function(response, textStatus, xhr){  
                  $("#spinner" ).hide();      
                  $("#referralcode").val("");          
                  showOwnerData(response);
              },
              error: function (response) {          
                var errorMessages =  $.parseJSON(response.responseText);
                $( "#spinner" ).hide();
                $.each(errorMessages.referralcode, function(key, error_message){
                    console.log(error_message);
                    $( "#error_message" ).append("<p>");
                    $( "#error_message" ).append(error_message);
                    $( "#error_message" ).append("</p>");
                })           
            }
          });
        }
      });

      function showOwnerData(response)
      {
           var responseContainer = [];
           responseContainer.push("<br/><br/><table class='table' style='border:2px solid #ccc'><tbody>");
           responseContainer.push("<tr><td><b>Owner Name</b></td><td>&nbsp;</td><td>" + response.name + "</td></tr>");
           responseContainer.push("<tr><td><b>Email</b></td><td>&nbsp;</td><td>" + response.email + "</td></tr>");
           responseContainer.push("<tr><td><b>Contact Number</b></td><td>&nbsp;</td><td>" + response.contact_number + "</td></tr>");
           responseContainer.push("<tr><td><b>Referral Code</b></td><td>&nbsp;</td><td>" + response.value + "</td></tr>");               
           responseContainer.push("<tr><td><b>Credits</b></td><td>&nbsp;</td><td>" + response.credits + "</td></tr>");               
           responseContainer.push("<tr><td><b>Balance</b></td><td>&nbsp;</td><td>" + response.balance + "</td></tr>");               
           
           responseContainer.push("</tbody></table>");
           $('#owner_data').html(responseContainer.join(""));
      }

    });