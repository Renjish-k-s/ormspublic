<?php 
session_start();
?>
<?php include '../Partials/header.php'; ?>

<link rel="stylesheet" href="./css/common.css">
<?php
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<style>
   #suceessfullsubmission
{
    position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8); /* Black background with 80% opacity */
        display: none; /* Hidden by default */
        z-index: 9999; /* Ensure it overlays everything */
        align-items: center;
        justify-content: center;
        color: white; /* Text color inside overlay */
        font-size: 24px;
        overflow:auto;


        flex-direction: column; /* Stack elements vertically */
        align-items: center; /* Center-align items */
        justify-content: center; /* Center vertically */
        gap: 20px; 
}
</style>


<div class="content">
    <div class="login-container d-flex justify-content-center align-items-center min-vh-50" style="margin-top: 0rem;">
        <div class="container bg-white p-4 rounded shadow-sm">
            <!-- PHP Form Start -->
            <form id="myform" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <?php include './adminitrative_details.php'; ?>
            <?php include './research_related_info.php'; ?>
            <?php include './participant_related.php'; ?>
            <?php include './benefitsandrisk.php'; ?>
            <?php include './informed_concent.php'; ?>
            <?php include './compenstion_patment.php'; ?>
            <?php include './storage_confidentality.php'; ?>
            <div class="d-flex justify-content-center">
                 <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div id="suceessfullsubmission">
<div style="
    background: linear-gradient(135deg, #2C3E50, #3498DB);
    color: #fff;
    padding: 20px;
    border-radius: 10px;
    font-family: Arial, sans-serif;
    text-align: center;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    max-width: 600px;
    margin: 30px auto;
    font-size: 16px;
    font-weight: bold;
    line-height: 1.5;
">
    ✅ <span style="font-size: 18px;">1st step toward your application submission is completed!</span> <br><br>
    📌 Now, go to <b>Track Application</b> and confirm your application. <br>
    ✏️ Edit only if necessary. <br><br>
    🚀 <b>Only after this step, your application will be submitted!</b>
    <br>
    <div class="d-flex justify-content-center">
        <br>
                 <button type="submit"  style="background: linear-gradient(135deg, #2C3E50, #3498DB);"class="btn btn-primary">Submit</button>
            </div>
</div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php include '../Partials/footer.php'; ?>




















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
            url: './db.php', // PHP file to handle upload
            type: 'POST',
            data: formdata,
            contentType: false, // Important: Prevent jQuery from setting content type
            processData: false, // Important: Prevent jQuery from processing data
            success: function(response) {
                // Re-enable the button and restore text
                submitButton.prop('disabled', false);
                submitButton.html('Submit');
                
                // Show success message
                $('#suceessfullsubmission').css('display', 'flex');
                
                // Clear all form fields
                $('#myform')[0].reset();
                
                console.log('Form submitted successfully!\nResponse: ' + response);
                
                // Automatically hide the success message after 3 seconds and redirect
                setTimeout(function() {
                    $('#suceessfullsubmission').css('display', 'none');
                    window.location.href = '../'; // Replace with your desired page URL
                }, 3000);
            },
            error: function(xhr, status, error) {
                // Re-enable the button and restore text even on error
                submitButton.prop('disabled', false);
                submitButton.html('Submit');
                
                console.error('Error:', error);
                alert('There was an error submitting the form.');
            }
        });
    });
    
    // Keep this in case user clicks the button before auto-redirect
    $('#suceessfullsubmission button').on('click', function() {
        $('#suceessfullsubmission').css('display', 'none');
        window.location.href = '../'; // Replace with your desired page URL
    });
});
</script>