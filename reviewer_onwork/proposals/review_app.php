
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


?>
    <div class="container">
        <form id="studyForm" method="POST" >
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
