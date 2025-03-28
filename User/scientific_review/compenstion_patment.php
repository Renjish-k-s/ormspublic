<style>
#compenstion_classification
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
    
    
    <div class="d-flex align-items-center">
        <h2 class="text-center mb-0 flex-grow-1" id="payment_compensation_id_bag_header">PAYMENT AND COMPENSATION</h2>
        <small>
            <button type="button" id="payment_compensation_id_bag_header_button" class="more_info_class btn btn-link p-0" onclick="display_guideline()">Refer the guideline</button>
        </small>
    </div>

    <div class="row mt-3" id="payment_compensation_id_bag">
        <div class="col-md-6">
            <div class="form-group">
                <label for="compensation_status">Will participants receive any payment or compensation?</label>
                <select class="form-control" id="compensation_status" name="compensation_status">
                    <option value="" disabled selected>Select Status</option>
                    <option value="0">Yes</option>
                    <option value="1">No</option>
                </select>       
            </div>
        </div>

        <div class="col-md-6" id="why_not_compensation" style="display:none">
            <div class="form-group">
                <label for="compensation_status_why">Why you have no compensation method?</label>
                <select class="form-control" id="compensation_status_why" name="compensation_status_why">
                    <option value="" disabled selected>Select Status</option>
                    <option value="0">It is an Invitro study</option>
                    <option value="1">Observational Study</option>
                    <option value="2">Non Interventional research</option>
                </select>        
            </div>
        </div>


        <div class="col-md-6" id="who_bear_compensation" style="display:none">
            <div class="form-group">
                <label for="compensation_status_who_bear">Who will bear the costs related to participation and procedures?</label>
                <select class="form-control" id="compensation_status_who_bear" name="compensation_status_who_bear">
                    <option value="" disabled selected>Select Status</option>
                    <option value="0">PI</option>
                    <option value="1">Institution</option>
                    <option value="2">Sponsor</option>
                    <option value="3">Other</option>
                </select>        
            </div>
        </div>

        <div class="col-md-6" id="treatment_status_display" style="display:none">
            <div class="form-group">
                <label for="treatment_status">Is there a provision for free treatment of research related injuries?</label>
                <select class="form-control" id="treatment_status" name="treatment_status">
                    <option value="" disabled selected>Select Status</option>
                    <option value="0">Yes</option>
                    <option value="1">No</option>
                </select>       
            </div>
        </div>
                        <div class="col-md-6" id="who_provide_treatment_display" style="display:none">
                            <div class="form-group">
                                <label for="who_provide_treatment">who will provide the treatment?</label>
                                <input type="text" class="form-control" id="who_provide_treatment" name="who_provide_treatment" placeholder="Enter who" >
                            </div>
                        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="compensation_research_SAEs">Who provides compensation for research-related SAEs?
                </label>
                <select class="form-control" id="compensation_research_SAEs" name="compensation_research_SAEs">
                    <option value="" disabled selected>Select Status</option>
                    <option value="0">SAEs not applicable</option>
                    <option value="1">Sponsor</option>
                    <option value="2">Institutional/Corpus fund</option>
                    <option value="3">Project grant</option>
                    <option value="4">Insurance</option>

                </select>       
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="causality_treatment_specify">Is medical care given for study injuries until causality is confirmed?</label>
                <input type="text" class="form-control" id="causality_treatment_specify" name="causality_treatment_specify" placeholder="please specify" > 
            </div>
        </div>



<div id="compenstion_classification">
    <div>
    <img src="./images/compensation.png" alt=""/>

    </div>

    <button type="button" class="btn btn-primary" onclick="hide_classification()">Go Back</button>
</div>



        </div>

                 


    <script>
        // JavaScript code to toggle the visibility of "why_not_compensation"
        document.addEventListener("DOMContentLoaded", function() {
            const compensation_status = document.getElementById("compensation_status");
            const why_not_compensation = document.getElementById("why_not_compensation");


            const who_bear_compensation = document.getElementById("who_bear_compensation");

            const treatment_status_display = document.getElementById("treatment_status_display");




            compensation_status.addEventListener("change", function () {
                if (this.value === "1") { // "No" option selected
                    why_not_compensation.style.display = "block"; // Show the input field
                    treatment_status_display.style.display = "block"; // Show the input field

                } else {
                    why_not_compensation.style.display = "none"; // Hide the input field
                    treatment_status_display.style.display = "none"; // Show the input field
                }


                if (this.value === "0") { // "yes" option selected
                    who_bear_compensation.style.display = "block"; // Show the input field

                } else {
                    who_bear_compensation.style.display = "none"; // Hide the input field

                }
            });


            const treatment_status = document.getElementById("treatment_status");
            const who_provide_treatment_display = document.getElementById("who_provide_treatment_display");

            treatment_status.addEventListener("change", function () {
                if (this.value === "0") {
                    who_provide_treatment_display.style.display = "block"; 

                }
                else {
                    who_provide_treatment_display.style.display = "none"; 
                }

        });

        });



        // Mock function for "Refer the guideline" button
        function display_guideline() {
           // alert("Guidelines for payment and compensation will be displayed here.");
            document.getElementById('compenstion_classification').style.display = 'flex';

        }

        function hide_classification()
        {
            document.getElementById('compenstion_classification').style.display = 'none';

        }
    </script>

