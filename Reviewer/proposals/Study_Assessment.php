<?php include '../Partials/header.php'; ?>

    <style>
        /* CSS Styles */

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 30px auto;
            background: #fff;
            padding: 20px 40px 40px 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        h1, h2 {
            text-align: center;
        }

        .form-page {
            display: none;
        }

        .form-page.active {
            display: block;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 20px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .checkbox-group,
        .radio-group {
            margin-top: 10px;
        }

        .checkbox-group label,
        .radio-group label {
            font-weight: normal;
            margin-right: 15px;
        }

        .button-group {
            margin-top: 30px;
            overflow: auto;
        }

        .button-group button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .button-group button:hover {
            background-color: #0056b3;
        }

        .button-group button.prev-button {
            float: left;
        }

        .button-group button.next-button {
            float: right;
        }

        .button-group button[type="submit"] {
            float: right;
            background-color: #28a745;
        }

        .button-group button[type="submit"]:hover {
            background-color: #218838;
        }

        .comment-box {
            margin-top: 10px;
        }

        hr {
            margin-top: 30px;
        }

    </style>
</head>


<?php
//$application_id=$_GET['id'];
// $sql="select * from application_table where id='$application_id'";
// $res=mysqli_query($con,$sql);
// $row=mysqli_fetch_array($res);


// $applicant_id=$row['applicant_id'];
// $sql_app_name="select * from user_table_global where id='$applicant_id'";
// $name=mysqli_fetch_array(mysqli_query($con,$sql_app_name));

// $rev_id=$_SESSION['id'];
// $sql_app_rev="select * from user_table_global where id='$rev_id'";
// $name_r=mysqli_fetch_array(mysqli_query($con,$sql_app_rev));

?>
<body>
    <div class="container">
        <form id="studyForm" method="POST" >
            <!-- Page 1 -->
            <div class="form-page active" id="page1">
                <h1>Study Assessment Form</h1>
                <label for="iecNo">IEC NO:</label>
                <input type="text" id="iecNo" name="iecNo" value="IEC/MBDC/<?php// echo $row['commitee_id']."/".$row['application_id']; ?>">

                <label for="date">Date:</label>
                <input type="date" id="date" name="date" value="<?php echo $row['date']?>">

                <label for="protocolTitle">Protocol Title:</label>
                <input type="text" id="protocolTitle" name="protocolTitle" value="<?php echo $row['title']?>">

                <!-- <label for="principalInvestigator">Principal Investigator:</label> -->
                <input type="hidden" id="principalInvestigator" name="principalInvestigator" value="<?php echo $name['holder_name'];?>">

                <!-- <label for="department">Department:</label> -->
                <input type="hidden" id="department" name="department" value="0">

                <!-- <label for="participants">No. of participants:</label> -->
                <input type="hidden" id="participants" name="participants" value="0">

                <!-- <label for="studySites">No. of Study site(s):</label> -->
                <input type="hidden" id="studySites" name="studySites" value="0">
<!-- 
                <label for="duration">Duration of Study:</label> -->
                <input type="hidden" id="duration" name="duration" value="0">
                
                <label>Application:</label>
                <div class="radio-group">
                    <label><input type="radio" name="application" value="new"> New</label>
                    <label><input type="radio" name="application" value="revised"> Revised</label>
                </div>
                
                <div class="button-group">
                    <button type="button" class="next-button">Next</button>
                </div>
                
            </div>

            <!-- Page 2 -->
            <div class="form-page" id="page2">


                <label>Type of Study:</label>
                <div class="checkbox-group">
                    <label><input type="checkbox" name="studyType1" value="1"> Treatment studies / Interventional Studies</label>
                    <label><input type="checkbox" name="studyType2" value="1"> Randomized controlled trial</label>
                    <label><input type="checkbox" name="studyType3" value="1"> Double-blind randomized trial</label>
                    <!-- Add more checkboxes as per the document -->
                </div>

                <label>Review type:</label>
                <div class="radio-group">
                    <label><input type="radio" name="reviewType" value="fullBoard"> Full board</label>
                    <label><input type="radio" name="reviewType" value="expedited"> Expedited</label>
                </div>

                <label>Justification for expedited review:</label>
                <textarea id="justification" name="justification"></textarea>

                <div class="button-group">
                    <button type="button" class="prev-button">Previous</button>
                    <button type="button" class="next-button">Next</button>
                </div>
            </div>

            <!-- Page 3 -->
            <div class="form-page" id="page3">
                <h2>Regulatory Details</h2>

                <label>CTRI Registration:</label>
                <div class="radio-group">
                    <label><input type="radio" name="ctriRegistration" value="applicable"> Applicable</label>
                    <label><input type="radio" name="ctriRegistration" value="notApplicable"> Not Applicable</label>
                </div>

                <label>Academic clinical trial to be notified to DCGI as per GSR 313 (E):</label>
                <div class="radio-group">
                    <label><input type="radio" name="academicTrial" value="yes"> Yes</label>
                    <label><input type="radio" name="academicTrial" value="no"> No</label>
                    <label><input type="radio" name="academicTrial" value="notApplicable">Not Applicable</label>
                </div>

                <label>Does this study require institutional insurance coverage?</label>
                <div class="radio-group">
                    <label><input type="radio" name="insuranceCoverage" value="yes"> Yes</label>
                    <label><input type="radio" name="insuranceCoverage" value="no"> No</label>
                    <label><input type="radio" name="insuranceCoverage" value="na"> NA</label>
                </div>

                <label>Does this study require permission from regulatory authorities?</label>
                <div class="radio-group">
                    <label><input type="radio" name="regulatoryPermission" value="yes" onclick="toggleCheckboxGroup()"> Yes</label>
                    <label><input type="radio" name="regulatoryPermission"  value="no" onclick="toggleCheckboxGroup()"> No</label>
                    <label><input type="radio" name="regulatoryPermission"  value="na" onclick="toggleCheckboxGroup()"> NA</label>
                </div>

                <div  class="checkbox-group" id="checkboxGroup" style="display:none;">
                    <label><input type="checkbox" name="permissionFrom1" value="1"> DCGI</label>
                    <label><input type="checkbox" name="permissionFrom2" value="1"> ICMR</label>
                    <label><input type="checkbox" name="permissionFrom3" value="1"> Other government departments / agencies</label>
                </div>

                <div class="button-group">
                    <button type="button" class="prev-button">Previous</button>
                    <button type="button" class="next-button">Next</button>
                </div>
            </div>

            <!-- Page 4 -->
            <div class="form-page" id="page4">
                <h2>Human Biological Material/Data</h2>

                <label>Are human biological material/data sent abroad?</label>
                <div class="radio-group">
                    <label><input type="radio" name="materialSentAbroad"  onclick="toggleCheckboxGroup1()" value="yes"> Yes</label>
                    <label><input type="radio" name="materialSentAbroad" onclick="toggleCheckboxGroup1()" value="no"> No</label>
                    <label><input type="radio" name="materialSentAbroad" onclick="toggleCheckboxGroup1()" value="not_applicable"> Not Applicable</label>
                </div>

                
                <div class="checkbox-group" id="checkboxGroup1" style="display: none;">
                    <label>If yes, permission required from:</label>
                    <label><input type="checkbox" name="permissionRequired1" value="1"> Health Ministry’s Screening Committee (HMSC)</label>
                    <label><input type="checkbox" name="permissionRequired2" value="1"> Others (please specify)</label>
                    <input type="text" name="otherPermission">
                </div>

                <div class="button-group">
                    <button type="button" class="prev-button">Previous</button>
                    <button type="button" class="next-button">Next</button>
                </div>
            </div>

            <!-- Page 5 -->
            <div class="form-page" id="page5">
                <h2>Assessment Items</h2>

                <!-- Repeat similar structure for each assessment item -->
                <label>1. Objectives of the study:</label>
                <div class="radio-group">
                    <label><input type="radio" name="objectivesClear" value="clear"> Clear</label>
                    <label><input type="radio" name="objectivesClear" value="unclear"> Unclear</label>
                </div>
                <div class="comment-box">
                    <label>What should be improved?</label>
                    <textarea name="objectivesComments"></textarea>
                </div>

                <!-- Continue adding assessment items 2, 3, 4a, 4b, etc. -->
                <label>2. Need for human participants:</label>
                <div class="radio-group">
                    <label><input type="radio" name="needForHumaParticipants" value="yes"> Yes</label>
                    <label><input type="radio" name="needForHumaParticipants" value="no"> No</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="needForHumaParticipantsComments"></textarea>
                </div>

                <label>3. Methodology:      </label>
                <div class="radio-group">
                    <label><input type="radio" name="MethodologyClear" value="clear"> Clear</label>
                    <label><input type="radio" name="MethodologyClear" value="unclear"> Unclear</label>
                </div>
                <div class="comment-box">
                    <label>What should be improved?</label>
                    <textarea name="MethodologyComments"></textarea>
                </div>


                <label>4a. Background information and data  </label>
                <div class="radio-group">
                    <label><input type="radio" name="BackgroundInformationDataSufficient" value="sufficient">Sufficient</label>
                    <label><input type="radio" name="BackgroundInformationDataSufficient" value="InSufficient">Insufficient</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="BackgroundInformationData"></textarea>
                </div>

                <label>4b. Risks and benefits assessment          </label>
                <div class="radio-group">
                    <label><input type="radio" name="RisksBenefitsAssessmentAcceptable" value="acceptable">Acceptable</label>
                    <label><input type="radio" name="RisksBenefitsAssessmentAcceptable" value="unacceptable">Unacceptable</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="RisksBenefitsAssessmentComments"></textarea>
                </div>

                <label>4c. Inclusion criteria </label>
                <div class="radio-group">
                    <label><input type="radio" name="InclusionCriteriaAppropriate" value="appropriate">Appropriate</label>
                    <label><input type="radio" name="InclusionCriteriaAppropriate" value="inappropriate">inappropriate</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="InclusionCriteriaAppropriateComments"></textarea>
                </div>

                <label>4d. Exclusion criteria       </label>
                <div class="radio-group">
                    <label><input type="radio" name="ExclusionCriteriaAppropriate" value="appropriate">Appropriate</label>
                    <label><input type="radio" name="ExclusionCriteriaAppropriate" value="inappropriate">inappropriate</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="ExclusionCriteriaAppropriateComments"></textarea>
                </div>

                <label>4e. Discontinuation and withdrawal Criteria    </label>
                <div class="radio-group">
                    <label><input type="radio" name="discontinuationWithdrawalCriteriaAppropriate" value="appropriate">Appropriate</label>
                    <label><input type="radio" name="discontinuationWithdrawalCriteriaAppropriate" value="inappropriate">inappropriate</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="discontinuationWithdrawalCriteriaComments"></textarea>
                </div>

                

                <div class="button-group">
                    <button type="button" class="prev-button">Previous</button>
                    <button type="button" class="next-button">Next</button>
                </div>
            </div>


            <!-- Page 5 -->
            <div class="form-page" id="page6">
                

                <!-- Repeat similar structure for each assessment item -->
                <label>5. Involvement of vulnerable participants:</label>
                <div class="radio-group">
                    <label><input type="radio" name="InvolvementVulnerableParticipantsYes" value="yes">Yes</label>
                    <label><input type="radio" name="InvolvementVulnerableParticipantsYes" value="no">No</label>
                </div>
                <div class="comment-box">
                    <label>Comment</label>
                    <textarea name="InvolvementVulnerableParticipantsComment"></textarea>
                </div>

                <!-- Continue adding assessment items 2, 3, 4a, 4b, etc. -->
                <label>6.Voluntary, non-coercive recruitment of participants:</label>
                <div class="radio-group">
                    <label><input type="radio" name="VoluntaryParticipantsYes" value="yes"> Yes</label>
                    <label><input type="radio" name="VoluntaryParticipantsYes" value="no"> No</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="VoluntaryParticipantsComments"></textarea>
                </div>

                <label>7. Sufficient number of participants?      </label>
                <div class="radio-group">
                    <label><input type="radio" name="SufficientNoParticipantsYes" value="yes"> Yes</label>
                    <label><input type="radio" name="SufficientNoParticipantsYes" value="no"> No</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="SufficientNoParticipantsComments"></textarea>
                </div>


                <label>8. Control arms (placebo, if any)         </label>
                <div class="radio-group">
                    <label><input type="radio" name="ControlArmsYes" value="yes">Yes</label>
                    <label><input type="radio" name="ControlArmsYes" value="no">No</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="ControlArmsComment"></textarea>
                </div>

                <label>9. Are qualifications and experience of the participating investigators appropriate?     </label>
                <div class="radio-group">
                    <label><input type="radio" name="ParticipatingInvestigatorsAppropriateYes" value="yes">Yes</label>
                    <label><input type="radio" name="ParticipatingInvestigatorsAppropriateYes" value="no">No</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="ParticipatingInvestigatorsAppropriateComments"></textarea>
                </div>

                <label>10. Disclosure or Declaration of potential conflicts of interest </label>
                <div class="radio-group">
                    <label><input type="radio" name="potentialConflictsInterestYes" value="yes">Yes</label>
                    <label><input type="radio" name="potentialConflictsInterestYes" value="no">No</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="potentialConflictsInterestComments"></textarea>
                </div>

                <label>11. Facilities and infrastructure of participating sites       </label>
                <div class="radio-group">
                    <label><input type="radio" name="infrastructureParticipatingAppropriate" value="appropriate">Appropriate</label>
                    <label><input type="radio" name="infrastructureParticipatingAppropriate" value="inappropriate">inappropriate</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="infrastructureParticipatingComments"></textarea>
                </div>

                <label>12. Community consultation:         </label>
                <div class="radio-group">
                    <label><input type="radio" name="CommunityConsultationYes" value="yes">Yes</label>
                    <label><input type="radio" name="CommunityConsultationYes" value="no">No</label>
                    <label><input type="radio" name="CommunityConsultationYes" value="NA">Not Applicable</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="CommunityConsultationComments"></textarea>
                </div>

                

                <div class="button-group">
                    <button type="button" class="prev-button">Previous</button>
                    <button type="button" class="next-button">Next</button>
                </div>
            </div>

            <!-- Page 7 -->
            <div class="form-page" id="page7">
                

                <!-- Repeat similar structure for each assessment item -->
                <label>13.Benefit to local communities:</label>
                <div class="radio-group">
                    <label><input type="radio" name="localCommunitiesYes" value="yes">Yes</label>
                    <label><input type="radio" name="localCommunitiesYes" value="no">No</label>
                </div>
                <div class="comment-box">
                    <label>Comment</label>
                    <textarea name="localCommunitiesComment"></textarea>
                </div>

                <!-- Continue adding assessment items 2, 3, 4a, 4b, etc. -->
                <label>14.Contribution to development of local capacity for research and treatment :</label>
                <div class="radio-group">
                    <label><input type="radio" name="capacityResearchTreatmentYes" value="yes"> Yes</label>
                    <label><input type="radio" name="capacityResearchTreatmentYes" value="no"> No</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="capacityResearchTreatmentComment"></textarea>
                </div>

                <label>15. Availability of similar Study /results:       </label>
                <div class="radio-group">
                    <label><input type="radio" name="AvailabilitySimilarStudyYes" value="yes"> Yes</label>
                    <label><input type="radio" name="AvailabilitySimilarStudyYes" value="no"> No</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="AvailabilitySimilarStudyComments"></textarea>
                </div>


                <label>16. Are blood/tissue samples sent abroad?          </label>
                <div class="radio-group">
                    <label><input type="radio" name="bloodSamplesYes" value="yes">Yes</label>
                    <label><input type="radio" name="bloodSamplesYes" value="no">No</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="bloodSamplesComment"></textarea>
                </div>

                <label>17.Has the PI applied for waiver of consent        </label>
                <div class="radio-group">
                    <label><input type="radio" name="PIAppliedYes" value="yes">Yes</label>
                    <label><input type="radio" name="PIAppliedYes" value="no">No</label>
                    <label><input type="radio" name="PIAppliedYes" value="NA">Not Applicable</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="PIAppliedComments"></textarea>
                </div>

                <label>18. Has the criteria for waiver of informed consent documentation been met</label>
                <div class="radio-group">
                    <label><input type="radio" name="waiverinformedConsentYes" value="yes">Yes</label>
                    <label><input type="radio" name="waiverinformedConsentYes" value="no">No</label>
                    <label><input type="radio" name="waiverinformedConsentYes" value="NA">Not Applicable</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="waiverinformedConsentComments"></textarea>
                </div>

                <label>19. Is the waiver of consent granted?       </label>
                <div class="radio-group">
                <label><input type="radio" name="consentGrantedYes" value="yes">Yes</label>
                    <label><input type="radio" name="consentGrantedYes" value="no">No</label>
                    <label><input type="radio" name="consentGrantedYes" value="NA">Not Applicable</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="consentGrantedComments"></textarea>
                </div>

                <label>20. Are procedures for obtaining Informed Consent appropriate? </label>
                <div class="radio-group">
                    <label><input type="radio" name="procedureInformedConsentYes" value="yes">Yes</label>
                    <label><input type="radio" name="procedureInformedConsentYes" value="no">No</label>
                    
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="procedureInformedConsentComments"></textarea>
                </div>

                

                <div class="button-group">
                    <button type="button" class="prev-button">Previous</button>
                    <button type="button" class="next-button">Next</button>
                </div>
            </div>

            <!-- Page 8 -->
            <div class="form-page" id="page8">
                

                <!-- Repeat similar structure for each assessment item -->
                <label>21.Contents of the Informed Consent Document:</label>
                <div class="radio-group">
                    <label><input type="radio" name="InformedConsentYes" value="yes">Clear</label>
                    <label><input type="radio" name="InformedConsentYes" value="no">Unclear</label>
                </div>
                <div class="comment-box">
                    <label>Comment</label>
                    <textarea name="InformedConsentComment"></textarea>
                </div>

                <!-- Continue adding assessment items 2, 3, 4a, 4b, etc. -->
                <label>22.Participant information sheet</label>
                <div class="radio-group">
                    <label><input type="radio" name="ParticipantInformationYes" value="adequate"> Adequate</label>
                    <label><input type="radio" name="ParticipantInformationYes" value="inadequate">Inadequate</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="ParticipantInformationComments"></textarea>
                </div>

                <label>23. Language of the Informed Consent Document      </label>
                <div class="radio-group">
                    <label><input type="radio" name="LanguageInformedConsentYes" value="clear"> clear</label>
                    <label><input type="radio" name="LanguageInformedConsentYes" value="unclear">unclear</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="LanguageInformedConsentComments"></textarea>
                </div>


                <label>24. Contact persons for participants          </label>
                <div class="radio-group">
                    <label><input type="radio" name="ContactPersonsParticipantsYes" value="yes">Yes</label>
                    <label><input type="radio" name="ContactPersonsParticipantsYes" value="no">No</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="ContactPersonsParticipantsComment"></textarea>
                </div>

                <label>25.Privacy & Confidentiality    </label>
                <div class="radio-group">
                    <label><input type="radio" name="PrivacyConfidentialityYes" value="yes">Yes</label>
                    <label><input type="radio" name="PrivacyConfidentialityYes" value="no">No</label>
                    
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="PrivacyConfidentialityComments"></textarea>
                </div>

                <label>26.Inducement for participation</label>
                <div class="radio-group">
                    <label><input type="radio" name="InducementParticipationYes" value="unlikely">Unlikely</label>
                    <label><input type="radio" name="InducementParticipationYes" value="Likely">Likely</label>
                    
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="InducementParticipationComments"></textarea>
                </div>

                <label>27. Provision for Compensation for participation </label>
                <div class="radio-group">
                    <label><input type="radio" name="ProvisionCompensationParticipationYes" value="yes">Yes</label>
                    <label><input type="radio" name="ProvisionCompensationParticipationYes" value="no">No</label>
                    <label><input type="radio" name="ProvisionCompensationParticipationYes" value="NA">Not Applicable</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="ProvisionCompensationParticipationComments"></textarea>
                </div>

                <label>28. Provision for Treatment for study-related injuries</label>
                <div class="radio-group">
                    <label><input type="radio" name="ProvisionTreatmentInjuriesYes" value="Appropriate">Appropriate</label>
                    <label><input type="radio" name="ProvisionTreatmentInjuriesYes" value="Inappropriate">Inappropriate</label>
                    <label><input type="radio" name="ProvisionTreatmentInjuriesYes" value="NA">Not Applicable</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="ProvisionTreatmentInjuriesYescomment"></textarea>
                </div>

                

                <div class="button-group">
                    <button type="button" class="prev-button">Previous</button>
                    <button type="button" class="next-button">Next</button>
                </div>
            </div>

            <!-- Page 6 -->
            <div class="form-page" id="page6">
                <h2>Risk Assessment</h2>

                <label>29. Risk Categorization:</label>
                <div class="radio-group">
                    <label><input type="radio" name="riskCategory" value="lessMinimal"> Less than minimal risk</label>
                    <label><input type="radio" name="riskCategory" value="minimal"> Minimal risk</label>
                    <label><input type="radio" name="riskCategory" value="minorIncrease"> Minor increase over minimal risk or Low risk</label>
                    <label><input type="radio" name="riskCategory" value="moreThanMinimal"> More than minimal risk or High risk</label>
                </div>

                <label>30. Provision for Compensation for study related injuries:</label>
                <div class="radio-group">
                <label><input type="radio" name="ProvisionCompensationStudyYes" value="Appropriate">Appropriate</label>
                    <label><input type="radio" name="ProvisionCompensationStudyYes" value="Inappropriate">Inappropriate</label>
                    <label><input type="radio" name="ProvisionCompensationStudyYes" value="NA">Not Applicable</label>
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="ProvisionCompensationStudyComments"></textarea>
                </div>

                <label>31.Risks of participation in the study for the participants</label>
                <div class="radio-group">
                    
                    <label style="font-weight: bold;" for="">Individual</label>

                    <label><input type="radio" name="IndividualYes" value="yes">Yes</label>
                    <label><input type="radio" name="IndividualYes" value="no">No</label>


                    <label style="font-weight: bold;" for="">Societal/Community</label>

                    <label><input type="radio" name="Societal_CommunityYes" value="yes">Yes</label>
                    <label><input type="radio" name="Societal_CommunityYes" value="no">No</label>

                    <label style="font-weight: bold;" for="">Is the overall risk/benefit ratio  </label>

                    <label><input type="radio" name="overallRiskRatio" value="acceptable">Acceptable</label>
                    <label><input type="radio" name="overallRiskRatio" value="unacceptable">Unacceptable</label>
                    
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="RisksParticipationComments"></textarea>
                </div>


                <label>32.Benefit                </label>
                <div class="radio-group">
                    
                    <label style="font-weight: bold;">Direct</label>

                    <label><input type="radio" name="DirectYes" value="reasonable">Reasonable</label>
                    <label><input type="radio" name="DirectYes" value="undue">Undue</label>
                    <label><input type="radio" name="DirectYes" value="undue">None</label>

                    <label style="font-weight: bold;" for="">Indirect             </label>

                    <label><input type="radio" name="IndirectYes" value="improvementScience">ImprovementScience</label>
                    <label><input type="radio" name="IndirectYes" value="Any_other_knowledge">Any other knowledge</label>
                    
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="IndirectComments"></textarea>
                </div>

                <!-- Additional risk-related questions -->
                    <label>33. Provisions for monitoring the data to ensure the safety of participants       </label>
                    <div class="radio-group">
                    <label><input type="radio" name="ProvisionsMonitoringYes" value="yes">Yes</label>
                    <label><input type="radio" name="ProvisionsMonitoringYes" value="no">No</label>
                    
                </div>
                <div class="comment-box">
                    <label>Comments:</label>
                    <textarea name="ProvisionsMonitoringComments"></textarea>
                </div>
                <div class="button-group">

                    <button type="button" class="prev-button">Previous</button>
                    <button type="button" class="next-button">Next</button>
                </div>
            </div>

            <!-- Page 7 -->
            <div class="form-page" id="page7">
                <h2>Final Comments and Recommendation</h2>

                <label>Any other remarks / suggestions:</label>
                <textarea name="finalComments"></textarea>

                <label>Recommendation of review:</label>
                <div class="radio-group">
                    <label><input type="radio" name="recommendation" value="approval"> Approval</label>
                    <label><input type="radio" name="recommendation" value="minorRevision"> Minor Revision</label>
                    <label><input type="radio" name="recommendation" value="majorRevision"> Major Revision</label>
                    <label><input type="radio" name="recommendation" value="disapproval"> Disapproval</label>
                </div>

                <label>Reviewer’s name:</label>
                <input type="text" name="reviewerName" value="<?php echo $name_r['holder_name']; ?>">

                <label>Date:</label>
                <input type="text" name="reviewDate" value="<?php echo date('Y-m-d'); ?>">

                <div class="button-group">
                    <button type="button" class="prev-button">Previous</button>
                    <button type="submit" name="StudyAssessmentForm">Submit</button>
                </div>
            </div>

        </form>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const formPages = document.querySelectorAll(".form-page");
            const nextButtons = document.querySelectorAll(".next-button");
            const prevButtons = document.querySelectorAll(".prev-button");
            const form = document.getElementById("studyForm");
            let currentPage = 0;

            showPage(currentPage);

            nextButtons.forEach(button => {
                button.addEventListener("click", () => {
                    if (currentPage < formPages.length - 1) {
                        currentPage++;
                        showPage(currentPage);
                        window.scrollTo(0, 0);
                    }
                });
            });

            prevButtons.forEach(button => {
                button.addEventListener("click", () => {
                    if (currentPage > 0) {
                        currentPage--;
                        showPage(currentPage);
                        window.scrollTo(0, 0);
                    }
                });
            });

            function showPage(pageIndex) {
                formPages.forEach((page, index) => {
                    page.classList.remove("active");
                    if (index === pageIndex) {
                        page.classList.add("active");
                    }
                });
            }

            
        });


        function toggleCheckboxGroup() {
        // Get the selected radio button value
        var selectedValue = document.querySelector('input[name="regulatoryPermission"]:checked').value;

        // Get the checkbox group element
        var checkboxGroup = document.getElementById("checkboxGroup");

        // Show the checkbox group if "yes" is selected, otherwise hide it
        if (selectedValue === "yes") {
            checkboxGroup.style.display = "block";
        } else {
            checkboxGroup.style.display = "none";
        }
    }
    function toggleCheckboxGroup1() {
        // Get the selected radio button value
        var selectedValue = document.querySelector('input[name="materialSentAbroad"]:checked').value;

        // Get the checkbox group element
        var checkboxGroup = document.getElementById("checkboxGroup1");

        // Show the checkbox group if "yes" is selected, otherwise hide it
        if (selectedValue === "yes") {
            checkboxGroup.style.display = "block";
        } else {
            checkboxGroup.style.display = "none";
        }
    }
   
    </script>


<?php 
        if (isset($_POST['StudyAssessmentForm'])){

            

           // Retrieve POST data and sanitize inputs
    $iecNo =$application_id;
    $date = $_POST['date'];
    $protocolTitle = $_POST['protocolTitle'];
    $principalInvestigator = $_POST['principalInvestigator'];
    $department = $_POST['department'];
    $participants = $_POST['participants'];
    $studySites = $_POST['studySites'];
    $duration = $_POST['duration'];
    $application = $_POST['application'];
    $studyType1 = isset($_POST['studyType1']) ? $_POST['studyType1'] : 0;
    $studyType2 = isset($_POST['studyType2']) ? $_POST['studyType2'] : 0;
    $studyType3 = isset($_POST['studyType3']) ? $_POST['studyType3'] : 0;
    $reviewType = $_POST['reviewType'];
    $justification = $_POST['justification'];
    $ctriRegistration = $_POST['ctriRegistration'];
    $academicTrial = $_POST['academicTrial'];
    $insuranceCoverage = $_POST['insuranceCoverage'];
    $regulatoryPermission = $_POST['regulatoryPermission'];
    $permissionFrom1 = isset($_POST['permissionFrom1']) ? $_POST['permissionFrom1'] : 0;
    $permissionFrom2 = isset($_POST['permissionFrom2']) ? $_POST['permissionFrom2'] : 0;
    $permissionFrom3 = isset($_POST['permissionFrom3']) ? $_POST['permissionFrom3'] : 0;
    $materialSentAbroad = $_POST['materialSentAbroad'];
    $permissionRequired1 = isset($_POST['permissionRequired1']) ? $_POST['permissionRequired1'] : 0;
    $permissionRequired2 = isset($_POST['permissionRequired2']) ? $_POST['permissionRequired2'] : 0;
    $otherPermission = isset($_POST['otherPermission']) ? $_POST['otherPermission'] : 0;
    $objectivesClear = $_POST['objectivesClear'];
    $objectivesComments = $_POST['objectivesComments'];
    $needForHumaParticipants = $_POST['needForHumaParticipants'];
    $needForHumaParticipantsComments = $_POST['needForHumaParticipantsComments'];
    $MethodologyClear = $_POST['MethodologyClear'];
    $MethodologyComments = $_POST['MethodologyComments'];
    $BackgroundInformationDataSufficient = $_POST['BackgroundInformationDataSufficient'];
    $BackgroundInformationData = $_POST['BackgroundInformationData'];
    $RisksBenefitsAssessmentAcceptable = $_POST['RisksBenefitsAssessmentAcceptable'];
    $RisksBenefitsAssessmentComments = $_POST['RisksBenefitsAssessmentComments'];
    $InclusionCriteriaAppropriate = $_POST['InclusionCriteriaAppropriate'];
    $InclusionCriteriaAppropriateComments = $_POST['InclusionCriteriaAppropriateComments'];
    $ExclusionCriteriaAppropriate = $_POST['ExclusionCriteriaAppropriate'];
    $ExclusionCriteriaAppropriateComments = $_POST['ExclusionCriteriaAppropriateComments'];
    $discontinuationWithdrawalCriteriaAppropriate = $_POST['discontinuationWithdrawalCriteriaAppropriate'];
    $discontinuationWithdrawalCriteriaComments = $_POST['discontinuationWithdrawalCriteriaComments'];
    $InvolvementVulnerableParticipantsYes = $_POST['InvolvementVulnerableParticipantsYes'];
    $InvolvementVulnerableParticipantsComment = $_POST['InvolvementVulnerableParticipantsComment'];
    $VoluntaryParticipantsYes = $_POST['VoluntaryParticipantsYes'];
    $VoluntaryParticipantsComments = $_POST['VoluntaryParticipantsComments'];
    $SufficientNoParticipantsYes = $_POST['SufficientNoParticipantsYes'];
    $SufficientNoParticipantsComments = $_POST['SufficientNoParticipantsComments'];
    $ControlArmsYes = $_POST['ControlArmsYes'];
    $ControlArmsComment = $_POST['ControlArmsComment'];
    $ParticipatingInvestigatorsAppropriateYes = $_POST['ParticipatingInvestigatorsAppropriateYes'];
    $ParticipatingInvestigatorsAppropriateComments = $_POST['ParticipatingInvestigatorsAppropriateComments'];
    $potentialConflictsInterestYes = $_POST['potentialConflictsInterestYes'];
    $potentialConflictsInterestComments = $_POST['potentialConflictsInterestComments'];
    $infrastructureParticipatingAppropriate = $_POST['infrastructureParticipatingAppropriate'];
    $infrastructureParticipatingComments = $_POST['infrastructureParticipatingComments'];
    $CommunityConsultationYes = $_POST['CommunityConsultationYes'];
    $CommunityConsultationComments = $_POST['CommunityConsultationComments'];
    $localCommunitiesYes = $_POST['localCommunitiesYes'];
    $localCommunitiesComment = $_POST['localCommunitiesComment'];
    $capacityResearchTreatmentYes = $_POST['capacityResearchTreatmentYes'];
    $capacityResearchTreatmentComment = $_POST['capacityResearchTreatmentComment'];
    $AvailabilitySimilarStudyYes = $_POST['AvailabilitySimilarStudyYes'];
    $AvailabilitySimilarStudyComments = $_POST['AvailabilitySimilarStudyComments'];
    $bloodSamplesYes = $_POST['bloodSamplesYes'];
    $bloodSamplesComment = $_POST['bloodSamplesComment'];
    $PIAppliedYes = $_POST['PIAppliedYes'];
    $PIAppliedComments = $_POST['PIAppliedComments'];
    $waiverinformedConsentYes = $_POST['waiverinformedConsentYes'];
    $waiverinformedConsentComments = $_POST['waiverinformedConsentComments'];
    $consentGrantedYes = $_POST['consentGrantedYes'];
    $consentGrantedComments = $_POST['consentGrantedComments'];
    $procedureInformedConsentYes = $_POST['procedureInformedConsentYes'];
    $procedureInformedConsentComments = $_POST['procedureInformedConsentComments'];
    $InformedConsentYes = $_POST['InformedConsentYes'];
    $InformedConsentComment = $_POST['InformedConsentComment'];
    $ParticipantInformationYes = $_POST['ParticipantInformationYes'];
    $ParticipantInformationComments = $_POST['ParticipantInformationComments'];
    $LanguageInformedConsentYes = $_POST['LanguageInformedConsentYes'];
    $LanguageInformedConsentComments = $_POST['LanguageInformedConsentComments'];
    $ContactPersonsParticipantsYes = $_POST['ContactPersonsParticipantsYes'];
    $ContactPersonsParticipantsComment = $_POST['ContactPersonsParticipantsComment'];
    $PrivacyConfidentialityYes = $_POST['PrivacyConfidentialityYes'];
    $PrivacyConfidentialityComments = $_POST['PrivacyConfidentialityComments'];
    $InducementParticipationYes = $_POST['InducementParticipationYes'];
    $InducementParticipationComments = $_POST['InducementParticipationComments'];
    $ProvisionCompensationParticipationYes = $_POST['ProvisionCompensationParticipationYes'];
    $ProvisionCompensationParticipationComments = $_POST['ProvisionCompensationParticipationComments'];
    $ProvisionTreatmentInjuriesYes = $_POST['ProvisionTreatmentInjuriesYes'];
    $ProvisionTreatmentInjuriesYescomment = $_POST['ProvisionTreatmentInjuriesYescomment'];
    $riskCategory = $_POST['riskCategory'];
    $ProvisionCompensationStudyYes = $_POST['ProvisionCompensationStudyYes'];
    $ProvisionCompensationStudyComments = $_POST['ProvisionCompensationStudyComments'];
    $IndividualYes = $_POST['IndividualYes'];
    $Societal_CommunityYes = $_POST['Societal_CommunityYes'];
    $overallRiskRatio = $_POST['overallRiskRatio'];
    $RisksParticipationComments = $_POST['RisksParticipationComments'];
    $DirectYes = $_POST['DirectYes'];
    $IndirectYes = $_POST['IndirectYes'];
    $IndirectComments = $_POST['IndirectComments'];
    $ProvisionsMonitoringYes = $_POST['ProvisionsMonitoringYes'];
    $ProvisionsMonitoringComments = $_POST['ProvisionsMonitoringComments'];
    $recommendation = $_POST['recommendation'];
    $reviewerName = $rev_id;
    $reviewDate = $_POST['reviewDate'];

    // Prepare SQL statement to prevent SQL injection
    // Insert query
    $sql = "INSERT INTO `review_table` (
        `iecNo`, `date`, `protocolTitle`, `principalInvestigator`, `department`, 
        `participants`, `studySites`, `duration`, `application`, `studyType1`, 
        `studyType2`, `studyType3`, `reviewType`, `justification`, `ctriRegistration`, 
        `academicTrial`, `insuranceCoverage`, `regulatoryPermission`, `permissionFrom1`, 
        `permissionFrom2`, `permissionFrom3`, `materialSentAbroad`, `permissionRequired1`, 
        `permissionRequired2`, `otherPermission`, `objectivesClear`, `objectivesComments`, 
        `needForHumaParticipants`, `needForHumaParticipantsComments`, `MethodologyClear`, 
        `MethodologyComments`, `BackgroundInformationDataSufficient`, `BackgroundInformationData`, 
        `RisksBenefitsAssessmentAcceptable`, `RisksBenefitsAssessmentComments`, 
        `InclusionCriteriaAppropriate`, `InclusionCriteriaAppropriateComments`, 
        `ExclusionCriteriaAppropriate`, `ExclusionCriteriaAppropriateComments`, 
        `discontinuationWithdrawalCriteriaAppropriate`, `discontinuationWithdrawalCriteriaComments`, 
        `InvolvementVulnerableParticipantsYes`, `InvolvementVulnerableParticipantsComment`, 
        `VoluntaryParticipantsYes`, `VoluntaryParticipantsComments`, `SufficientNoParticipantsYes`, 
        `SufficientNoParticipantsComments`, `ControlArmsYes`, `ControlArmsComment`, 
        `ParticipatingInvestigatorsAppropriateYes`, `ParticipatingInvestigatorsAppropriateComments`, 
        `potentialConflictsInterestYes`, `potentialConflictsInterestComments`, 
        `infrastructureParticipatingAppropriate`, `infrastructureParticipatingComments`, 
        `CommunityConsultationYes`, `CommunityConsultationComments`, `localCommunitiesYes`, 
        `localCommunitiesComment`, `capacityResearchTreatmentYes`, `capacityResearchTreatmentComment`, 
        `AvailabilitySimilarStudyYes`, `AvailabilitySimilarStudyComments`, 
        `bloodSamplesYes`, `bloodSamplesComment`, `PIAppliedYes`, `PIAppliedComments`, 
        `waiverinformedConsentYes`, `waiverinformedConsentComments`, `consentGrantedYes`, 
        `consentGrantedComments`, `procedureInformedConsentYes`, `procedureInformedConsentComments`, 
        `InformedConsentYes`, `InformedConsentComment`, `ParticipantInformationYes`, 
        `ParticipantInformationComments`, `LanguageInformedConsentYes`, 
        `LanguageInformedConsentComments`, `ContactPersonsParticipantsYes`, 
        `ContactPersonsParticipantsComment`, `PrivacyConfidentialityYes`, 
        `PrivacyConfidentialityComments`, `InducementParticipationYes`, 
        `InducementParticipationComments`, `ProvisionCompensationParticipationYes`, 
        `ProvisionCompensationParticipationComments`, `ProvisionTreatmentInjuriesYes`, 
        `ProvisionTreatmentInjuriesYescomment`, `riskCategory`, `ProvisionCompensationStudyYes`, 
        `ProvisionCompensationStudyComments`, `IndividualYes`, `Societal_CommunityYes`, 
        `overallRiskRatio`, `RisksParticipationComments`, `DirectYes`, `IndirectYes`, 
        `IndirectComments`, `ProvisionsMonitoringYes`, `ProvisionsMonitoringComments`, 
        `recommendation`, `reviewerName`, `reviewDate`
    ) VALUES (
        '$iecNo', '$date', '$protocolTitle', '$principalInvestigator', '$department', 
        '$participants', '$studySites', '$duration', '$application', '$studyType1', 
        '$studyType2', '$studyType3', '$reviewType', '$justification', '$ctriRegistration', 
        '$academicTrial', '$insuranceCoverage', '$regulatoryPermission', '$permissionFrom1', 
        '$permissionFrom2', '$permissionFrom3', '$materialSentAbroad', '$permissionRequired1', 
        '$permissionRequired2', '$otherPermission', '$objectivesClear', '$objectivesComments', 
        '$needForHumaParticipants', '$needForHumaParticipantsComments', '$MethodologyClear', 
        '$MethodologyComments', '$BackgroundInformationDataSufficient', '$BackgroundInformationData', 
        '$RisksBenefitsAssessmentAcceptable', '$RisksBenefitsAssessmentComments', 
        '$InclusionCriteriaAppropriate', '$InclusionCriteriaAppropriateComments', 
        '$ExclusionCriteriaAppropriate', '$ExclusionCriteriaAppropriateComments', 
        '$discontinuationWithdrawalCriteriaAppropriate', '$discontinuationWithdrawalCriteriaComments', 
        '$InvolvementVulnerableParticipantsYes', '$InvolvementVulnerableParticipantsComment', 
        '$VoluntaryParticipantsYes', '$VoluntaryParticipantsComments', '$SufficientNoParticipantsYes', 
        '$SufficientNoParticipantsComments', '$ControlArmsYes', '$ControlArmsComment', 
        '$ParticipatingInvestigatorsAppropriateYes', '$ParticipatingInvestigatorsAppropriateComments', 
        '$potentialConflictsInterestYes', '$potentialConflictsInterestComments', 
        '$infrastructureParticipatingAppropriate', '$infrastructureParticipatingComments', 
        '$CommunityConsultationYes', '$CommunityConsultationComments', '$localCommunitiesYes', 
        '$localCommunitiesComment', '$capacityResearchTreatmentYes', '$capacityResearchTreatmentComment', 
        '$AvailabilitySimilarStudyYes', '$AvailabilitySimilarStudyComments', 
        '$bloodSamplesYes', '$bloodSamplesComment', '$PIAppliedYes', '$PIAppliedComments', 
        '$waiverinformedConsentYes', '$waiverinformedConsentComments', '$consentGrantedYes', 
        '$consentGrantedComments', '$procedureInformedConsentYes', '$procedureInformedConsentComments', 
        '$InformedConsentYes', '$InformedConsentComment', '$ParticipantInformationYes', 
        '$ParticipantInformationComments', '$LanguageInformedConsentYes', 
        '$LanguageInformedConsentComments', '$ContactPersonsParticipantsYes', 
        '$ContactPersonsParticipantsComment', '$PrivacyConfidentialityYes', 
        '$PrivacyConfidentialityComments', '$InducementParticipationYes', 
        '$InducementParticipationComments', '$ProvisionCompensationParticipationYes', 
        '$ProvisionCompensationParticipationComments', '$ProvisionTreatmentInjuriesYes', 
        '$ProvisionTreatmentInjuriesYescomment', '$riskCategory', '$ProvisionCompensationStudyYes', 
        '$ProvisionCompensationStudyComments', '$IndividualYes', '$Societal_CommunityYes', 
        '$overallRiskRatio', '$RisksParticipationComments', '$DirectYes', '$IndirectYes', 
        '$IndirectComments', '$ProvisionsMonitoringYes', '$ProvisionsMonitoringComments', 
        '$recommendation', '$reviewerName', '$reviewDate'
    )";

    // Execute the query
    if ($con->query($sql) === TRUE) {
        echo "<script>alert('New record created successfully');</script>";

        
    } else {
        echo "<script>alert('some error occured');</script>";

       // echo "Error: " . $sql . "<br>" . $con->error;
    }

    // Close the connection
    $con->close();
}
?>


