<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Ratinan Leela-Ngamwongsa">
    <title>Check Referral Code</title>
    <link rel="canonical" href="<?= base_url() ?>">
    <!-- core CSS: Bootstrap 5 and FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <style>
        body {
            background-color: #6aa12f;
        }
    </style>
  </head>
  <body class="text-center">
    <div class="container">
      <div class="row justify-content-center my-5">
        <div class="col col-md-10 col-lg-8 col-xl-6">
          <div class="card text-white bg-secondary">
            <div class="card-header">Referral Check</div>
            <div class="card-body">
              <form>
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-4 col-form-label">Referral Code:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" id="referralcode" placeholder="######" minlength="6" maxlength="6" required />
                  </div>
                </div>
                <button class="btn btn-danger" id="btn-referral" type="submit" disabled>Check</button>
              </form>
              <div class="alert alert-danger d-none mt-3" id="alert_error">
                <i class="fas fa-exclamation-triangle"></i>
                <span id="alert_error_msg"></span>
              </div>
              <table id="referral_details" class="table table-sm table-hover text-white d-none mt-3">
                <tr>
                  <th colspan="2">Results</th>
                </tr>
                <tr>
                  <th>ID</th><td id="table_id"></td>
                </tr>
                <tr>
                  <th>Referral Code</th><td id="table_referral_code"></td>
                </tr>
                <tr>
                  <th>Name</th><td id="table_referral_name"></td>
                </tr>
                <tr>
                  <th>Email</th><td id="table_referral_email"></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(function () {
        // Check inputs on KEYUP
        $('#referralcode').on('keyup', function (e) {
            e.preventDefault();
            // Auto change to uppercase letters to increase usability
            $(this).val(($(this).val()).toUpperCase());
            // We can actually use the JS library to do the validation, but this one is just a simple validation which can only be done in 1 line, so I decided to use the regex instead.
            // Button is enabled/disabled based on the input, this could be easier to use VueJS, but jQuery can also do the same functionality here.
            if (/[A-Z0-9]{6}/g.test($(this).val())) {
                $('#btn-referral').prop('disabled', false);
            } else {
                $('#btn-referral').prop('disabled', true);
            }
        });
        // Submit the form, use AJAX instead of normal form submission
        $('#btn-referral').click(function (e) {
            e.preventDefault();
            $('#alert_error, #referral_details').addClass('d-none');
            // Do the POST form submission
            $.post('<?= base_url('process') ?>', {
                referralcode: $('#referralcode').val()
            }, function (data) {
                if (null === data.error) {
                    // Show the referral's data in the table
                    $('#table_id').html(data.data[0].id);
                    $('#table_referral_code').html(data.data[0].referral_code);
                    $('#table_referral_name').html(data.data[0].referral_name);
                    $('#table_referral_email').html(data.data[0].referral_email);
                    $('#referral_details').removeClass('d-none');
                } else {
                    // Show the error message
                    $('#alert_error_msg').html(data.error);
                    $('#alert_error').removeClass('d-none');
                }
            }, 'json');
        });
    });
  </script>
</html>