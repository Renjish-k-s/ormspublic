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
            <textarea class="form-control" id="summary" name="summary" placeholder="Enter summary*" rows="4" ><?php echo $administrative_details['summary'] ?></textarea>
            <small id="wordCount">0 / 300 words</small>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label for="category">Category of Research</label>
            <div class="row">
                <div class="col-md-4">
                    <label>
                        <input type="checkbox" name="academic_research[]" id="academicResearchCheckbox" value="Academic Research" <?php echo in_array("Academic Research", $academic_research) ? 'checked' : ''; ?>> Academic Research
                    </label>
                </div>
                <div class="col-md-4">
                    <label> 
                        <input type="checkbox" id="i_c_research" name="academic_research[]" value="Industry-Sponsored/Commercial Research" <?php echo in_array("Industry-Sponsored/Commercial Research", $academic_research) ? 'checked' : ''; ?>> Industry-Sponsored/Commercial Research
                    </label>
                </div>
                <div class="col-md-4">
                    <label>
                        <input type="checkbox" value="Government-Funded Research" name="academic_research[]" <?php echo in_array("Government-Funded Research", $academic_research) ? 'checked' : ''; ?>> Government-Funded Research
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>
                        <input type="checkbox" value="Institutional Research" name="academic_research[]" <?php echo in_array("Institutional Research", $academic_research) ? 'checked' : ''; ?>> Institutional Research
                    </label>
                </div>
                <div class="col-md-4">
                    <label>
                        <input type="checkbox" id="experimental_research" name="academic_research[]" value="Multicentric Research" <?php echo in_array("Multicentric Research", $academic_research) ? 'checked' : ''; ?>> Collaborative/Multicentric Research
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
                    <div class="col-md-12" id="academicResearchTypeContainer" style="display: <?php echo in_array("Institutional Research", $academic_research)  ? 'block' : 'none'; ?>">
                            <div class="form-group">
                                <label for="academicResearchType">Type of Academic Research</label>
                                <select class="form-control" id="academicResearchType" name="academicResearchType">
                                    <option value="">Select Research Type</option>
                                    <option value="a" <?php echo ($research_related_info['academicResearchType'] === 'a') ? 'selected' : ''; ?>>Undergraduate thesis/dissertation</option>
                                    <option value="b"<?php echo ($research_related_info['academicResearchType'] === 'b') ? 'selected' : ''; ?>>Master's thesis</option>
                                    <option value="c"<?php echo ($research_related_info['academicResearchType'] === 'c') ? 'selected' : ''; ?>>PhD or Doctoral work</option>
                                    <option value="d"<?php echo ($research_related_info['academicResearchType'] === 'd') ? 'selected' : ''; ?>>Postdoctoral research </option>
                                    <option value="e"<?php echo ($research_related_info['academicResearchType'] === 'e') ? 'selected' : ''; ?>>Research conducted as part of an institutional project (not tied to individual academic work)</option>
                                </select>
                            </div>
                        </div>
<!-- bjbknllojm -->

<!-- dtfygugug -->
                    <div class="col-md-12" id="industry_commercial_TypeContainer" style="display: <?php echo in_array("IIndustry-Sponsored/Commercial Research", $academic_research)  ? 'block' : 'none'; ?>">
                            <div class="form-group">
                                <label for="i_c_ResearchType">Type of industry-Sponsored/Commercial Research</label>
                                <select class="form-control" id="i_c_ResearchType" name="i_c_ResearchType">
                                    <option value="">Select Research Type</option>
                                    <option value="a"<?php echo ($research_related_info['i_c_ResearchType'] === 'a') ? 'selected' : ''; ?>>Sponsored by pharmaceutical companies, medical device manufacturers, or other industries</option>
                                    <option value="b"<?php echo ($research_related_info['i_c_ResearchType'] === 'b') ? 'selected' : ''; ?>>Product testing or validation studies</option>
                                </select>
                            </div>
                        </div>
<!-- bjbknllojm -->


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="titleInput">Total Estimated Budget</label>
                                <input type="number" class="form-control" id="Estimate_amm" name="Estimate_amm" placeholder="Enter budget in rupees*" autocomplete="off" value="<?php echo $research_related_info['Estimate_amm'] ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="s_fund">Source of funding</label>
                            <select class="form-control" id="s_fund_id" name="s_fund_id">
                                <option value="">Select funding source</option>
                                <option value="a" <?php echo ($research_related_info['s_fund_id'] === 'a') ? 'selected' : ''; ?>>Self Funding</option>
                                <option value="b" <?php echo ($research_related_info['s_fund_id'] === 'b') ? 'selected' : ''; ?>>Inistutional Funding</option>
                                <option value="c" <?php echo ($research_related_info['s_fund_id'] === 'c') ? 'selected' : ''; ?>>External Agency</option>

                            </select>
                            </div>
                        </div>



                        <div class="col-md-12" id="externalAgencyContainer" style="display: <?php echo ($research_related_info['s_fund_id'] === 'c')  ? 'block' : 'none'; ?>">
                            <div class="form-group">
                                <label for="ext_agency_type">If Source of Funding is through “external Agency”, Please specify the details </label>
                                <textarea class="form-control" id="ext_agency_type" name="ext_agency_type" placeholder="Enter external agency*" rows="4" autocomplete="off"><?php echo $research_related_info['ext_agency_type'] ?></textarea>
                        </div>

                        </div>



                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="researchApproach">Research Approach</label>
                                <select class="form-control" id="researchApproach" name="research_approach">
                                    <option value="" disabled selected>Select Research Approach</option>
                                    <option value="0"<?php echo ($research_related_info['research_approach'] === '0') ? 'selected' : ''; ?>>Quantitative Research</option>
                                    <option value="1"<?php echo ($research_related_info['research_approach'] === '1') ? 'selected' : ''; ?>>Qualitative Research</option>
                                    <option value="2"<?php echo ($research_related_info['research_approach'] === '2') ? 'selected' : ''; ?>>Mixed Research</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="titleInput">What is the nature of your research study?<small><button type="button" class="more_info_class" onclick="show_details(4)">show more</button></small></label>
                                <select class="form-control" id="Vitro_Vivo_type" name="Vitro_Vivo_type">
                                <option value="">Select nature of research</option>
                                <option value="0"<?php echo ($research_related_info['Vitro_Vivo_type'] === '0') ? 'selected' : ''; ?>>In Vitro</option>
                                <option value="1"<?php echo ($research_related_info['Vitro_Vivo_type'] === '1') ? 'selected' : ''; ?>>In Vivo</option>
                              
                            </select>
                            </div>
                        </div>


<div class="col-md-6" id="stored_status_invitro_display" style="display: <?php echo ($research_related_info['Vitro_Vivo_type'] === '0')  ? 'block' : 'none'; ?>">
    <div class="form-group">
            <label for="stored_status_invitro">Specify the privacy category of stored materials.<small><button type="button" class="more_info_class" onclick="display_box()">show more</button></small></label>
                <select class="form-control" id="stored_status_invitro" name="stored_status_invitro">
                    <option value="" disabled selected>Select Status</option>
                    <option value="0" <?php echo ($research_related_info['stored_status_invitro'] === '0') ? 'selected' : ''; ?>>Anonymous or unidentified data</option>
                    <option value="1" <?php echo ($research_related_info['stored_status_invitro'] === '1') ? 'selected' : ''; ?>>Anonymized - Coded or reversibly anonymized:</option>
                    <option value="2" <?php echo ($research_related_info['stored_status_invitro'] === '2') ? 'selected' : ''; ?>>Anonymized- Irreversibly anonymized</option>
                    <option value="3" <?php echo ($research_related_info['stored_status_invitro'] === '3') ? 'selected' : ''; ?>>Identifiable</option>
                </select>
    </div>
</div>




<!--  -->  


    <div class="col-md-12" id="Quantitative_Research" style="display: <?php echo ($research_related_info['research_approach'] === '0' || $research_related_info['research_approach'] === '2') ? 'block' : 'none'; ?>;">

    <div class="form-group">
                                <label for="titleInput">Research design</label>
                                <div class="row">
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="case_report"<?php echo in_array("case_report", $research_type) ? 'checked' : ''; ?>> Case Report
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="case_series" <?php echo in_array("case_series", $research_type) ? 'checked' : ''; ?>> Case Series
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="ecological" <?php echo in_array("ecological", $research_type) ? 'checked' : ''; ?>> Ecological
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="cross_sectional" <?php echo in_array("cross_sectional", $research_type) ? 'checked' : ''; ?>> Cross Sectional
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="case_control" <?php echo in_array("case_control", $research_type) ? 'checked' : ''; ?>> Case Control
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="cohort_design" <?php echo in_array("cohort_design", $research_type) ? 'checked' : ''; ?>> Cohort Design
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="quasi_experimental" <?php echo in_array("quasi_experimental", $research_type) ? 'checked' : ''; ?>> Quasi Experimental Design
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="randomized_trial_phase1" <?php echo in_array("randomized_trial_phase1", $research_type) ? 'checked' : ''; ?>> Randomized Clinical Trial Phase I
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="randomized_trial_phase2" <?php echo in_array("randomized_trial_phase2", $research_type) ? 'checked' : ''; ?>> Randomized Clinical Trial Phase II
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="randomized_trial_phase3" <?php echo in_array("randomized_trial_phase3", $research_type) ? 'checked' : ''; ?>> Randomized Clinical Trial Phase III
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="randomized_trial_phase4" <?php echo in_array("randomized_trial_phase4", $research_type) ? 'checked' : ''; ?>> Randomized Clinical Trial Phase IV
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox" name="research_type[]" value="systematic_review" <?php echo in_array("systematic_review", $research_type) ? 'checked' : ''; ?>> Systematic Review and Meta Analysis
                                    </label>
                                </div>


                             </div>

                            </div>
                            </div>


                        <div class="col-md-12" id="Qualitative_Research" style="display: <?php echo ($research_related_info['research_approach'] === '1' || $research_related_info['research_approach'] === '2') ? 'block' : 'none'; ?>;">
                        <div class="form-group">
                                <label for="titleInput">Research design</label>
                                    <div class="row">
                                    <div class="col-md-4">
                                                <label>
                                                    <input type="checkbox" name="research_type[]" value="phenomenology" <?php echo in_array("phenomenology", $research_type) ? 'checked' : ''; ?>> Phenomenology
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>
                                                    <input type="checkbox" name="research_type[]" value="grounded_theory" <?php echo in_array("grounded_theory", $research_type) ? 'checked' : ''; ?>> Grounded Theory
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>
                                                    <input type="checkbox" name="research_type[]" value="ethnography" <?php echo in_array("ethnography", $research_type) ? 'checked' : ''; ?>> Ethnography
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>
                                                    <input type="checkbox" name="research_type[]" value="narrative_research" <?php echo in_array("narrative_research", $research_type) ? 'checked' : ''; ?>> Narrative Research
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>
                                                    <input type="checkbox" name="research_type[]" value="case_study" <?php echo in_array("case_study", $research_type) ? 'checked' : ''; ?>> Case Study
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>
                                                    <input type="checkbox" name="research_type[]" value="action_research" <?php echo in_array("action_research", $research_type) ? 'checked' : ''; ?>> Action Research
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>
                                                    <input type="checkbox" id="ctri_request" name="research_type[]" value="aci"<?php echo in_array("aci", $research_type) ? 'checked' : ''; ?>> Academic clinical trial
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>
                                                    <input type="checkbox" name="research_type[]" value="critical_qualitative" <?php echo in_array("critical_qualitative", $research_type) ? 'checked' : ''; ?>> Critical Qualitative Research
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>
                                                    <input type="checkbox" name="research_type[]" value="discourse_analysis" <?php echo in_array("discourse_analysis", $research_type) ? 'checked' : ''; ?>> Discourse Analysis
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>
                                                    <input type="checkbox" name="research_type[]" value="ipa" <?php echo in_array("ipa", $research_type) ? 'checked' : ''; ?>> Interpretative Phenomenological Analysis (IPA)
                                                </label>
                                            </div>
                                    </div>
                            </div>
                        </div>

<div class="col-md-6" id="ctri_request_display" style="display: <?php echo in_array("aci", $research_type) ? 'block' : 'none'; ?>;">
    <div class="form-group">
            <label for="ctri_request_upload">Have you applied to CTRI? If yes, please upload the documents.</label>
            <input class="form-control" id="ctri_request_upload" name="ctri_request_upload" type="file"autocomplete="off"/>
        </div>
</div>



<!-- ///////////////for multicentric research                     /////////////////////// -->

    
    <div id="for_multicentric_research" class="col-md-12"style="display: <?php echo in_array("Multicentric Research", $academic_research)  ? 'block' : 'none'; ?>">
    <h2 class="text-center">RESEARCH RELATED INFORMATION</h2>

    <div class="row"> 
        <!-- Left Side: Sample size -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="sample_size">Sample Size / Number of Participants</label>
                <input type="number" class="form-control" id="sample_size" name="sample_size" placeholder="Enter Sample Size *" autocomplete="off" value="<?php echo $research_related_info['sample_size'] ?>">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="sample_size">Number of samples are there is this center</label>
                <input type="number" class="form-control" id="nummber_sample_size" name="number_sample_size" placeholder="Enter Sample Size *" autocomplete="off" value="<?php echo $research_related_info['number_sample_size'] ?>">
            </div>
        </div>
        

        <!-- Right Side: Sample size by country -->
        <div class="col-md-6">
            <div class="form-group">
                <label>Number of samples are there in the other centers</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" class="form-control" id="India" name="India" placeholder="India *" autocomplete="off" value="<?php echo $research_related_info['India'] ?>">
                    </div>
                    <div class="col-md-6">
                        <input type="number" class="form-control" id="USA" name="USA" placeholder="Global *" autocomplete="off" value="<?php echo $research_related_info['USA'] ?>">
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="sample_size">Sample size for Intervention/Case group in this center?</label>
                <input type="number" class="form-control" id="Intervention_sample_size" name="Intervention_sample_size" placeholder="Enter Sample Size *" autocomplete="off" value="<?php echo $research_related_info['Intervention_sample_size'] ?>">
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="Placebo_sample_size_no">Sample size for Placebo/Control group in this center?</label>
                <input type="number" class="form-control" id="Placebo_sample_size_no" name="Placebo_sample_size_no" placeholder="Enter Sample Size *" autocomplete="off" value="<?php echo $research_related_info['Placebo_sample_size']; ?>" >
            </div>
        </div>


      

       

    </div> <!-- End row -->


   
</div>



        <div class="col-md-6">
            <div class="form-group">
                <label for="total_sample_size">Total Sample Size</label>
                <input type="number" class="form-control" id="total_sample_size" name="total_sample_size" placeholder="Enter Sample Size *" autocomplete="off" value="<?php echo $research_related_info['total_sample_size']; ?>">
            </div>
        </div>



<div class="col-md-6">
            <div class="form-group">
                <label for="out_status  ">Is an external lab or outsourcing involved for investigations?</label>
                <select class="form-control" id="out_status" name="out_status">
                                <option value="">Select status</option>
                                <option value="0" <?php echo ($research_related_info['out_status'] === '0') ? 'selected' : ''; ?>>yes</option>
                                <option value="1" <?php echo ($research_related_info['out_status'] === '1') ? 'selected' : ''; ?>>No</option>

                </select>
            </div>
        </div>

        






<div class="col-md-12">
        <div class="form-group">
            <label for="justification">Please provide details of the sample size calculation and the sample selection process, if applicable.</label>
            <textarea class="form-control" id="justification" name="justification" placeholder="Enter justification*" rows="4" autocomplete="off"><?php echo $research_related_info['justification']; ?></textarea>
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
            benefit_risk.style.display = "none"; // Hide
            benefit_risk_header.style.display = "none"; // Hide

            partipant_related_information_id_header.style.display = "none"; // Hide
            partipant_related_information_id.style.display = "none"; // Hide


            informed_concent_id_bag_header.style.display = "none"; // Hide
            informed_concent_id_bag.style.display = "none"; // Hide

            payment_compensation_id_bag_header.style.display = "none"; // Hide
            payment_compensation_id_bag.style.display = "none"; // Hide
            payment_compensation_id_bag_header_button.style.display = "none"; // Hide




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
