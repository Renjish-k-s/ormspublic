<?php 
session_start();
?>
<?php
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>


<style>
  body {
    background-color: #f7f7f7;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
  }
  .container {
    background-color: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.08);
    max-width: 500px;
    margin: 40px auto;
  }
  h2 {
    color: #2c3e50;
    margin-bottom: 25px;
    font-weight: 600;
    text-align: center;
  }
  .form-group {
    margin-bottom: 20px;
  }
  label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #34495e;
  }
  .form-control {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 6px;
    box-sizing: border-box;
    font-size: 15px;
    transition: border-color 0.3s;
  }
  .form-control:focus {
    border-color: #3498db;
    outline: none;
    box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
  }
  textarea.form-control {
    resize: vertical;
    min-height: 120px;
  }
  .form-row {
    display: flex;
    gap: 15px;
    margin-top: 30px;
  }
  .col-md-6 {
    flex: 1;
  }
  .btn {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 500;
    transition: all 0.3s;
  }
  .btn-primary {
    background-color: #3498db;
    color: white;
  }
  .btn-primary:hover {
    background-color: #2980b9;
  }
  .btn-secondary {
    background-color: #95a5a6;
    color: white;
  }
  .btn-secondary:hover {
    background-color: #7f8c8d;
  }
</style>

<div class="d-flex align-items-center justify-content-center" style="min-height: 80vh;">
  <div class="container">
    <h2>Extension Application</h2>
    <form id="myform" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">


      <div class="form-group">
        <label for="appid">Your Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter Application ID*" name="name" required>
      </div> <div class="form-group">
        <label for="appid">Your full address</label>
        <input type="text" class="form-control" id="adderss" placeholder="Enter full address*" name="adderss" required>
      </div>
      <div class="form-group">
        <label for="appid">Your Email address</label>
        <input type="email" class="form-control" id="email" placeholder="Enter Email*" name="email" required>
      </div>
      <div class="form-group">
        <label for="appid">Application ID</label>
        <input type="text" class="form-control" id="appid" placeholder="Enter Application ID*" name="appid" required>
      </div>
      
      <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" class="form-control" id="subject" placeholder="Enter subject*" name="subject" required>
      </div>
      
      <div class="form-group">
        <label for="description">Describe the reason for complaint</label>
        <textarea class="form-control" id="description" cols="40" rows="10" name="description"></textarea>
      </div>
      
      <div class="form-row">
        <div class="col-md-6">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col-md-6">
          <button type="reset" class="btn btn-secondary">Reset</button>
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
