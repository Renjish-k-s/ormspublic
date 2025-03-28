document.addEventListener("DOMContentLoaded", function () {


    const risk_status = document.getElementById("risk_status");
    const risk_categorize_display = document.getElementById("risk_categorize_display");
    const risk_categorize_miti_display = document.getElementById("risk_categorize_miti_display");


    risk_status.addEventListener("change", function () {
        if (this.value === "0") {
            risk_categorize_display.style.display = "block"; // Show input field
            risk_categorize_miti_display.style.display = "block"; // Show input field

        } else {
            risk_categorize_display.style.display = "none"; // Hide input field
            risk_categorize_miti_display.style.display = "none"; // Hide input field

        }
    });

    const reporting_procedures_status = document.getElementById("reporting_procedures_status");
    const reporting_procedures_status_display = document.getElementById("reporting_procedures_status_display");


    reporting_procedures_status.addEventListener("change", function () {
        if (this.value === "0") {
            reporting_procedures_status_display.style.display = "block"; // Show input field

        } else {
            reporting_procedures_status_display.style.display = "none"; // Hide input field

        }
    });
});


function display_classification()
{
    document.getElementById('category_risk_classification_in').style.display = 'flex';
}

function hide_classification_benefit_risk_in()
{
    document.getElementById('category_risk_classification_in').style.display = 'none';

}
