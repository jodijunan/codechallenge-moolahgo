$(document).ready(function(){
    jQuery.validator.addMethod('alphanumeric', function(value, element) {
        return this.optional(element) || /^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/.test(value);
    }, 'Please provide a number and a letter');

    
    $("#referralForm").validate({
        rules: {
            login: {
                required: true,
                minlength: 6,
                maxlength: 6,
                alphanumeric: true
            }
        },
        submitHandler: function() {
            let validator = this;
            $.ajax({ 
                type: 'GET', 
                url: 'http://localhost:8000/process', 
                data: { 
                    referralcode: $('#login').val()
                }, 
                dataType: 'json',
                beforeSend:function(xhr){
                    $('#errorMessage').attr("hidden",true);
                    $('#ownerDetails').attr("hidden",true);
                    $('#loading').attr("hidden",false);
                    $('#searchText').attr("hidden",true);
                },
                success: function (data) { 
                    $('#ownerDetails').attr("hidden",false);
                    $('#name').text(data.name);
                    $('#email').text(data.email);
                    $('#hp').text(data.hp);
                    $('#referralcode').text(data.referralcode);
                },
                error:function(XMLHttpRequest, textStatus, errorThrown){
                    let errors = '';
                    if(XMLHttpRequest.responseJSON != undefined)
                    {
                        errors = {login:XMLHttpRequest.responseJSON.message}
                    }
                    else
                    {
                        errors = {login:'Internal Server error. Please ensure the microservice is running properly.'};
                    }
                    validator.showErrors(errors);
                },
                complete:function()
                {
                    $('#loading').attr("hidden",true);
                    $('#searchText').attr("hidden",false);
                },
                fail:function (jqXHR, textStatus, errorThrown) {
                    let errors = errorThrown;
                }
            });
        }
    })

    $('#login').on('blur keyup', function() {
        if ($("#referralForm").valid()) {
            $('#submitBtn').attr('disabled', false);  
        } else {
            $('#submitBtn').attr('disabled', true);
        }
    });
});