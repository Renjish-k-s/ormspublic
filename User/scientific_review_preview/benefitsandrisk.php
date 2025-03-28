
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

#category_risk_classification_in
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
<h2 class="text-center" id="benefit_risk_header" style="display: <?php echo ($research_related_info['Vitro_Vivo_type'] === '0' && ($research_related_info['stored_status_invitro'] === '1' || $research_related_info['stored_status_invitro']=='3'))  ? 'block' : 'none'; ?>">BENEFITS AND RISKS</h2>

<div class="row" id="benefit_risk" style="display: <?php echo ($research_related_info['Vitro_Vivo_type'] === '0' && ($research_related_info['stored_status_invitro'] === '1' || $research_related_info['stored_status_invitro']=='3'))  ? 'block' : 'none'; ?>">



    <div class="col-md-12">

        <div class="form-group">
            <label for="risk_status">Are there any expected risks or discomforts for participants?</label>
            <select class="form-control" id="risk_status" name="risk_status">
                <option value="" disabled selected>Select Status</option>
                <option value="0"<?php echo ($benefit_risk['risk_status'] === '0') ? 'selected' : ''; ?>>Yes</option>
                <option value="1"<?php echo ($benefit_risk['risk_status'] === '1') ? 'selected' : ''; ?>>No</option>
            </select>
        </div>
        </div>
</div>
    
<div class="row" id="risk_categorize_display"   style="display: <?php echo ($benefit_risk['risk_status'] === '0')  ? 'block' : 'none'; ?>">

        <div class="col-md-12" >
        <div class="form-group">
            <label for="risk_categorize">If yes, categorize the level of risk<small><button type="button" class="more_info_class" onclick="display_classification()">show more</button></small></label>
            <select class="form-control" id="risk_categorize" name="risk_categorize">
                <option value="" disabled selected>Select Status</option>
                <option value="0"<?php echo ($benefit_risk['risk_categorize'] === '0') ? 'selected' : ''; ?>>Less than Minimal Risk</option>
                <option value="1"<?php echo ($benefit_risk['risk_categorize'] === '1') ? 'selected' : ''; ?>>Minimal Risk</option>
                <option value="2"<?php echo ($benefit_risk['risk_categorize'] === '2') ? 'selected' : ''; ?>>Minor increase over minimal risk or low risk</option>
                <option value="3"<?php echo ($benefit_risk['risk_categorize'] === '3') ? 'selected' : ''; ?>>More than minimal risk or high risk</option>

            </select>
        </div>
    </div>

    <div class="col-md-12" >
        <div class="form-group">
            <label for="risk_categorize_miti">Describe the risk management strategy</label>
             <textarea class="form-control" id="risk_categorize_miti" name="risk_categorize_miti" placeholder="Enter details*" rows="4" autocomplete="off"><?php echo $benefit_risk['risk_categorize_miti']; ?></textarea>
        </div>
    </div>


    <div class="col-md-12">

        <div class="form-group">
            <label for="benefit_risk_status">What is the potential benefits for participants?</label>
            <select class="form-control" id="benefit_risk_status" name="benefit_risk_status">
                <option value="" disabled selected>Select Status</option>
                <option value="0"<?php echo ($benefit_risk['benefit_risk_status'] === '0') ? 'selected' : ''; ?>>Direct</option>
                <option value="1"<?php echo ($benefit_risk['benefit_risk_status'] === '1') ? 'selected' : ''; ?>>Indirect</option>
                <option value="2"<?php echo ($benefit_risk['benefit_risk_status'] === '2') ? 'selected' : ''; ?>>No benefits</option>
            </select>
        </div>
        </div>


        <div class="col-md-12">
            <div class="form-group">
                <label for="society_community_risk_status">What is the potential benefits for society/community ?</label>
                <select class="form-control" id="society_community_risk_status" name="society_community_risk_status">
                <option value="" disabled selected>Select Status</option>
                <option value="0"<?php echo ($benefit_risk['society_community_risk_status'] === '0') ? 'selected' : ''; ?>>Direct</option>
                <option value="1"<?php echo ($benefit_risk['society_community_risk_status'] === '1') ? 'selected' : ''; ?>>Indirect</option>
                <option value="2"<?php echo ($benefit_risk['society_community_risk_status'] === '2') ? 'selected' : ''; ?>>No benefits</option>
                </select>
            </div>
            </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="improve_science_risk_status">What is the potential benefits for improvement in science?</label>
                <select class="form-control" id="improve_science_risk_status" name="improve_science_risk_status">
                <option value="" disabled selected>Select Status</option>
                <option value="0"<?php echo ($benefit_risk['improve_science_risk_status'] === '0') ? 'selected' : ''; ?>>Direct</option>
                <option value="1"<?php echo ($benefit_risk['improve_science_risk_status'] === '1') ? 'selected' : ''; ?>>Indirect</option>
                <option value="2"<?php echo ($benefit_risk['improve_science_risk_status'] === '2') ? 'selected' : ''; ?>>No benefits</option>
                </select>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="describe_benefites_risk">Please describe how the benefits justify the risks </label>
                <textarea class="form-control" id="describe_benefites_risk" name="describe_benefites_risk" placeholder="Enter details*" rows="4" autocomplete="off"><?php echo $benefit_risk['describe_benefites_risk']; ?></textarea>
            </div>
        </div>


        <div class="col-md-12">
            <div class="form-group">
                <label for="adverse_event_status">Are adverse events expected in the study?</label>
                <select class="form-control" id="adverse_event_status" name="adverse_event_status">
                    <option value="" disabled selected>Select Status</option>
                    <option value="0"<?php echo ($benefit_risk['adverse_event_status'] === '0') ? 'selected' : ''; ?>>Yes</option>
                    <option value="1"<?php echo ($benefit_risk['adverse_event_status'] === '1') ? 'selected' : ''; ?>>No</option>
                </select>
            </div>
        </div>


        <div class="col-md-12">
            <div class="form-group">
                <label for="reporting_procedures_status">Are reporting and management procedures outlined in the study?</label>
                <select class="form-control" id="reporting_procedures_status" name="reporting_procedures_status">
                <option value="" disabled selected>Select Status</option>
                    <option value="0"<?php echo ($benefit_risk['reporting_procedures_status'] === '0') ? 'selected' : ''; ?>>Yes</option>
                    <option value="1"<?php echo ($benefit_risk['reporting_procedures_status'] === '1') ? 'selected' : ''; ?>>No</option>
                </select>
            </div>
        </div>
        <?php if ($benefit_risk['reporting_procedures_status'] === '0') {
            # code...
        ?>
        <div class="col-md-12">
            <div class="form-group">
                <label for="reporting_procedures_stratagies">If Yes, specify strategies</label>
                <textarea class="form-control" id="reporting_procedures_stratagies" name="reporting_procedures_stratagies" placeholder="Enter details*" rows="4" autocomplete="off"><?php echo $benefit_risk['reporting_procedures_stratagies']; ?></textarea>
            </div>
        </div>

        <?php }?>
</div>
    
<div id="category_risk_classification_in">
    <div>
    <img src="./images/risk_category.png" alt=""/>

    </div>

    <button type="button" class="btn btn-primary" onclick="hide_classification_benefit_risk_in()">Go Back</button>
</div>










<script src="./js/benefitsandrisk.js"></script>
