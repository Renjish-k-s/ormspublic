console.log("started");

function register() {
    //alert("Register function called");

    var registerform = $("#registerform").serialize(); // Ensure form data is collected

    console.log("Sending AJAX Request...");

    $.ajax({
        url: './db/otpsender_emailvalidator.php',  
        type: 'POST',
        data: registerform,
        dataType: 'json', // Ensure response is treated as JSON
        success: function(response) {
            console.log("Success Response:", response); // Log response
            alert("AJAX Success: " + response.message);
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error:", xhr.responseText); // Log error response
            alert("AJAX Error: " + xhr.responseText);
        }
    });

    console.log("AJAX Request Sent");
}

console.log("ended");
