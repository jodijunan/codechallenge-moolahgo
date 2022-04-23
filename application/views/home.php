<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="<?= $this->config->item('app_name') ?>">
        <meta name="author" content="<?= $this->config->item('author') ?>">
        <title><?= $this->config->item('app_name') ?></title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            body { background-color: #218380;}
        </style>
    </head>
    <body class="text-center">
        <div class="container">
            <div class="row justify-content-center my-5">
                <div class="col col-md-10 col-lg-8 col-xl-6">
                    <div class="card text-white bg-dark">
                        <div class="card-header"><?= $this->config->item('app_name') ?></div>
                        <div class="card-body">
                            <form>
                                <div class="mb-3 row">
                                    <div class="col-md-8 col-sm-12">
                                        <input type="text" class="form-control form-control-sm" placeholder="######" minlength="6" maxlength="6"  id="input_ref_code" required />
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <button class="btn btn-success" id="btn-check" type="submit" disabled>Check</button>
                                    </div>
                                </div>
                            </form>
                            <div class="alert alert-danger d-none mt-3" id="alert_error">
                                <i class="fas fa-exclamation-triangle"></i>
                                <span id="alert_error_msg"></span>
                            </div>
                            <table id="ref_values" class="table table-sm table-hover text-white d-none mt-3">
                               <thead>
                                    <tr>
                                        <th scope="col">Code</th>
                                        <th scope="col">Owner</th>
                                        <th scope="col">Source</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="value_ref_code"></td><td id="value_ref_owner"></td><td id="value_ref_source"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        //check user input on keyup
        $('#input_ref_code').keyup(function(e){
            e.preventDefault();
            //turn into uppercase
            $(this).val(($(this).val()).toUpperCase());
            //makesure alphanumeric and has 6 characters long
            if (/[A-Z0-9]{6}/g.test($(this).val())) {
                $('#btn-check').prop('disabled', false);
            }
            else if($(this).val().length == 6){
                $('#btn-check').prop('disabled', true);
                $('#alert_error_msg').html("Contain Non Alpha Numeric");
                $('#alert_error').removeClass('d-none');
            } else {
                $('#btn-check').prop('disabled', true);
                $('#alert_error').addClass('d-none');
                $('#alert_error_msg').html("");
            }
        });
        // on button check pressed
        $('#btn-check').click(function(e){
            e.preventDefault();
            $('#alert_error, #ref_values').addClass('d-none');
            $(this).html('<?= $this->config->item("loading")?>');
            $.ajax({
                url: '<?= base_url('process') ?>',
				type: 'POST',
				data: {referralcode: $('#input_ref_code').val()},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Something is wrong. Try Again Later.');
					$('#btn-check').html('<?= $this->config->item("check")?>');
				},
				success: function(data) {
                    $('#btn-check').html('<?= $this->config->item("check")?>');
					if(data.s == 'success'){
						// Show values
                        $('#value_ref_code').html(data.data[0].value_ref_code);
                        $('#value_ref_owner').html(data.data[0].value_ref_owner);
                        $('#value_ref_source').html(data.data[0].value_ref_source);
                        $('#ref_values').removeClass('d-none');
					}
					else{
						// Show err msg
                        $('#alert_error_msg').html(data.m);
                        $('#alert_error').removeClass('d-none');
					}
				}
			});
        });
  </script>
</html>