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
           
            <h2 class="text-center">ADMINISTRATIVE DETAILS</h2>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="titleInput">Title of the Research</label>
                                <input type="text" class="form-control" id="titleInput" name="titleInput" placeholder="Enter research title*" autocomplete="off">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="short_title">Short title of research(if any)</label>
                                <input type="text" class="form-control" id="short_title" name="short_title" placeholder="Enter short title*" autocomplete="off">
                            </div>
                         </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="institutionInput">Name of the institution applying for certificate.</label>
                                <select class="form-control" id="institutionInput" name="institutionInput">
                                    <option value="" disabled selected>Select Name of institution</option>
                                    <option value="0">Mar Basalious Dental College Kothamangalam</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="review_type">Type of Ethical Review Requested.  <button type="button" class="more_info_class" onclick="show_details(0)"><small>show more</small></button></label>
                                <select class="form-control" id="review_type" name="review_type">
                                <option value="" disabled selected>Select the type of review</option>
                                <option value="0">Exemption from ethical Review</option>
                                <option value="1">Expedited ethical Review</option>
                                <option value="2">Full committee review</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="completion_time">Completion time need<button type="button" class="more_info_class" onclick="show_details(1)"><small>show more</small></button></label>
                                <select class="form-control" id="completion_time" name="completion_time">
                                 
                                    <option value="" disabled selected>Select the time period</option>
                                    <option value="0">less than 1 year</option>
                                    <option value="1">13 - 23 months</option>
                                    <option value="2">24 - 35 months</option>
                                    <option value="3">more than 3 year</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="count_of_collabotators">Count of research collaborators.<button 
                                type="button" class="more_info_class" onclick="show_details(2)"><small>show more</small></button></label>
                                <input type="number" class="form-control" id="count_of_collabotators" 
       name="count_of_collabotators" placeholder="Enter the count*" 
       min="0" max="10" >

                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pre_pi">Previous Studies Led as Principal Investigator.</label>
                                <input type="number" class="form-control" id="pre_pi" name="pre_pi" placeholder="Enter count*" >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pre_co">Previous Studies Led as Co-Investigator.</label>
                                <input type="number" class="form-control" id="pre_co" name="pre_co" placeholder="Enter count*" >
                            </div>
                        </div>

                        

                        <div id="collaborators_table_container"></div>


                 


                        <div id="show_more_details">

                        <img src="./images/image.png" alt=""/>

                        <button type="button" class="btn btn-primary" onclick="go_back(0)">Go back</button>
                        </div>



                        <div id="show_more_details_completiontime">
                            <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 15px;     background-color: #f9f9f9;color:green;">
                                <h4>Instructions:</h4>
                                    <ul>
                                    <p>An annual report on the study's status must be submitted to the commitee</p>
                                    </ul>
                            </div>
    
                             <button type="button" class="btn btn-primary" onclick="go_back(1)">Go back</button>
                        </div>

                        <div id="show_more_detail_collabortors">
                            <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 15px;     background-color: #f9f9f9;color:green;">
                                <h4>Instructions:</h4>
                                    <ul>
                                    <p>Research collaborators include guide and coinvestigators so enter total count</p>
                                    </ul>
                            </div>
    
                             <button type="button" class="btn btn-primary" onclick="go_back(2)">Go back</button>
                        </div>


                    </div>


                    <!--page 2  -->

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
                                <label for="titleInput">Total Estimated Budget</label>
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
                                <option value="2">Both</option>

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
                <label for="total_sample_size">Total Sample Size</label>
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

<div class="col-md-6">
        <div class="form-group">
            <label for="scientific_status">scientific review status</label>
            <select class="form-control" id="scientific_status" name="scientific_status">
                                <option value="">Select status</option>
                                <option value="0">Completed</option>
                                <option value="1">Not Completed</option>

                </select>       
             </div>
</div>





    <div class="col-md-6" id="scientific_upload_display" style="display:none">
    <div class="form-group">
            <label for="scientific_upload">If yes please upload the certificate</label>
            <input class="form-control" id="scientific_upload" name="scientific_upload" type="file"autocomplete="off"/>
        </div>
    </div>

    <div class="col-md-6" id="date_review_display" style="display:none">
    <div class="form-group">
            <label for="rev_date">Date of review</label>
            <input class="form-control" id="rev_date" name="rev_date" type="date"autocomplete="off"/>
        </div>
    </div>



<div class="col-md-12">
        <div class="form-group">
            <label for="justification">Justification for the sample size chosen,In case of qualitative study, mention the criteria used for saturation</label>
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
<!-- page 3333/////////////////////////////////////////////////////////////////////////////////////////////////// -->
<h2 class="text-center">PARTICIPANT RELATED INFORMATION</h2>
                    <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type_participant">Type of participants in the study</label>
                                        <select class="form-control" id="type_participant" name="type_participant">
                                            <option value="" disabled selected>Select type</option>
                                            <option value="0">Healthy Volunteer</option>
                                            <option value="1">Patient</option>
                                            <option value="2">Vulnerable persons/ Special groups</option>
                                            <option value="3">Others</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6" id="type_participant_other" style="display:none">
                                    <div class="form-group">
                                        <label for="short_title">Please specify type of participants</label>
                                        <input type="text" class="form-control" id="other_par_type" name="other_par_type" placeholder="Please specify*" autocomplete="off">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="responsible_participant">Who will be responsible for recruiting study participants?</label>
                                        <select class="form-control" id="responsible_participant" name="responsible_participant">
                                            <option value="" disabled selected>Select type</option>
                                            <option value="Principal Investigator (PI)">Principal Investigator (PI)</option>
                                            <option value="Co-Investigator(s)">Co-Investigator(s)</option>
                                            <option value="Study Coordinator">Study Coordinator</option>
                                            <option value="Clinical Research Team">Clinical Research Team</option>

                                            <option value="Healthcare Providers or Treating Physicians">Healthcare Providers or Treating Physicians</option>
                                            <option value="Nursing Staff">Nursing Staff</option>
                                            <option value="Community Health Workers6">Community Health Workers</option>
                                            <option value="Dedicated Recruitment Team">Dedicated Recruitment Team</option>

                                            <option value="External Recruitment Agency">External Recruitment Agency</option>
                                            <option value="Digital or Online Recruitment Platforms">Digital or Online Recruitment Platforms</option>
                                            <option value="Outreach Specialists">Outreach Specialists</option>
                                            <option value="11">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6" id="other_par_type_other" style="display:none">
                                    <div class="form-group">
                                        <label for="other_par_type_specify">Please specify type of participants</label>
                                        <input type="text" class="form-control" id="other_par_type_specify" name="other_par_type_specify" placeholder="Please specify*" autocomplete="off">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="method_recruitment">Method used to recruit study participants.</label>
                                        <select class="form-control" id="method_recruitment" name="method_recruitment">
                                            <option value="" disabled selected>Select type</option>
                                            <option value="Patients visiting hospitals">Patients visiting hospitals</option>
                                            <option value="TV/Radio ads/ Social media/ Institution website">TV/Radio ads/ Social media/ Institution website</option>
                                            <option value="Posters/leaflets/Letters">Posters/leaflets/Letters</option>
                                            <option value="Telephone">Telephone</option>
                                            <option value="0">Other</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6" id="other_method_recruitment_display" style="display:none">
                                    <div class="form-group">
                                        <label for="other_method_recruitment">Please specify method used to recruit</label>
                                        <input type="text" class="form-control" id="other_method_recruitment" name="other_method_recruitment" placeholder="Please specify*" autocomplete="off">
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="vulerable_status">Does the study involve any vulnerable populations?</label>
                                        <select class="form-control" id="vulerable_status" name="vulerable_status">
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="0">Yes</option>
                                            <option value="1">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6" id="vulerable_status_display" style="display:none">
                                    <div class="form-group">
                                        <label for="other_method_recruitment">Please specify method used to recruit</label>
                                        <select class="form-control" id="vulerable_status_type" name="vulerable_status_type">
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="Economically and socially disadvantaged (unemployed individuals, orphans, abandoned  individuals, persons below the poverty line, ethnic minorities, sexual minorities lesbian/ gay/bisexual and transgender (LGBT), etc.">Economically and socially disadvantaged (unemployed individuals, orphans, abandoned  individuals, persons below the poverty line, ethnic minorities, sexual minorities – lesbian/ gay/bisexual and transgender (LGBT), etc.)</option>
                                            <option value="expectation of benefits or fear of retaliation in case of refusal to participate which may lead them to give consent.">Expectation of benefits or fear of retaliation in case of refusal to participate which may lead them to give consent.</option>
                                            <option value="Have diminished autonomy due to dependency or being under a hierarchical system (students,  employees,  subordinates,  defence  services  personnel,  healthcare  workers,institutionalized individuals, under trials and prisoners)."> Have diminished autonomy due to dependency or being under a hierarchical system (students,  employees,  subordinates,  defence  services  personnel,  healthcare  workers,institutionalized individuals, under trials and prisoners).</option>
                                            <option value=" Suffering from stigmatizing or rare diseases."> Suffering from stigmatizing or rare diseases.</option>
                                            <option value="  Terminally ill or are in search of new interventions having exhausted all therapies.">  Terminally ill or are in search of new interventions having exhausted all therapies.</option>
                                            <option value="Afflicted with mental illness and cognitively impaired individuals, differently abled  mentally and physically disabled.">Afflicted with mental illness and cognitively impaired individuals, differently abled  mentally and physically disabled.</option>
                                            <option value=" Refugees, migrants, homeless, persons or populations in conflict zones, riot areas or disaster situations."> Refugees, migrants, homeless, persons or populations in conflict zones, riot areas or disaster situations.</option>
                                            <option value="Tribals and marginalized communities.">Tribals and marginalized communities.</option>
                                            <option value="Women in special situations (pregnant or lactating women, or those who have poor decision-making powers/poor access to healthcare.">Women in special situations (pregnant or lactating women, or those who have poor decision-making powers/poor access to healthcare.)</option>
                                            <option value=" Children (up to 18 years)"> Children (up to 18 years)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12" id="justification_inclusion_display" style="display:none">
                                    <div class="form-group">
                                        <label for="justification_inclusion">Provide justification for inclusion/exclusion</label>
                                        <textarea class="form-control" id="justification_inclusion" name="justification_inclusion" placeholder="Enter justification*" rows="4" autocomplete="off"></textarea>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="reimbursement_status">Is there any reimbursement to the participants?          </label>
                                        <select class="form-control" id="reimbursement_status" name="reimbursement_status">
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="0">Yes</option>
                                            <option value="1">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6" id="reimbursement_type_display" style="display:none">
                                    <div class="form-group">
                                        <label for="reimbursement_type">Type of reimbursement</label>
                                        <select class="form-control" id="reimbursement_type" name="reimbursement_type">
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="Monetary">Monetary</option>
                                            <option value="Non-Monetary">Non-Monetary</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12" id="justification_Monetary_display" style="display:none">
                                    <div class="form-group">
                                        <label for="justification_Monetary">If Monetary, please specify details   </label>
                                        <textarea class="form-control" id="justification_Monetary" name="justification_Monetary" placeholder="Enter details*" rows="4" autocomplete="off"></textarea>
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="incentives_fee_status">Are there any incentives to the participants?</label>
                                        <select class="form-control" id="incentives_fee_status" name="incentives_fee_status">
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="0">Yes</option>
                                            <option value="1">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6" id="incentives_fee_display" style="display:none">
                                    <div class="form-group">
                                        <label for="incentives_fee_type">Type of incentives</label>
                                        <select class="form-control" id="incentives_fee_type" name="incentives_fee_type">
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="Monetary">Monetary</option>
                                            <option value="Non-Monetary">Non-Monetary</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12" id="incentives_fee_Monetary_display" style="display:none">
                                    <div class="form-group">
                                        <label for="recruitment_fee_Monetary">If Monetary, please specify details   </label>
                                        <textarea class="form-control" id="incentives_fee_Monetary" name="incentives_fee_Monetary" placeholder="Enter details*" rows="4" autocomplete="off"></textarea>
                                    </div>
                                </div>




                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recruitment_fee_status">Are there any recruitment fees or incentives for the PI or Institution?</label>
                                        <select class="form-control" id="recruitment_fee_status" name="recruitment_fee_status">
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="0">Yes</option>
                                            <option value="1">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6" id="recruitment_fee_display" style="display:none">
                                    <div class="form-group">
                                        <label for="recruitment_fee_type">Type of incentives</label>
                                        <select class="form-control" id="recruitment_fee_type" name="recruitment_fee_type">
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="Monetary">Monetary</option>
                                            <option value="Non-Monetary">Non-Monetary</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12" id="recruitment_fee_Monetary_display" style="display:none">
                                    <div class="form-group">
                                        <label for="recruitment_fee_Monetary">If Monetary, please specify details   </label>
                                        <textarea class="form-control" id="recruitment_fee_Monetary" name="recruitment_fee_Monetary" placeholder="Enter details*" rows="4" autocomplete="off"></textarea>
                                    </div>
                                </div>

                                
                    </div>




<script src="./js/participant_related.js"></script>



<!-- page 4///////////////////////////////////////////////////////////////////////////////////////////// -->


<style>
#category_risk_classification
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
<h2 class="text-center">BENEFITS AND RISKS</h2>

<div class="row">
    <div class="col-md-12">

        <div class="form-group">
            <label for="risk_status">Are there any expected risks or discomforts for participants?</label>
            <select class="form-control" id="risk_status" name="risk_status">
                <option value="" disabled selected>Select Status</option>
                <option value="0">Yes</option>
                <option value="1">No</option>
            </select>
        </div>
        </div>
</div>
<div class="row" id="risk_categorize_display"  style="display:none">

        <div class="col-md-12" >
        <div class="form-group">
            <label for="risk_categorize">If yes, categorize the level of risk<small><button type="button" class="more_info_class" onclick="display_classification()">show more</button></small></label>
            <select class="form-control" id="risk_categorize" name="risk_categorize">
                <option value="" disabled selected>Select Status</option>
                <option value="Less than Minimal Risk">Less than Minimal Risk</option>
                <option value="Minimal Risk">Minimal Risk</option>
                <option value="Minor increase over minimal risk or low risk">Minor increase over minimal risk or low risk</option>
                <option value="More than minimal risk or high risk">More than minimal risk or high risk</option>

            </select>
        </div>
    </div>
 <script>

 </script>
    <div class="col-md-12" >
        <div class="form-group">
            <label for="risk_categorize_miti">Describe the risk management strategy</label>
             <textarea class="form-control" id="risk_categorize_miti" name="risk_categorize_miti" placeholder="Enter details*" rows="4" autocomplete="off"></textarea>
        </div>
    </div>


    <div class="col-md-12">

        <div class="form-group">
            <label for="benefit_risk_status">What is the potential benefits for participants?</label>
            <select class="form-control" id="benefit_risk_status" name="benefit_risk_status">
                <option value="" disabled selected>Select Status</option>
                <option value="Direct">Direct</option>
                <option value="In Direct">Indirect</option>
                <option value="No">No benefits</option>
            </select>
        </div>
        </div>


        <div class="col-md-12">
            <div class="form-group">
                <label for="society_community_risk_status">What is the potential benefits for society/community ?</label>
                <select class="form-control" id="society_community_risk_status" name="society_community_risk_status">
                    <option value="" disabled selected>Select Status</option>
                    <option value="Direct">Direct</option>
                    <option value="In Direct">Indirect</option>
                    <option value="No">No benefits</option>
                </select>
            </div>
            </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="improve_science_risk_status">What is the potential benefits for improvement in science?</label>
                <select class="form-control" id="improve_science_risk_status" name="improve_science_risk_status">
                    <option value="" disabled selected>Select Status</option>
                    <option value="Direct">Direct</option>
                    <option value="In Direct">Indirect</option>
                    <option value="No">No benefits</option>
                </select>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="describe_benefites_risk">Please describe how the benefits justify the risks </label>
                <textarea class="form-control" id="describe_benefites_risk" name="describe_benefites_risk" placeholder="Enter details*" rows="4" autocomplete="off"></textarea>
            </div>
        </div>


        <div class="col-md-12">
            <div class="form-group">
                <label for="adverse_event_status">Are adverse events expected in the study?</label>
                <select class="form-control" id="adverse_event_status" name="adverse_event_status">
                    <option value="" disabled selected>Select Status</option>
                    <option value="0">Yes</option>
                    <option value="1">No</option>
                </select>
            </div>
        </div>


        <div class="col-md-12">
            <div class="form-group">
                <label for="reporting_procedures_status">Are reporting and management procedures outlined in the study?</label>
                <select class="form-control" id="reporting_procedures_status" name="reporting_procedures_status">
                    <option value="" disabled selected>Select Status</option>
                    <option value="0">Yes</option>
                    <option value="1">No</option>
                </select>
            </div>
        </div>
        <div class="col-md-12" id="reporting_procedures_status_display" style="display:none">
            <div class="form-group">
                <label for="reporting_procedures_stratagies">If Yes, specify strategies</label>
                <textarea class="form-control" id="reporting_procedures_stratagies" name="reporting_procedures_stratagies" placeholder="Enter details*" rows="4" autocomplete="off"></textarea>
            </div>
        </div>
</div>
    

<div id="category_risk_classification">
    <div>
    <img src="./images/risk_category.png" alt=""/>

    </div>

    <button type="button" class="btn btn-primary" onclick="hide_classification_benefit_risk()">Go Back</button>
</div>













<script src="./js/benefitsandrisk.js"></script>
<!-- page 5/////////////////////////////////////////////////////////////////////////////////////////// -->

<style>
#category_privacy
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

<h2 class="text-center">INFORMED CONSENT</h2>

<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <label>Type of consent planned for</label>
        <div class="row">
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="consent_type[]" id="signed_consent_status" value="signed_consent"> Signed consent
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="consent_type[]" value="verbal_oral_consent"> Verbal/Oral consent
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="consent_type[]" value="waiver_of_consent"> Waiver of consent
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="consent_type[]" value="witnessed_consent"> Witnessed consent
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="consent_type[]" id="lar_status" value="consent_from_lar"> Consent from LAR
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="consent_type[]" value="audio_video"> Audio-Video (AV)
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="consent_type[]" value="parental_lar_consent"> For children<7 yrs parental/LAR consent
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="consent_type[]" value="not_applicable"> Not Applicable
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-md-12" id="lar_display" style="display:none">
        <div class="form-group">
            <label for="specify_lar">If you are taking Consent from Legally Authorised Representative (LAR), please specify</label>
             <textarea class="form-control" id="specify_lar" name="specify_lar" placeholder="Enter details*" rows="4" autocomplete="off"></textarea>
        </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="consent_obtain">Who will obtain the informed consent?</label>
        <select class="form-control" id="consent_obtain" name="consent_obtain">
            <option value="" disabled selected>Select Status</option>
            <option value="PI/Co-PI">PI/Co-PI</option>
            <option value="Nurse/Counselor">Nurse/Counselor</option>
            <option value="Research Staff">Research Staff</option>
            <option value="Other">Other</option>
            <option value="Not Applicable">Not Applicable</option>
        </select>
    </div>
</div>


<div class="col-md-6" id="consent_obtain_other_display" style="display:none">
    <div class="form-group">
        <label for="consent_obtain_other">Uplaod the signed concent form</label>
        <input type="file" class="form-control" id="consent_obtain_other_upload" name="consent_obtain_other_upload" >
    </div>
</div>
<div class="col-md-6" id="signed_concent_obtain_other_display" style="display:none">
    <div class="form-group">
        <label for="consent_obtain_other">If “other” please specify,</label>
        <input type="text" class="form-control" id="consent_obtain_other" name="consent_obtain_other" placeholder="Please specify*" autocomplete="off">
    </div>
</div>


<div class="col-md-6">
    <div class="form-group">
            <label for="translation_status">Is the PIS and ICF translated into the local language?</label>
                <select class="form-control" id="translation_status" name="translation_status">
                    <option value="" disabled selected>Select Status</option>
                    <option value="0">Yes</option>
                    <option value="1">No</option>
                </select>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
            <label for="waiver_status">Are you seeking waiver of consent?</label>
                <select class="form-control" id="waiver_status" name="waiver_status">
                    <option value="" disabled selected>Select Status</option>
                    <option value="0">Yes</option>
                    <option value="1">No</option>
                </select>
    </div>
</div>

<div class="col-md-12" id="waiver_status_yes_display">
    <div class="form-group">
        <label for="waiver_status_yes">If yes, what are the reasons</label>
        <div style="display: flex; flex-direction: column; gap: 10px;">
            <div>
                <input type="checkbox" id="reason1" name="waiver_reason[]" value="practical">
                <label for="reason1">The research is impractical without the waiver, which is scientifically justified by the committee.</label>
            </div>

            <div>
                <input type="checkbox" id="reason2" name="waiver_reason[]" value="retrospective">
                <label for="reason2">As this research is a retrospective studies, where the participants are de-identified or cannot be contacted;</label>
            </div>

            <div>
                <input type="checkbox" id="reason3" name="waiver_reason[]" value="biological">
                <label for="reason3">As this research is on research on anonymized biological samples/data.</label>
            </div>

            <div>
                <input type="checkbox" id="reason4" name="waiver_reason[]" value="public_health">
                <label for="reason4">As the proposed research is a kind of certain types of public health studies/surveillance programmes/programme evaluation studies.</label>
            </div>

            <div>
                <input type="checkbox" id="reason5" name="waiver_reason[]" value="public_domain">
                <label for="reason5">As the data for the proposed research is already present in the public domain.</label>
            </div>

            <div>
                <input type="checkbox" id="reason6" name="waiver_reason[]" value="humanitarian">
                <label for="reason6">Proposed research is counduted during humanitarian emergencies and disasters, wherein participant may not be in</label>
            </div>
        </div>
    </div>
</div>


<div class="col-md-6">
    <div class="form-group">
            <label for="stored_status">Specify the privacy category of stored materials.<small><button type="button" class="more_info_class" onclick="display_box()">show more</button></small></label>
                <select class="form-control" id="stored_status" name="stored_status">
                    <option value="" disabled selected>Select Status</option>
                    <option value="Anonymous or unidentified data">Anonymous or unidentified data</option>
                    <option value="Anonymized - Coded or reversibly anonymized:">Anonymized - Coded or reversibly anonymized:</option>
                    <option value="Anonymized- Irreversibly anonymized">Anonymized- Irreversibly anonymized</option>
                    <option value="Identifiable">Identifiable</option>
                </select>
    </div>
</div>


<div id="category_privacy">
    <div>
    <img src="./images/boxg1.png" alt=""/>

    </div>

    <button type="button" class="btn btn-primary" onclick="hide_box()">Go Back</button>
</div>


</div>


<script src="./js/informed_concent.js"></script>
<!-- page 6////////////////////////////////////////////////////////////////////////////////////////////////// -->


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
        <h2 class="text-center mb-0 flex-grow-1">PAYMENT AND COMPENSATION</h2>
        <small>
            <button type="button" class="more_info_class btn btn-link p-0" onclick="display_guideline()">Refer the guideline</button>
        </small>
    </div>

    <div class="row mt-3">
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
                                <input type="number" class="form-control" id="who_provide_treatment" name="who_provide_treatment" placeholder="Enter who" >
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
                <input type="number" class="form-control" id="causality_treatment_specify" name="causality_treatment_specify" placeholder="please specify" > 
            </div>
        </div>



<div id="compenstion_classification">
    <div>
    <img src="./images/compensation.png" alt=""/>

    </div>

    <button type="button" class="btn btn-primary" onclick="hide_classification()">Go Back</button>
</div>



        </div>

                 

    <!-- page 7////////////////////////////////////////////////////////////////////// -->

    <h2 class="text-center" id="storage_id" style="display:none">STORAGE AND CONFIDENTIALITY</h2>
                    <div class="row" id="storage_display" style="display:none">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type_sample">Specify the sample type used in the research.</label>
                                        <select class="form-control" id="type_sample" name="type_sample">
                                            <option value="" disabled selected>Select type</option>
                                            <option value="0">Anonymous orunidentified</option>
                                            <option value="1">Coded or reversibly anonymized</option>
                                            <option value="2">Irreversibly anonymized</option>
                                            <option value="3">Identifiable</option>
                                        </select>
                                    </div>
                                </div>

                        <div class="col-md-12" id="type_sample_container_display" style="display:none">
                            <div class="form-group">
                                <label for="ext_agency_type">Describe the additional precautions to ensure data security </label>
                                <textarea class="form-control" id="type_sample_container" name="type_sample_container" placeholder="Enter external agency*" rows="4" autocomplete="off"></textarea>
                        </div>

                        </div>


                        </div>

                        <h2 class="text-center" >DATA MANAGEMENT</h2>

                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sample_handle">Who will maintain the study sample/data?</label>
                                <input type="text" class="form-control" id="sample_handle" name="sample_handle" placeholder="Enter who*" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="where_sample_handle">Where will the data be analyzed, and by whom?</label>
                                <input type="text" class="form-control" id="where_sample_handle" name="where_sample_handle" placeholder="Enter where*" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="long_sample_handle">For how long will the data be stored?</label>
                                <input type="text" class="form-control" id="long_sample_handle" name="long_sample_handle" placeholder="Enter how long*" autocomplete="off">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="propose_status">Do you propose to use stored samples/data in future studies?</label>
                                <select class="form-control" id="propose_status" name="propose_status">
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="0">Yes</option>
                                    <option value="1">No</option>
                                </select>       
                            </div>
                        </div>


                        <div class="col-md-6" id="propose_status_specify_display" style="display:none">
                            <div class="form-group">
                                <label for="propose_status_specify">Explain how you plan to use stored material/data in the future</label>
                                <input type="number" class="form-control" id="propose_status_specify" name="propose_status_specify" placeholder="Enter the way*" autocomplete="off">
                            </div>
                        </div>

                        </div>

    <h2 class="text-center">OTHER KEY CONSIDERATIONS RESULTS DISSEMINATION
</h2>

        <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="disseminated_status">Will the results of the study be reported and disseminated?</label>
                                <select class="form-control" id="disseminated_status" name="disseminated_status">
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="0">Yes</option>
                                    <option value="1">No</option>
                                </select>       
                            </div>
                        </div>

                        
                        <div class="col-md-6" id="disseminated_status_display" style="display:none">
                            <div class="form-group">
                                <label for="disseminated_status_specify">Explain how you plan to use stored material/data in the future</label>
                                <input type="text" class="form-control" id="disseminated_status_specify" name="disseminated_status_specify" placeholder="Enter the way*" autocomplete="off">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="study_results_status">Will participants be informed about the study results?</label>
                                <select class="form-control" id="study_results_status" name="study_results_status">
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="0">Yes</option>
                                    <option value="1">No</option>
                                </select>       
                            </div>
                        </div>
        </div>


        <h2 class="text-center">INTELLECTUAL PROPERTY AND COMMERCIAL VALUE
</h2>

        <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="IPR_status">Is there a plan for commercial use or IPR protection?</label>
                                <select class="form-control" id="IPR_status" name="IPR_status">
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="0">Yes</option>
                                    <option value="1">No</option>
                                </select>       
                            </div>
                        </div>

                        
                        <div class="col-md-6" id="IPR_status_display" style="display:none">
                            <div class="form-group">
                                <label for="IPR_status_specify">Provide details</label>
                                <input type="text" class="form-control" id="IPR_status_specify" name="IPR_status_specify" placeholder="Enter the details*" autocomplete="off">
                            </div>
                        </div>



                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="supporting_status">Any additional supporting information?</label>
                                <select class="form-control" id="supporting_status" name="supporting_status">
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="0">Yes</option>
                                    <option value="1">No</option>
                                </select>       
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fee_recipt">Upload fee recipt</label>
                                <input type="file" class="form-control" id="fee_recipt" name="fee_recipt" >
                            </div>
                        </div>


                        <div class="col-md-12" id="supporting_status_display" style="display:none">
                            <div class="form-group">
                                <label for="supporting_status_specify">If Yes, please specify</label>
                                <textarea class="form-control" id="supporting_status_specify" name="supporting_status_specify" placeholder="Enter the information detailed mannner" rows="4" autocomplete="off"></textarea>
                            </div>
                        </div>


                        


        </div>



                        
                        <script>
        // JavaScript code to toggle the visibility of "why_not_compensation"
        document.addEventListener("DOMContentLoaded", function() {
            const Vitro_Vivo_type = document.getElementById("Vitro_Vivo_type");

            const storage_display = document.getElementById("storage_display");
            const storage_id = document.getElementById("storage_id");

            const type_sample = document.getElementById("type_sample");
            const type_sample_container_display = document.getElementById("type_sample_container_display");


            const propose_status = document.getElementById("propose_status");
            const propose_status_specify_display = document.getElementById("propose_status_specify_display");

            const disseminated_status = document.getElementById("disseminated_status");
            const disseminated_status_display = document.getElementById("disseminated_status_display");

            const IPR_status = document.getElementById("IPR_status");
            const IPR_status_display = document.getElementById("IPR_status_display");

            const supporting_status = document.getElementById("supporting_status");
            const supporting_status_display = document.getElementById("supporting_status_display");


            IPR_status.addEventListener("change", function () {
                if (this.value === "0") { // "No" option selected

                    //alert("haii");
                    IPR_status_display.style.display = "block"; // Show the input field

                } else {
                    IPR_status_display.style.display = "none"; // Hide the input field
                }


            });

            supporting_status.addEventListener("change", function () {
                if (this.value === "0") { // "No" option selected

                    //alert("haii");
                    supporting_status_display.style.display = "block"; // Show the input field

                } else {
                    supporting_status_display.style.display = "none"; // Hide the input field
                }


            });




            disseminated_status.addEventListener("change", function () {
                if (this.value === "0") { // "No" option selected

                    //alert("haii");
                    disseminated_status_display.style.display = "block"; // Show the input field

                } else {
                    disseminated_status_display.style.display = "none"; // Hide the input field
                }


            });





            propose_status.addEventListener("change", function () {
                if (this.value === "0") { // "No" option selected

                    //alert("haii");
                    propose_status_specify_display.style.display = "block"; // Show the input field

                } else {
                    propose_status_specify_display.style.display = "none"; // Hide the input field
                }


            });


            




            Vitro_Vivo_type.addEventListener("change", function () {
                if (this.value === "0") { // "No" option selected

                   // alert("haii");
                    storage_display.style.display = "block"; // Show the input field
                     storage_id.style.display = "block"; // Show the input field

                } else {
                     storage_display.style.display = "none"; // Hide the input field
                    storage_id.style.display = "none"; // Show the input field
                }


            });


            
            type_sample.addEventListener("change", function () {
                if (this.value !== "0") { // "No" option selected

                  //  alert("haii");
                    type_sample_container_display.style.display = "block"; // Show the input field

                } else {
                    type_sample_container_display.style.display = "none"; // Hide the input field
                }


            });


            

        });



      
    </script>


    <script>
        // JavaScript code to toggle the visibility of "why_not_compensation"
        document.addEventListener("DOMContentLoaded", function() {
            const compensation_status = document.getElementById("compensation_status");
            const why_not_compensation = document.getElementById("why_not_compensation");


            const who_bear_compensation = document.getElementById("who_bear_compensation");

            const treatment_status_display = document.getElementById("treatment_status_display");




            compensation_status.addEventListener("change", function () {
                if (this.value === "0") { // "No" option selected
                    why_not_compensation.style.display = "block"; // Show the input field
                    treatment_status_display.style.display = "block"; // Show the input field

                } else {
                    why_not_compensation.style.display = "none"; // Hide the input field
                    treatment_status_display.style.display = "none"; // Show the input field
                }


                if (this.value === "1") { // "yes" option selected
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



















































<script>

function go_back_rel()
{
    //alert("haiii");
    document.getElementById('show_more_details_research_type').style.display = 'none';
}


document.addEventListener("DOMContentLoaded", function () {

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



    const scientific_status = document.getElementById("scientific_status");
    const scientific_upload_display = document.getElementById("scientific_upload_display");
    const date_review_display = document.getElementById("date_review_display");


    scientific_status.addEventListener("change", function () {
        if (this.value === "0") {
            scientific_upload_display.style.display = "block"; // Show input field
            date_review_display.style.display = "block"; // Show input field

          // alert("haii");
        } else {
            scientific_upload_display.style.display = "none"; // Hide input field
            date_review_display.style.display = "none"; // Hide input field

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




















<script>
document.addEventListener("DOMContentLoaded", function() {
    const countInput = document.getElementById("count_of_collabotators");
    const tableContainer = document.getElementById("collaborators_table_container");

    countInput.addEventListener("input", function() {
        const count = parseInt(countInput.value, 10);
        tableContainer.innerHTML = ""; 

        if (!isNaN(count) && count > 0) {
            // Create the heading
            let heading = document.createElement("h3");
            heading.innerText = "DETAILS OF RESEARCH COLLABORATORS";
            heading.style.textAlign = "center";  
            tableContainer.appendChild(heading);

            let table = document.createElement("table");
            table.className = "table table-bordered";

            let thead = document.createElement("thead");
            thead.innerHTML = `
                <tr>
                    <th>Name</th>
                    <th>Designation & Qualification</th>
                    <th>Department & Institution</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            `;
            table.appendChild(thead);

            let tbody = document.createElement("tbody");

            for (let i = 0; i < count; i++) {
                let row = document.createElement("tr");
                row.innerHTML = `
                    <td><input type="text" class="form-control" name="collaborator_name_${i}" required></td>
                    <td><input type="text" class="form-control" name="collaborator_designation_${i}" required></td>
                    <td><input type="text" class="form-control" name="collaborator_department_${i}" required></td>
                    <td><input type="email" class="form-control" name="collaborator_address_${i}" required></td>
                    <td>
                        <select class="form-control" name="collaborator_role_${i}">
                            <option value="">Select role</option>
                            <option value="0">Guide</option>
                            <option value="1">Co-investigator</option>
                        </select>
                    </td>
                `;
                tbody.appendChild(row);
            }

            table.appendChild(tbody);
            tableContainer.appendChild(table);
        }
    });
});
                        </script>
<script src="./js/administrative.js"></script>



            










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

        $.ajax({
            url: './db.php', // PHP file to handle upload
            type: 'POST',
            data: formdata,
            contentType: false, // Important: Prevent jQuery from setting content type
            processData: false, // Important: Prevent jQuery from processing data
            success: function(response) {
                alert('Form submitted successfully!\nResponse: ' + response);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                alert('There was an error submitting the form.');
            }
        });
    });
});
</script>
