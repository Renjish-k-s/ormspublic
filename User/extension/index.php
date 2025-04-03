<?php 
session_start();
?>
<?php include '../Partials/header.php'; ?>
<?php
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>


  <style>
    body{
      background-color: #f7f7f7;
    }
    .container {
      background-color: white; /* Light gray background */
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      max-width: 500px; /* Decreased width */
    }
    .btn-sm {
      padding: 5px 10px;
      font-size: 0.875rem; /* Smaller button size */
    }
  </style>

<div class="d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <div class="container">
        <h2 class="text-center">Extension Application</h2>
        <form id="myform" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

        <div class="form-group">
            <label for="fullName">Application ID</label>
            <input type="text" class="form-control" id="appid" placeholder="Enter Application ID*" name="appid" required>
          </div>
          <div class="form-group">
            <label for="fullName">Duration needed</label>
            <input type="text" class="form-control" id="duration" placeholder="Enter Duration*" name="duration" required>
          </div>
          <div class="form-group">
            <label for="email_idemail_id">Describe the reason for extesion</label>
            <textarea class="form-control" id="" cols="40" rows="10" name="description"></textarea>

            </div>

         

        
          <div class="form-row">
            <div class="col-md-6">
            <button type="submit" class="btn btn-primary btn-sm btn-block">Submit</button>
            </div>
            <div class="col-md-6">
              <button type="reset" class="btn btn-secondary btn-sm btn-block">Reset</button>
            </div>
          </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
$(document).ready(function(){
    $('#myform').on('submit', function(event){
        event.preventDefault(); // Prevent default form submission

        var formdata = new FormData(this); // Create FormData object
        var submitButton = $(this).find('button[type="submit"]');
        
        // Disable the button and change text to show loading
        submitButton.prop('disabled', true);
        submitButton.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');
        $.ajax({
            url: './db/extend.php', // PHP file to handle upload
            type: 'POST',
            data: formdata,
            contentType: false, // Important: Prevent jQuery from setting content type
            processData: false, // Important: Prevent jQuery from processing data
            dataType: 'json',   // Parse response as JSON
            success: function(response) {
                var message = response.message;
                submitButton.prop('disabled', false);
                submitButton.html('Submit');
                $('#myform')[0].reset();

                if (message === '1') {

                  alertcustom("Application created Successfully", 1);
                 setTimeout(function() {
                     window.location.href = "./";
                 }, 3000);

                } else {
                  alertcustom(message, 2);
                    //alert("Error: " + message);  // Show error message if not '1'
                }
            },
            error: function(xhr, status, error) {
                submitButton.prop('disabled', false);
                submitButton.html('Submit');
                console.error('Error:', xhr.responseText);
                alert('Error: ' + xhr.responseText);
            }

        });
    });
});
</script>
<script src="./alert.js"></script>
