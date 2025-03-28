<h2 class="text-center" id="storage_id" style="display: <?php  echo ($research_related_info['Vitro_Vivo_type'] === '0')  ? 'block' : 'none'; ?>">STORAGE AND CONFIDENTIALITY</h2>


                    <div class="row" id="storage_display" style="display: <?php  echo ($research_related_info['Vitro_Vivo_type'] === '0')  ? 'block' : 'none'; ?>">


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type_sample">Specify the sample type used in the research.</label>
                                        <select class="form-control" id="type_sample" name="type_sample">
                                            <option value="" disabled selected>Select type</option>
                                            <option value="0"<?php echo ($storage_confidentality['type_sample'] === '0') ? 'selected' : ''; ?>>Anonymous orunidentified</option>
                                            <option value="1"<?php echo ($storage_confidentality['type_sample'] === '1') ? 'selected' : ''; ?>>Coded or reversibly anonymized</option>
                                            <option value="2"<?php echo ($storage_confidentality['type_sample'] === '2') ? 'selected' : ''; ?>>Irreversibly anonymized</option>
                                            <option value="3"<?php echo ($storage_confidentality['type_sample'] === '3') ? 'selected' : ''; ?>>Identifiable</option>
                                        </select>
                                    </div>
                                </div>

                        <div class="col-md-12" id="type_sample_container_display" style="display: <?php  echo ($storage_confidentality['type_sample'] !== '0')  ? 'block' : 'none'; ?>">
                            <div class="form-group">
                                <label for="ext_agency_type">Describe the additional precautions to ensure data security </label>
                                <textarea class="form-control" id="type_sample_container" name="type_sample_container" placeholder="Enter external agency*" rows="4" autocomplete="off"><?php echo $storage_confidentality['type_sample_container'];?></textarea>
                        </div>
                        </div>
                        </div>




                        <h2 class="text-center" >DATA MANAGEMENT</h2>

                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sample_handle">Who will maintain the study sample/data?</label>
                                <input type="text" class="form-control" id="sample_handle" name="sample_handle" placeholder="Enter who*" value="<?php echo $storage_confidentality['sample_handle'];?>"  autocomplete="off" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="where_sample_handle">Where will the data be analyzed, and by whom?</label>
                                <input type="text" class="form-control" id="where_sample_handle" name="where_sample_handle" placeholder="Enter where*" autocomplete="off" value="<?php echo $storage_confidentality['where_sample_handle'];?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="long_sample_handle">For how long will the data be stored?</label>
                                <input type="text" class="form-control" id="long_sample_handle" name="long_sample_handle" placeholder="Enter how long*" autocomplete="off" value="<?php echo $storage_confidentality['long_sample_handle'];?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="propose_status">Do you propose to use stored samples/data in future studies?</label>
                                <select class="form-control" id="propose_status" name="propose_status">
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="0"<?php echo ($storage_confidentality['propose_status'] === '0') ? 'selected' : ''; ?>>Yes</option>
                                    <option value="1"<?php echo ($storage_confidentality['propose_status'] === '1') ? 'selected' : ''; ?>>No</option>
                                </select>       
                            </div>
                        </div>


                        <div class="col-md-6" id="propose_status_specify_display" style="display: <?php  echo ($storage_confidentality['propose_status'] === '0')  ? 'block' : 'none'; ?>">
                            <div class="form-group">
                                <label for="propose_status_specify">Explain how you plan to use stored material/data in the future</label>
                                <input type="text" class="form-control" id="propose_status_specify" name="propose_status_specify" placeholder="Enter the way*" autocomplete="off" value="<?php echo $storage_confidentality['propose_status_specify'];?>">
                            </div>
                        </div>


                        <div class="col-md-12" >
                            <div class="form-group">
                                <label for="Explain_plan_of_data_analysis">Explain the plan for data analysis</label>
                                <textarea class="form-control" id="Explain_plan_of_data_analysis" name="Explain_plan_of_data_analysis" placeholder="Enter details*" rows="4" autocomplete="off"><?php echo $storage_confidentality['propose_status_specify'];?></textarea>
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
                                    <option value="0"<?php echo ($storage_confidentality['disseminated_status'] === '0') ? 'selected' : ''; ?>>Yes</option>
                                    <option value="1"<?php echo ($storage_confidentality['disseminated_status'] === '1') ? 'selected' : ''; ?>>No</option>
                                </select>       
                            </div>
                        </div>

                        
                        <div class="col-md-6" id="disseminated_status_display" style="display: <?php  echo ($storage_confidentality['disseminated_status'] === '0')  ? 'block' : 'none'; ?>">
                            <div class="form-group">
                                <label for="disseminated_status_specify">Explain how you plan to use stored material/data in the future</label>
                                <input type="text" class="form-control" id="disseminated_status_specify" name="disseminated_status_specify" placeholder="Enter the way*" autocomplete="off"
                                value="<?php echo $storage_confidentality['disseminated_status_specify'];?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="study_results_status">Will participants be informed about the study results?</label>
                                <select class="form-control" id="study_results_status" name="study_results_status">
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="0"<?php echo ($storage_confidentality['study_results_status'] === '0') ? 'selected' : ''; ?>>Yes</option>
                                    <option value="1"<?php echo ($storage_confidentality['study_results_status'] === '1') ? 'selected' : ''; ?>>No</option>
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
                                    <option value="0"<?php echo ($storage_confidentality['IPR_status'] === '0') ? 'selected' : ''; ?>>Yes</option>
                                    <option value="1"<?php echo ($storage_confidentality['IPR_status'] === '1') ? 'selected' : ''; ?>>No</option>
                                </select>       
                            </div>
                        </div>

                        
                        <div class="col-md-6" id="IPR_status_display" style="display: <?php  echo ($storage_confidentality['IPR_status'] === '0')  ? 'block' : 'none'; ?>">
                        <div class="form-group">

                                <label for="IPR_status_specify">Provide details</label>
                                <input type="text" class="form-control" id="IPR_status_specify" name="IPR_status_specify" placeholder="Enter the details*" autocomplete="off" value="<?php echo $storage_confidentality['IPR_status_specify'];?>">
                            </div>
                        </div>



                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="supporting_status">Any additional supporting information?</label>
                                <select class="form-control" id="supporting_status" name="supporting_status">
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="0"<?php echo ($storage_confidentality['supporting_status'] === '0') ? 'selected' : ''; ?>>Yes</option>
                                    <option value="1"<?php echo ($storage_confidentality['supporting_status'] === '1') ? 'selected' : ''; ?>>No</option>
                                </select>       
                            </div>
                        </div>



                       


                        <div class="col-md-12" id="supporting_status_display"  style="display: <?php  echo ($storage_confidentality['supporting_status'] === '0')  ? 'block' : 'none'; ?>">
                            <div class="form-group">
                                <label for="supporting_status_specify">If Yes, please specify</label>
                                <textarea class="form-control" id="supporting_status_specify" name="supporting_status_specify" placeholder="Enter the information detailed mannner" rows="4" autocomplete="off"><?php echo  $storage_confidentality['supporting_status_specify']?></textarea>
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


            const stored_status_invitro_display = document.getElementById("stored_status_invitro_display");



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


                     stored_status_invitro_display.style.display = "block"; // Show the input field


                } else {
                     storage_display.style.display = "none"; // Hide the input field
                    storage_id.style.display = "none"; // Show the input field

                    stored_status_invitro_display.style.display = "none"; // Show the input field

                }


            });


            
            type_sample.addEventListener("change", function () {
                if (this.value !== "0") { // "No" option selected

                   // alert("haii");
                    type_sample_container_display.style.display = "block"; // Show the input field

                } else {
                    type_sample_container_display.style.display = "none"; // Hide the input field
                }


            });


            

        });



      
    </script>
