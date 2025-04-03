

<h2 class="text-center" id="informed_concent_id_bag_header">INFORMED CONSENT</h2>

<div class="row" id="informed_concent_id_bag">
<div class="col-md-12">
    <div class="form-group">
        <label>Type of consent planned for</label>
        <div class="row">
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="consent_type[]" id="signed_consent_status" value="signed_consent" <?php echo in_array("signed_consent", $consent_type) ? 'checked' : ''; ?>> Signed consent
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="consent_type[]" value="verbal_oral_consent" <?php echo in_array("verbal_oral_consent", $consent_type) ? 'checked' : ''; ?>> Verbal/Oral consent
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="consent_type[]" value="waiver_of_consent" <?php echo in_array("waiver_of_consent", $consent_type) ? 'checked' : ''; ?>> Waiver of consent
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="consent_type[]" value="witnessed_consent" <?php echo in_array("witnessed_consent", $consent_type) ? 'checked' : ''; ?>> Witnessed consent
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="consent_type[]" id="lar_status" value="consent_from_lar" <?php echo in_array("consent_from_lar", $consent_type) ? 'checked' : ''; ?>> Consent from Legally Authorized representative
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="consent_type[]" value="audio_video" <?php echo in_array("audio_video", $consent_type) ? 'checked' : ''; ?>> Audio-Video (AV)
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="consent_type[]" value="parental_lar_consent" <?php echo in_array("parental_lar_consent", $consent_type) ? 'checked' : ''; ?>> For children<7 yrs parental/LAR consent
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="consent_type[]" value="not_applicable" <?php echo in_array("not_applicable", $consent_type) ? 'checked' : ''; ?>> Not Applicable
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="col-md-12" id="lar_display" style="display: <?php echo in_array("consent_from_lar", $consent_type) ? 'block' : 'none'; ?>">
        <div class="form-group">
            <label for="specify_lar">If you are taking Consent from Legally Authorised Representative (LAR), please specify</label>
             <textarea class="form-control" id="specify_lar" name="specify_lar" placeholder="Enter details*" rows="4" autocomplete="off"><?php echo $informed_consent['specify_lar'];?></textarea>
        </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="consent_obtain">Who will obtain the informed consent?</label>
        <select class="form-control" id="consent_obtain" name="consent_obtain">
            <option value="" disabled selected>Select Status</option>
            <option value="0"<?php echo ($informed_consent['consent_obtain'] === '0') ? 'selected' : ''; ?>>PI/Co-PI</option>
            <option value="1"<?php echo ($informed_consent['consent_obtain'] === '1') ? 'selected' : ''; ?>>Nurse/Counselor</option>
            <option value="2"<?php echo ($informed_consent['consent_obtain'] === '2') ? 'selected' : ''; ?>>Research Staff</option>
            <option value="3"<?php echo ($informed_consent['consent_obtain'] === '3') ? 'selected' : ''; ?>>Other</option>
            <option value="4"<?php echo ($informed_consent['consent_obtain'] === '4') ? 'selected' : ''; ?>>Not Applicable</option>
        </select>
    </div>
</div>





<div class="col-md-6">
    <div class="form-group">
            <label for="translation_status">Is the PIS and ICF translated into the local language?</label>
                <select class="form-control" id="translation_status" name="translation_status">
                    <option value="" disabled selected>Select Status</option>
                    <option value="0"<?php echo ($informed_consent['translation_status'] === '0') ? 'selected' : ''; ?>>Yes</option>
                    <option value="1"<?php echo ($informed_consent['translation_status'] === '1') ? 'selected' : ''; ?>>No</option>
                </select>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
            <label for="waiver_status">Are you seeking waiver of consent?</label>
                <select class="form-control" id="waiver_status" name="waiver_status">
                    <option value="" disabled selected>Select Status</option>
                    <option value="0"<?php echo ($informed_consent['waiver_status'] === '0') ? 'selected' : ''; ?>>Yes</option>
                    <option value="1"<?php echo ($informed_consent['waiver_status'] === '1') ? 'selected' : ''; ?>>No</option>
                </select>
    </div>
</div>


<div class="col-md-12" id="waiver_status_yes_display" style="display: <?php echo $informed_consent['waiver_status'] === '0' ? 'block' : 'none'; ?>">
    <div class="form-group">
        <label for="waiver_status_yes">If yes, what are the reasons</label>
        <div style="display: flex; flex-direction: column; gap: 10px;">
            <div>
                <input type="checkbox" id="reason1" name="waiver_reason[]" value="practical"  <?php echo in_array("practical", $waiver_reason) ? 'checked' : ''; ?>>
                <label for="reason1">The research is impractical without the waiver, which is scientifically justified by the committee.</label>
            </div>

            <div>
                <input type="checkbox" id="reason2" name="waiver_reason[]" value="retrospective"<?php echo in_array("retrospective", $waiver_reason) ? 'checked' : ''; ?>>
                <label for="reason2">As this research is a retrospective studies, where the participants are de-identified or cannot be contacted;</label>
            </div>

            <div>
                <input type="checkbox" id="reason3" name="waiver_reason[]" value="biological"<?php echo in_array("biological", $waiver_reason) ? 'checked' : ''; ?>>
                <label for="reason3">As this research is on research on anonymized biological samples/data.</label>
            </div>

            <div>
                <input type="checkbox" id="reason4" name="waiver_reason[]" value="public_health"<?php echo in_array("public_health", $waiver_reason) ? 'checked' : ''; ?>>
                <label for="reason4">As the proposed research is a kind of certain types of public health studies/surveillance programmes/programme evaluation studies.</label>
            </div>

            <div>
                <input type="checkbox" id="reason5" name="waiver_reason[]" value="public_domain"<?php echo in_array("public_domain", $waiver_reason) ? 'checked' : ''; ?>>
                <label for="reason5">As the data for the proposed research is already present in the public domain.</label>
            </div>

            <div>
                <input type="checkbox" id="reason6" name="waiver_reason[]" value="humanitarian"<?php echo in_array("humanitarian", $waiver_reason) ? 'checked' : ''; ?>>
                <label for="reason6">Proposed research is counduted during humanitarian emergencies and disasters, wherein participant may not be in</label>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
            <label for="stored_status">Specify the privacy category of stored materials.
            </label>
                <select class="form-control" id="stored_status" name="stored_status">
                    <option value="" disabled selected>Select Status</option>
                    <option value="Anonymous or unidentified data"<?php echo ($informed_consent['stored_status'] === 'Anonymous or unidentified data') ? 'selected' : ''; ?>>Anonymous or unidentified data</option>
                    <option value="Anonymized - Coded or reversibly anonymized:"<?php echo ($informed_consent['stored_status'] === 'Anonymized - Coded or reversibly anonymized:') ? 'selected' : ''; ?>>Anonymized - Coded or reversibly anonymized:</option>
                    <option value="Anonymized- Irreversibly anonymized"<?php echo ($informed_consent['stored_status'] === 'Anonymized- Irreversibly anonymized') ? 'selected' : ''; ?>>Anonymized- Irreversibly anonymized</option>
                    <option value="Identifiable"<?php echo ($informed_consent['stored_status'] === 'Identifiable') ? 'selected' : ''; ?>>Identifiable</option>
                </select>
    </div>
</div>


</div>

