<h2 class="text-center">ETHICAL DETAILS</h2>

<?php

$type = isset($ethics_details['review_type']) ? $ethics_details['review_type'] : null;
$scientific_status = isset($ethics_details['scientific_status']) ? $ethics_details['scientific_status'] : null;
$rev_date = isset($ethics_details['rev_date']) ? $ethics_details['rev_date'] : null;



?>
                    <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="review_type">Type of Ethical Review Requested.<button type="button" class="more_info_class" onclick="show_details(0)"><small>show more</small></button></label>
                                        <select class="form-control" id="review_type" name="review_type">
                                        <option value="" disabled selected>Select the type of review</option>
                                        <option value="0" <?php echo ($type === '0') ? 'selected' : ''; ?>>Exemption from ethical Review</option>
                                        <option value="1" <?php echo ($type === '1') ? 'selected' : ''; ?>>Expedited ethical Review</option>
                                        <option value="2" <?php echo ($type === '2') ? 'selected' : ''; ?>>Full committee review</option>
                                        </select>
                                    </div>
                            </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="scientific_status">scientific review status<i title="Has the current research proposal been reviewed by an Institutional Review Board or a Scientific Review Committee?"> ℹ️</i></label>
                            <select class="form-control" id="scientific_status" name="scientific_status">
                                                <option value="">Select status</option>
                                                <option value="0" <?php echo ($scientific_status === '0') ? 'selected' : ''; ?>>Completed</option>
                                                <option value="1" <?php echo ($scientific_status === '1') ? 'selected' : ''; ?>>Not Completed</option>

                                </select>       
                            </div>
                    </div> 
                     <!-- <div class="col-md-6" id="scientific_upload_display" style="display:none">
                            <div class="form-group">
                                <label for="scientific_upload">If yes please upload the certificate</label>
                                <input class="form-control" id="scientific_upload" name="scientific_upload" type="file"autocomplete="off"/>
                            </div>
                        </div> -->

                      

                        <div class="col-md-6" id="date_review_display" style="<?php echo ($scientific_status == 0) ? 'display:block;' : 'display:none;'; ?>">
                        <div class="form-group">
                                <label for="rev_date">Date of review</label>
                                <input class="form-control" id="rev_date" name="rev_date" type="date" value="<?php echo $rev_date; ?>"autocomplete="off"/>
                            </div>
                        </div>

                        <div id="show_more_details">

<img src="./images/image.png" alt=""/>

<button type="button" class="btn btn-primary" onclick="go_back(0)">Go back</button>
</div>
                    </div>


<script>

const scientific_status = document.getElementById("scientific_status");
    // const scientific_upload_display = document.getElementById("scientific_upload_display");
    const date_review_display = document.getElementById("date_review_display");


    scientific_status.addEventListener("change", function () {
        if (this.value === "0") {
            // scientific_upload_display.style.display = "block"; // Show input field
            date_review_display.style.display = "block"; // Show input field

          // alert("haii");
        } else {
            // scientific_upload_display.style.display = "none"; // Hide input field
            date_review_display.style.display = "none"; // Hide input field

        }
    });
</script>