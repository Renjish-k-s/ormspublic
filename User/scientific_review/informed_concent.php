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

<h2 class="text-center" id="informed_concent_id_bag_header">INFORMED CONSENT</h2>

<div class="row" id="informed_concent_id_bag">
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
                        <input type="checkbox" name="consent_type[]" id="lar_status" value="consent_from_lar"> Consent from Legally Authorized representative
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
            <option value="0">PI/Co-PI</option>
            <option value="1">Nurse/Counselor</option>
            <option value="2">Research Staff</option>
            <option value="3">Other</option>
            <option value="4">Not Applicable</option>
        </select>
    </div>
</div>


<div class="col-md-6" id="consent_obtain_other_display" style="display:none">
    <div class="form-group">
        <label for="consent_obtain_other">Upload the signed concent form</label>
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
            <label for="translation_status">Is the PIS and ICF translated into the local language?<i title="PIS stands for Paticipant Information Sheet || ISF stands for Informed Concent Form"> ℹ️</i></label>
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

<div class="col-md-12" id="waiver_status_yes_display" style="display:none">
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
                    <option value="0">Not applicable</option>

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
