
    <div class="d-flex align-items-center">
        <h2 class="text-center mb-0 flex-grow-1" id="payment_compensation_id_bag_header">PAYMENT AND COMPENSATION</h2>
       
    </div>

    <div class="row mt-3" id="payment_compensation_id_bag">
        <div class="col-md-6">
            <div class="form-group">
                <label for="compensation_status">Will participants receive any payment or compensation?</label>
                <select class="form-control" id="compensation_status" name="compensation_status">
                    <option value="" disabled selected>Select Status</option>
                    <option value="0"<?php echo ($compensation_data['compensation_status'] === '0') ? 'selected' : ''; ?>>Yes</option>
                    <option value="1"<?php echo ($compensation_data['compensation_status'] === '1') ? 'selected' : ''; ?>>No</option>
                </select>       
            </div>
        </div>

        <div class="col-md-6" id="why_not_compensation" style="display: <?php  echo ($compensation_data['compensation_status'] === '1')  ? 'block' : 'none'; ?>">
            <div class="form-group">
                <label for="compensation_status_why">Why you have no compensation method?</label>
                <select class="form-control" id="compensation_status_why" name="compensation_status_why">
                    <option value="" disabled selected>Select Status</option>
                    <option value="0"<?php echo ($compensation_data['compensation_status_why'] === '0') ? 'selected' : ''; ?>>It is an Invitro study</option>
                    <option value="1"<?php echo ($compensation_data['compensation_status_why'] === '1') ? 'selected' : ''; ?>>Observational Study</option>
                    <option value="2"<?php echo ($compensation_data['compensation_status_why'] === '2') ? 'selected' : ''; ?>>Non Interventional research</option>
                </select>        
            </div>
        </div>


        <div class="col-md-6" id="who_bear_compensation" style="display: <?php  echo ($compensation_data['compensation_status'] === '0')  ? 'block' : 'none'; ?>">
            <div class="form-group">
                <label for="compensation_status_who_bear">Who will bear the costs related to participation and procedures?</label>
                <select class="form-control" id="compensation_status_who_bear" name="compensation_status_who_bear">
                    <option value="" disabled selected>Select Status</option>
                    <option value="0"<?php echo ($compensation_data['compensation_status_who_bear'] === '0') ? 'selected' : ''; ?>>PI</option>
                    <option value="1"<?php echo ($compensation_data['compensation_status_who_bear'] === '1') ? 'selected' : ''; ?>>Institution</option>
                    <option value="2"<?php echo ($compensation_data['compensation_status_who_bear'] === '2') ? 'selected' : ''; ?>>Sponsor</option>
                    <option value="3"<?php echo ($compensation_data['compensation_status_who_bear'] === '3') ? 'selected' : ''; ?>>Other</option>
                </select>        
            </div>
        </div>

        <div class="col-md-6" id="treatment_status_display" style="display: <?php  echo ($compensation_data['compensation_status'] === '0')  ? 'block' : 'none'; ?>">
            <div class="form-group">
                <label for="treatment_status">Is there a provision for free treatment of research related injuries?</label>
                <select class="form-control" id="treatment_status" name="treatment_status">
                    <option value="" disabled selected>Select Status</option>
                    <option value="0"<?php echo ($compensation_data['treatment_status'] === '0') ? 'selected' : ''; ?>>Yes</option>
                    <option value="1"<?php echo ($compensation_data['treatment_status'] === '1') ? 'selected' : ''; ?>>No</option>
                </select>       
            </div>
        </div>
                        <div class="col-md-6" id="who_provide_treatment_display" style="display: <?php  echo ($compensation_data['treatment_status'] === '0')  ? 'block' : 'none'; ?>">
                            <div class="form-group">
                                <label for="who_provide_treatment">who will provide the treatment?</label>
                                <input type="text" class="form-control" id="who_provide_treatment" name="who_provide_treatment" placeholder="Enter who" value="<?php echo $compensation_data['who_provide_treatment']; ?>" >
                            </div>
                        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="compensation_research_SAEs">Who provides compensation for research-related SAEs?
                </label>
                <select class="form-control" id="compensation_research_SAEs" name="compensation_research_SAEs">
                    <option value="" disabled selected>Select Status</option>
                    <option value="0"<?php echo ($compensation_data['compensation_research_SAEs'] === '0') ? 'selected' : ''; ?>>SAEs not applicable</option>
                    <option value="1"<?php echo ($compensation_data['compensation_research_SAEs'] === '1') ? 'selected' : ''; ?>>Sponsor</option>
                    <option value="2"<?php echo ($compensation_data['compensation_research_SAEs'] === '2') ? 'selected' : ''; ?>>Institutional/Corpus fund</option>
                    <option value="3"<?php echo ($compensation_data['compensation_research_SAEs'] === '3') ? 'selected' : ''; ?>>Project grant</option>
                    <option value="4"<?php echo ($compensation_data['compensation_research_SAEs'] === '4') ? 'selected' : ''; ?>>Insurance</option>

                </select>       
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="causality_treatment_specify">Is medical care given for study injuries until causality is confirmed?</label>
                <input type="text" class="form-control" id="causality_treatment_specify" name="causality_treatment_specify" placeholder="please specify" value="<?php echo $compensation_data['causality_treatment_specify']; ?>"> 
            </div>
        </div>






        </div>

                 



