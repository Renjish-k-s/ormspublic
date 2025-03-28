console.log("loaded");

document.addEventListener("DOMContentLoaded", function () {
    
    const lar_status = document.getElementById('lar_status');
    const lar_display = document.getElementById('lar_display');



    // Check if elements exist before adding an event listener
    if (lar_status && lar_display) {
        lar_status.addEventListener('change', function () {
            lar_display.style.display = this.checked ? 'block' : 'none';
        });
    }


   


    
    const consent_obtain = document.getElementById("consent_obtain");
    const consent_obtain_other_display = document.getElementById("consent_obtain_other_display");

    consent_obtain.addEventListener("change", function () {
        if (this.value === "Other") {
            consent_obtain_other_display.style.display = "block"; // Show input field
        } else {
            consent_obtain_other_display.style.display = "none"; // Hide input field
        }
    });



    const waiver_status = document.getElementById("waiver_status");
    const waiver_status_yes_display = document.getElementById("waiver_status_yes_display");

    waiver_status.addEventListener("change", function () {
        if (this.value === "0") {
            waiver_status_yes_display.style.display = "block"; // Show input field
        } else {
            waiver_status_yes_display.style.display = "none"; // Hide input field
        }
    });





});



function display_box()
{
    document.getElementById('category_privacy').style.display = 'flex';
}

function hide_box()
{
    document.getElementById('category_privacy').style.display = 'none';

}























