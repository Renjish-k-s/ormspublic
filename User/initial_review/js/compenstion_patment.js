 // JavaScript code to toggle the visibility of "why_not_compensation"
 document.addEventListener("DOMContentLoaded", function() {
    const compensation_status = document.getElementById("compensation_status");
    const why_not_compensation = document.getElementById("why_not_compensation");

    compensation_status.addEventListener("change", function () {
        if (this.value === "0") { // "No" option selected
            why_not_compensation.style.display = "block"; // Show the input field
        } else {
            why_not_compensation.style.display = "none"; // Hide the input field
        }
    });
});

// Mock function for "Refer the guideline" button
function display_guideline() {
    alert("Guidelines for payment and compensation will be displayed here.");
}