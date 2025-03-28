<h2 class="text-center">ETHICAL DETAILS</h2>
                    <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="review_type">Type of Ethical Review Requested.<button type="button" class="more_info_class" onclick="show_details(0)"><small>show more</small></button></label>
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
                            <label for="scientific_status">scientific review status<i title="Has the current research proposal been reviewed by an Institutional Review Board or a Scientific Review Committee?"> ℹ️</i></label>
                            <select class="form-control" id="scientific_status" name="scientific_status">
                                                <option value="">Select status</option>
                                                <option value="0">Completed</option>
                                                <option value="1">Not Completed</option>

                                </select>       
                            </div>
                    </div>  <div class="col-md-6" id="scientific_upload_display" style="display:none">
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

                        <div id="show_more_details">

<img src="./images/image.png" alt=""/>

<button type="button" class="btn btn-primary" onclick="go_back(0)">Go back</button>
</div>
                    </div>


<script>

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
</script>