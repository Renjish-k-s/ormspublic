<h2 class="text-center">Documents Upload</h2>

<div class="row">
            <div class="col-md-6" id="ctri_request_display" style="display: <?php echo in_array("aci", $research_type) ? 'block' : 'none'; ?>;">
                 <div class="form-group">
                    <label for="ctri_request_upload">Have you applied to CTRI? If yes, please upload the documents.</label>
                    <input class="form-control" id="ctri_request_upload" name="ctri_request_upload" type="file"autocomplete="off"/>
                    <?php
                    if($documents_files['ctri_request_upload']===null){

                        echo "<small>not uploaded</small>";
                    }
                    else
                    {
                        echo "<a href='../../../uploads/" . $documents_files['ctri_request_upload'] . "' download><small>View Document</small></a>";


                    }
                    ?>
                                        <input type="hidden" name="ctri_request_upload_already" value="<?php echo $documents_files['ctri_request_upload'];?>">

                </div>
            </div>

            <div class="col-md-6">
                            <div class="form-group">
                                <label for="Proposal_pdf_copy">Upload the proposal copy</label>
                                <input type="file" class="form-control" id="Proposal_pdf_copy" name="Proposal_pdf_copy" >                                           
                                    <?php
                                    if($documents_files['Proposal_pdf_copy']===null){

                                        echo "<small>not uploaded</small>";
                                    }
                                    else
                                    {
                                        echo "<a href='../../../uploads/" . $documents_files['Proposal_pdf_copy'] . "' download><small>View Document</small></a>";


                                    }
                                    ?>
                                       <input type="hidden" name="Proposal_pdf_copy_already" value="<?php echo $documents_files['Proposal_pdf_copy'];?>">
                            </div>
                        </div>


                        <div class="col-md-6" id="consent_obtain_other_display" style="display: <?php echo in_array("signed_consent", $consent_type) ? 'block' : 'none'; ?>;">
                            <div class="form-group">
                                <label for="consent_obtain_other">Upload the signed concent form</label>
                                <input type="file" class="form-control" id="consent_obtain_other_upload" name="consent_obtain_other_upload" >
                                <?php
                                    if($documents_files['consentFile']===null){

                                        echo "<small>not uploaded</small>";
                                    }
                                    else
                                    {
                                        echo "<a href='../../../uploads/" . $documents_files['consentFile'] . "' download><small>View Document</small></a>";


                                    }
                                    ?>
                                      <input type="hidden" name="consent_obtain_other_upload_already" value="<?php echo $documents_files['consentFile'];?>">
                            </div>
                        </div>


    <div class="col-md-6" id="out_status_display" style="display: <?phpecho ($research_related_info['out_status'] === '0') ? 'block' : 'none'; ?>;">

        <div class="form-group">
            <label for="MoU_upload">Provide details if samples are outsourced and attach MTA/MoU."</label>
            <input class="form-control" id="MoU_upload" name="MoU_upload" type="file"autocomplete="off"/>
            <?php
                                    if($documents_files['mouFile']===null){

                                        echo "<small>not uploaded</small>";
                                    }
                                    else
                                    {
                                        echo "<a href='../../../uploads/" . $documents_files['mouFile'] . "' download><small>View Document</small></a>";


                                    }
                                    ?>
                                      <input type="hidden" name="MoU_upload_already" value="<?php echo $documents_files['mouFile'];?>">
        </div>
</div>
            </div>

