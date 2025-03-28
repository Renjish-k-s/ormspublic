
            <h2 class="text-center">ADMINISTRATIVE DETAILS</h2>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="titleInput">Title of the Research</label>
                                <input type="text" class="form-control" id="titleInput" name="titleInput" placeholder="Enter research title*" autocomplete="off">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="short_title">Short title of research(if any)</label>
                                <input type="text" class="form-control" id="short_title" name="short_title" placeholder="Enter short title*" autocomplete="off">
                            </div>
                         </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="institutionInput">Name of the institution applying for certificate.</label>
                                <select class="form-control" id="institutionInput" name="institutionInput">
                                    <option value="" disabled selected>Select Name of institution</option>
                                    <option value="0">Mar Baselios Dental College Kothamangalam</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="completion_time">Total expected time for study completion<button type="button" class="more_info_class" onclick="show_details(1)"><small>show more</small></button></label>
                                <select class="form-control" id="completion_time" name="completion_time">
                                 
                                    <option value="" disabled selected>Select the time period</option>
                                    <option value="0">less than 1 year</option>
                                    <option value="1">13 - 23 months</option>
                                    <option value="2">24 - 35 months</option>
                                    <option value="3">more than 3 year</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="qualification_gain">What degree do you aim to earn after this research?<i title="What academic degree or qualification do you aim to achieve upon the completion of this research and course?"> ℹ️</i><button type="button" class="more_info_class" ></button></label>
                                <select class="form-control" id="qualification_gain" name="qualification_gain">
                                 
                                    <option value="" disabled selected>Select the qualification</option>
                                    <option value="0">Doctorate</option>
                                    <option value="1">MPhil</option>
                                    <option value="2">Post Graduate</option>
                                    <option value="3">Graduate</option>
                                    <option value="4">Not applicable</option>
                                </select>
                            </div>
                        </div>

                        


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="count_of_collabotators">Count of research collaborators.<button 
                                type="button" class="more_info_class" onclick="show_details(2)"><small>show more</small></button></label>
                                <input type="number" class="form-control" id="count_of_collabotators" 
       name="count_of_collabotators" placeholder="Enter the count*" 
       min="0" max="10" >

                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pre_pi">Number of previous study led by the primary applicant as PI<i title="PI stands for principal investigator"> ℹ️</i></label>
                                <input type="number" class="form-control" id="pre_pi" name="pre_pi" placeholder="Enter count*" >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pre_co">Number of previous study led by the primary applicant as CI<i title="CI stands for coinvestigator"> ℹ️</i></label>
                                <input type="number" class="form-control" id="pre_co" name="pre_co" placeholder="Enter count*" >
                            </div>
                        </div>

                        

                        <div id="collaborators_table_container"></div>


                 


                        <div id="show_more_details">

                        <img src="./images/image.png" alt=""/>

                        <button type="button" class="btn btn-primary" onclick="go_back(0)">Go back</button>
                        </div>



                        <div id="show_more_details_completiontime">
                            <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 15px;     background-color: #f9f9f9;color:green;">
                                <h4>Instructions:</h4>
                                    <ul>
                                    <p>An annual report on the study's status must be submitted to the commitee</p>
                                    </ul>
                            </div>
    
                             <button type="button" class="btn btn-primary" onclick="go_back(1)">Go back</button>
                        </div>

                        <div id="show_more_detail_collabortors">
                            <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 15px;     background-color: #f9f9f9;color:green;">
                                <h4>Instructions:</h4>
                                    <ul>
                                    <p>Research collaborators include guide and coinvestigators so enter total count</p>
                                    </ul>
                            </div>
    
                             <button type="button" class="btn btn-primary" onclick="go_back(2)">Go back</button>
                        </div>


                        </div>


                        

                        <script>
    document.addEventListener("DOMContentLoaded", function() {
    const countInput = document.getElementById("count_of_collabotators");
    const tableContainer = document.getElementById("collaborators_table_container");

    countInput.addEventListener("input", function() {
        const count = parseInt(countInput.value, 10);
        tableContainer.innerHTML = ""; 

        if (!isNaN(count) && count > 0) {
            // Create the heading
            let heading = document.createElement("h3");
            heading.innerText = "DETAILS OF RESEARCH COLLABORATORS";
            heading.style.textAlign = "center";  
            tableContainer.appendChild(heading);

            let table = document.createElement("table");
            table.className = "table table-bordered";

            let thead = document.createElement("thead");
            thead.innerHTML = `
                <tr>
                    <th>Name</th>
                    <th>Designation & Qualification</th>
                    <th>Department & Institution</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            `;
            table.appendChild(thead);

            let tbody = document.createElement("tbody");

            for (let i = 0; i < count; i++) {
                let row = document.createElement("tr");
                row.innerHTML = `
                    <td><input type="text" class="form-control" name="collaborator_name_${i}" required></td>
                    <td><input type="text" class="form-control" name="collaborator_designation_${i}" required></td>
                    <td><input type="text" class="form-control" name="collaborator_department_${i}" required></td>
                    <td><input type="email" class="form-control" name="collaborator_address_${i}" required></td>
                    <td>
                        <select class="form-control" name="collaborator_role_${i}">
                            <option value="">Select role</option>
                            <option value="0">Guide</option>
                            <option value="1">Co-investigator</option>
                        </select>
                    </td>
                `;
                tbody.appendChild(row);
            }

            table.appendChild(tbody);
            tableContainer.appendChild(table);
        }
    });
});
                        </script>
<script src="./js/administrative.js"></script>



            






