<style>


#show_more_details_research_type
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


<h2 class="text-center">RESEARCH RELATED INFORMATION</h2>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="summary">Lay summary of the research</label>
            <textarea class="form-control" id="summary" name="summary" placeholder="Enter summary*" rows="4" autocomplete="off"></textarea>
            <small id="wordCount">0 / 300 words</small>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label for="category">Category of Research</label>
            <div class="row">
                <div class="col-md-4">
                    <label>
                        <input type="checkbox" name="academic_research[]" id="academicResearchCheckbox" value="Academic Research"> Academic Research
                    </label>
                </div>
                <div class="col-md-4">
                    <label>
                        <input type="checkbox" id="i_c_research" name="academic_research[]" value="Industry-Sponsored/Commercial Research"> Industry-Sponsored/Commercial Research
                    </label>
                </div>
                <div class="col-md-4">
                    <label>
                        <input type="checkbox" name="Government-Funded Research" name="academic_research[]"> Government-Funded Research
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>
                        <input type="checkbox" value="Institutional Research" name="academic_research[]"> Institutional Research
                    </label>
                </div>
                <div class="col-md-4">
                    <label>
                        <input type="checkbox" id="experimental_research" name="academic_research[]" value="Multicentric Research"> Collaborative/Multicentric Research
                    </label>
                </div>
                <div class="col-md-4">
                    <!-- Empty div to maintain the grid structure -->
                    <label></label>
                </div>
            </div>
        </div>
    </div>

<!-- dtfygugug -->
                    <div class="col-md-12" id="academicResearchTypeContainer" style="display:none;">
                            <div class="form-group">
                                <label for="academicResearchType">Type of Academic Research</label>
                                <select class="form-control" id="academicResearchType" name="academicResearchType">
                                    <option value="">Select Research Type</option>
                                    <option value="a">Undergraduate thesis/dissertation</option>
                                    <option value="b">Master's thesis</option>
                                    <option value="c">PhD or Doctoral work</option>
                                    <option value="d">Postdoctoral research </option>
                                    <option value="e">Research conducted as part of an institutional project (not tied to individual academic work)</option>
                                </select>
                            </div>
                        </div>
<!-- bjbknllojm -->

<!-- dtfygugug -->
                    <div class="col-md-12" id="industry_commercial_TypeContainer" style="display:none;">
                            <div class="form-group">
                                <label for="i_c_ResearchType">Type of industry-Sponsored/Commercial Research</label>
                                <select class="form-control" id="i_c_ResearchType" name="i_c_ResearchType">
                                    <option value="">Select Research Type</option>
                                    <option value="a">Sponsored by pharmaceutical companies, medical device manufacturers, or other industries</option>
                                    <option value="b">Product testing or validation studies</option>
                                </select>
                            </div>
                        </div>
<!-- bjbknllojm -->


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Estimate_amm">Total Estimated Budget</label>
                                <input type="number" class="form-control" id="Estimate_amm" name="Estimate_amm" placeholder="Enter budget in rupees*" autocomplete="off">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="s_fund">Source of funding</label>
                            <select class="form-control" id="s_fund_id" name="s_fund_id">
                                <option value="">Select funding source</option>
                                <option value="a">Self Funding</option>
                                <option value="b">Inistutional Funding</option>
                                <option value="c">External Agency</option>

                            </select>
                            </div>
                        </div>


                        <div class="col-md-12" id="externalAgencyContainer" style="display:none;">
                            <div class="form-group">
                                <label for="ext_agency_type">If Source of Funding is through “external Agency”, Please specify the details </label>
                                <textarea class="form-control" id="ext_agency_type" name="ext_agency_type" placeholder="Enter external agency*" rows="4" autocomplete="off"></textarea>
                        </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="researchApproach">Research Approach</label>
                                <select class="form-control" id="researchApproach" name="research_approach">
                                    <option value="" disabled selected>Select Research Approach</option>
                                    <option value="0">Quantitative Research</option>
                                    <option value="1">Qualitative Research</option>
                                    <option value="2">Mixed Research</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="titleInput">What is the nature of your research study?<small><button type="button" class="more_info_class" onclick="show_details(4)">show more</button></small></label>
                                <select class="form-control" id="Vitro_Vivo_type" name="Vitro_Vivo_type">
                                <option value="">Select nature of research</option>
                                <option value="0">In Vitro</option>
                                <option value="1">In Vivo</option>

                            </select>
                            </div>
                        </div>

    <div class="col-md-6" id="stored_status_invitro_display" style="display:none">
    <div class="form-group">
            <label for="stored_status_invitro">Specify the privacy category of stored materials.<small><button type="button" class="more_info_class" onclick="display_box()">show more</button></small></label>
                <select class="form-control" id="stored_status_invitro" name="stored_status_invitro">
                    <option value="" disabled selected>Select Status</option>
                    <option value="0">Anonymous or unidentified data</option>
                    <option value="1">Anonymized - Coded or reversibly anonymized:</option>
                    <option value="2">Anonymized- Irreversibly anonymized</option>
                    <option value="4">Identifiable</option>
                </select>
    </div>
</div>





<!--  -->  


                        <div class="col-md-12" id="Quantitative_Research" style="display:none">
                            <div class="form-group">
                                <label for="titleInput">Research design</label>
                                <div class="row">
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="Not_applicable"> Not applicable due to invitro
                                    </label>
                                </div>

                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="case_report"> Case Report
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="case_series"> Case Series
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="ecological"> Ecological
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="cross_sectional"> Cross Sectional
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="case_control"> Case Control
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="cohort_design"> Cohort Design
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="quasi_experimental"> Quasi Experimental Design
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="randomized_trial_phase1"> Randomized Clinical Trial Phase I
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="randomized_trial_phase2"> Randomized Clinical Trial Phase II
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="randomized_trial_phase3"> Randomized Clinical Trial Phase III
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="randomized_trial_phase4"> Randomized Clinical Trial Phase IV
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="systematic_review"> Systematic Review and Meta Analysis
                                    </label>
                                </div>


                             </div>

                            </div>
                            </div>



                            <!--  -->
<!--  -->
                        <div class="col-md-12" id="Qualitative_Research" style="display:none">
                            <div class="form-group">
                                <label for="titleInput">Research design</label>
                                    <div class="row">
                                    <div class="col-md-4">
                                                <label>
                                                    <input type="checkbox" name="research_type[]" value="phenomenology"> Phenomenology
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>
                                                    <input type="checkbox" name="research_type[]" value="grounded_theory"> Grounded Theory
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>
                                                    <input type="checkbox" name="research_type[]" value="ethnography"> Ethnography
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>
                                                    <input type="checkbox" name="research_type[]" value="narrative_research"> Narrative Research
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>
                                                    <input type="checkbox" name="research_type[]" value="case_study"> Case Study
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>
                                                    <input type="checkbox" name="research_type[]" value="action_research"> Action Research
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>
                                                    <input type="checkbox" name="research_type[]" value="aci" id="ctri_request"> Academic clinical trial
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>
                                                    <input type="checkbox" name="research_type[]" value="critical_qualitative"> Critical Qualitative Research
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>
                                                    <input type="checkbox" name="research_type[]" value="discourse_analysis"> Discourse Analysis
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>
                                                    <input type="checkbox" name="research_type[]" value="ipa"> Interpretative Phenomenological Analysis (IPA)
                                                </label>
                                            </div>
                                    </div>
                            </div>
                        </div>

<div class="col-md-6" id="ctri_request_display" style="display:none">
        <div class="form-group">
            <label for="ctri_request_upload">Have you applied to CTRI? If yes, please upload the documents.</label>
            <input class="form-control" id="ctri_request_upload" name="ctri_request_upload" type="file"autocomplete="off"/>
        </div>
</div>




<!-- ///////////////for multicentric research                     /////////////////////// -->
<div id="for_multicentric_research" style="display:none" class="col-md-12">
    <h2 class="text-center">RESEARCH RELATED INFORMATION</h2>

    <div class="row">
        <!-- Left Side: Sample size -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="sample_size">Sample Size / Number of Participants</label>
                <input type="number" class="form-control" id="sample_size" name="sample_size" placeholder="Enter Sample Size *" autocomplete="off">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="sample_size">Number of samples are there is this center</label>
                <input type="number" class="form-control" id="nummber_sample_size" name="number_sample_size" placeholder="Enter Sample Size *" autocomplete="off">
            </div>
        </div>
        

        <!-- Right Side: Sample size by country -->
        <div class="col-md-6">
            <div class="form-group">
                <label>Number of samples are there in the other centers</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" class="form-control" id="India" name="India" placeholder="India *" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <input type="number" class="form-control" id="USA" name="USA" placeholder="Global *" autocomplete="off">
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="sample_size">Sample size for Intervention/Case group in this center?</label>
                <input type="number" class="form-control" id="Intervention_sample_size" name="Intervention_sample_size" placeholder="Enter Sample Size *" autocomplete="off">
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="Placebo_sample_size_no">Sample size for Placebo/Control group in this center?</label>
                <input type="number" class="form-control" id="Placebo_sample_size_no" name="Placebo_sample_size_no" placeholder="Enter Sample Size *" autocomplete="off">
            </div>
        </div>


      

       

    </div> <!-- End row -->


   
</div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="total_sample_size">Total Sample Size Per Group</label>
                <input type="number" class="form-control" id="total_sample_size" name="total_sample_size" placeholder="Enter Sample Size *" autocomplete="off">
            </div>
        </div>



<div class="col-md-6">
            <div class="form-group">
                <label for="out_status  ">Is an external lab or outsourcing involved for investigations?</label>
                <select class="form-control" id="out_status" name="out_status">
                                <option value="">Select status</option>
                                <option value="0">yes</option>
                                <option value="1">No</option>

                </select>
            </div>
        </div>

<div class="col-md-6" id="out_status_display" style="display:none">
        <div class="form-group">
            <label for="MoU_upload">Provide details if samples are outsourced and attach MTA/MoU."</label>
            <input class="form-control" id="MoU_upload" name="MoU_upload" type="file"autocomplete="off"/>
        </div>
</div>


<div class="col-md-12">
        <div class="form-group">
            <label for="justification">Please provide details of the sample size calculation and the sample selection process, if applicable.</label>
            <textarea class="form-control" id="justification" name="justification" placeholder="Enter justification*" rows="4" autocomplete="off"></textarea>
        </div>
</div>


<!--  -->
<!--  -->
                       



<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<div id="show_more_details_research_type">
    <div>
    <img src="./images/type_approach.png" alt=""/>

    </div>

    <button type="button" class="btn btn-primary" onclick="go_back_rel()">Go Back</button>
</div>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

                      






</div>
























































<script>

function go_back_rel()
{
    //alert("haiii");
    document.getElementById('show_more_details_research_type').style.display = 'none';
}


document.addEventListener("DOMContentLoaded", function () {


    const stored_status_invitro = document.getElementById("stored_status_invitro");
    const benefit_risk = document.getElementById("benefit_risk");
    const benefit_risk_header = document.getElementById("benefit_risk_header");

    const partipant_related_information_id = document.getElementById("partipant_related_information_id");
    const partipant_related_information_id_header = document.getElementById("partipant_related_information_id_header");

    const informed_concent_id_bag_header = document.getElementById("informed_concent_id_bag_header");
    const informed_concent_id_bag = document.getElementById("informed_concent_id_bag");

    const payment_compensation_id_bag_header = document.getElementById("payment_compensation_id_bag_header");
    const payment_compensation_id_bag = document.getElementById("payment_compensation_id_bag");
    const payment_compensation_id_bag_header_button = document.getElementById("payment_compensation_id_bag_header_button");





    stored_status_invitro.addEventListener("change", function () {
        if (this.value === "0" || this.value === "2") {

            //alert("hello");
         

            partipant_related_information_id_header.style.display = "none"; // Hide
            partipant_related_information_id.style.display = "none"; // Hide


            benefit_risk_header.style.display = "none"; // Hide
            benefit_risk.style.display = "none"; // Hide


            // informed_concent_id_bag_header.style.display = "none"; // Hide
            // informed_concent_id_bag.style.display = "none"; // Hide

            payment_compensation_id_bag_header.style.display = "none"; // Hide
            payment_compensation_id_bag.style.display = "none"; // Hide
            payment_compensation_id_bag_header_button.style.display = "none"; // Hide




        }
        else
        {
          

            partipant_related_information_id_header.style.display = "block"; // Hide
            partipant_related_information_id.style.display = "block"; // Hide

            benefit_risk_header.style.display = "block"; // Hide
            benefit_risk.style.display = "block"; // Hide


            // informed_concent_id_bag_header.style.display = "block"; // Hide
            // informed_concent_id_bag.style.display = "block"; // Hide

            payment_compensation_id_bag_header.style.display = "block"; // Hide
            payment_compensation_id_bag.style.display = "block"; // Hide
            payment_compensation_id_bag_header_button.style.display = "block"; // Hide
        }
});







    let ctri_request = document.getElementById("ctri_request");
    let ctri_request_display = document.getElementById("ctri_request_display");

    ctri_request.addEventListener("change", function () {
                if (this.checked) {
                  //  alert("got");
                    ctri_request_display.style.display = "block"; // Show
                } else {
                  //  alert("not got");
                    ctri_request_display.style.display = "none"; // Hide
                }
            });






        // Select the experimental research checkbox
        let experimentalCheckbox = document.getElementById("experimental_research");

        // Select the div that should be displayed
        let multicentricResearchDiv = document.getElementById("for_multicentric_research");

        // Ensure elements exist before adding event listener
        if (experimentalCheckbox && multicentricResearchDiv) {
            experimentalCheckbox.addEventListener("change", function () {
                if (this.checked) {
                    multicentricResearchDiv.style.display = "block"; // Show
                } else {
                    multicentricResearchDiv.style.display = "none"; // Hide
                }
            });
        } else {
            console.error("Element not found! Check your IDs.");
        }






    const out_status = document.getElementById("out_status");
    const out_status_display = document.getElementById("out_status_display");

  out_status.addEventListener("change", function () {
        if (this.value === "0") {
            out_status_display.style.display = "block"; // Show input field
          // alert("haii");
        } else {
            out_status_display.style.display = "none"; // Hide input field
        }
    });



    



    const researchApproach = document.getElementById("researchApproach");
    const Qualitative_Research = document.getElementById("Qualitative_Research");
    const Quantitative_Research = document.getElementById("Quantitative_Research");


    researchApproach.addEventListener("change", function () {
        if (this.value === "0") {
            Quantitative_Research.style.display = "block"; // Show input field
            Qualitative_Research.style.display = "none"; // Hide input field


          //alert("haii");
        } else if(this.value === "1") {
            Qualitative_Research.style.display = "block"; // Hide input field
            Quantitative_Research.style.display = "none"; // Show input field

        }
        else if(this.value === "2") {
            Qualitative_Research.style.display = "block"; // Hide input field
            Quantitative_Research.style.display = "block"; // Show input field

        }
        else
        {
            Qualitative_Research.style.display = "none"; // Hide input field
            Quantitative_Research.style.display = "none"; // Show input field
        }
    });





    });





</script>



<script src="./js/research_related.js"></script>
