<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    
    <title>API Project</title>
  </head>
  <body>

  <div class="container py-3">
    <h1 class="text-center">API Project</h1>
    <div class="row">
        <div class="col text-center">Enter referal code below to retrieve owner details</div>
    </div>
    <hr>

    <div class="row">
        <form id="searchform" action="http://localhost:8000/api/process/" class="text-center border border-light col-lg-6 offset-lg-3">
        <div class="col text-center">
            <input id="rcInput" type="text" class="form-control mb-4" name="rc" required pattern="[A-Z0-9]{6}" title="Alphanumberic,Uppercase,6 characters" placeholder="Enter Referral Code">
            <button id="submitBtn" class="btn btn-info btn-block my-4" type="submit">Submit</button>
        </div>
        </form>
    </div>

    <div id="spin" style="display:none">
        <div class="row">
            <div class="offset-sm-5">
                <img src="images/spinner.jpg">
            </div>
        </div>
    </div>
    
    <div id="results" style="display:none">
        <!-- Name -->
        <div class="row">
            <div class="offset-sm-3 col-2">
                <div class="col text-left">Name</div>
            </div>
            <div id="name" class="col-7"></div>
        </div>
       
        <!-- phone -->
        <div class="row">
            <div class="offset-sm-3 col-2">
                <div class="col text-left">Phone</div>
            </div>
            <div id="phone" class="col-7"></div>
        </div>
        <!-- ref -->
        <div class="row">
            <div class="offset-sm-3 col-2">
                <div class="col text-left">Referral Code</div>
            </div>
            <div id="ref" class="col-7"></div>
        </div>
    </div>

    <div id="error" style="display:none">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="col text-left">
                    <label class="control-label error">Referral Code does not exist, no records displayed</label>
                </div>
            </div>
        </div>
    </div>

    

</div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
  </body>
</html>