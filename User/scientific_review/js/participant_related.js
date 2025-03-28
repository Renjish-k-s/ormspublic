document.addEventListener("DOMContentLoaded", function () {


    const type_participant = document.getElementById("type_participant");
    const type_participant_other = document.getElementById("type_participant_other");

    const vulerable_status_display = document.getElementById("vulerable_status_display");
    const justification_inclusion = document.getElementById("justification_inclusion_display");

    type_participant.addEventListener("change", function () {
        if (this.value === "3") {
            type_participant_other.style.display = "block"; // Show input field
        } else {
            type_participant_other.style.display = "none"; // Hide input field
        }

        if (this.value === "2") {
            vulerable_status_display.style.display = "block"; // Show input field
            justification_inclusion.style.display = "block"; // Show input field

        } else {
            vulerable_status_display.style.display = "none"; // Hide input field
            justification_inclusion.style.display = "none"; // Hide input field

        }


    });


    const responsible_participant = document.getElementById("responsible_participant");
    const other_par_type_other = document.getElementById("other_par_type_other");

    responsible_participant.addEventListener("change", function () {
        if (this.value === "11") {
            other_par_type_other.style.display = "block"; // Show input field
        } else {
            other_par_type_other.style.display = "none"; // Hide input field
        }
    });


    const method_recruitment = document.getElementById("method_recruitment");
    const other_method_recruitment_display = document.getElementById("other_method_recruitment_display");

    method_recruitment.addEventListener("change", function () {
        if (this.value === "4") {
            other_method_recruitment_display.style.display = "block"; // Show input field
        } else {
            other_method_recruitment_display.style.display = "none"; // Hide input field
        }
    });

   



    const reimbursement_status = document.getElementById("reimbursement_status");
    const reimbursement_type_display = document.getElementById("reimbursement_type_display");


    reimbursement_status.addEventListener("change", function () {
        if (this.value === "0") {
            reimbursement_type_display.style.display = "block"; // Show input field
            

        } else {
            reimbursement_type_display.style.display = "none"; // Hide input field

        }
    });



    const reimbursement_type_display_status = document.getElementById("reimbursement_type");
    const justification_Monetary_display = document.getElementById("justification_Monetary_display");


    reimbursement_type_display_status.addEventListener("change", function () {
        if (this.value === "0") {
            justification_Monetary_display.style.display = "block"; // Show input field
            

        } else {
            justification_Monetary_display.style.display = "none"; // Hide input field

        }
    });



    const recruitment_fee_status = document.getElementById("recruitment_fee_status");
    const recruitment_fee_display = document.getElementById("recruitment_fee_display");


    recruitment_fee_status.addEventListener("change", function () {
        if (this.value === "0") {
            recruitment_fee_display.style.display = "block"; // Show input field
            

        } else {
            recruitment_fee_display.style.display = "none"; // Hide input field

        }
    });


    const recruitment_fee_type = document.getElementById("recruitment_fee_type");
    const recruitment_fee_Monetary_display = document.getElementById("recruitment_fee_Monetary_display");


    recruitment_fee_type.addEventListener("change", function () {
        if (this.value === "0") {
            recruitment_fee_Monetary_display.style.display = "block"; // Show input field
            

        } else {
            recruitment_fee_Monetary_display.style.display = "none"; // Hide input field

        }
    });





    const incentives_fee_status = document.getElementById("incentives_fee_status");
    const incentives_fee_display = document.getElementById("incentives_fee_display");


    incentives_fee_status.addEventListener("change", function () {
        if (this.value === "0") {
            incentives_fee_display.style.display = "block"; // Show input field
            

        } else {
            incentives_fee_display.style.display = "none"; // Hide input field

        }
    });



    const incentives_fee_type = document.getElementById("incentives_fee_type");
    const incentives_fee_Monetary_display = document.getElementById("incentives_fee_Monetary_display");


    incentives_fee_type.addEventListener("change", function () {
        if (this.value === "0") {
            incentives_fee_Monetary_display.style.display = "block"; // Show input field
            

        } else {
            incentives_fee_Monetary_display.style.display = "none"; // Hide input field

        }
    });

});