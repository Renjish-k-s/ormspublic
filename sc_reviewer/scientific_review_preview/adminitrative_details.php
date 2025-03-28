
            <h2 class="text-center">ADMINISTRATIVE DETAILS</h2>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="titleInput">Title of the Research</label>
                                <input type="text" class="form-control" id="titleInput" name="titleInput" placeholder="Enter research title*" value="<?php echo $administrative_details['titleInput'] ?>"autocomplete="off">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="short_title">Short title of research(if any)</label>
                                <input type="text" class="form-control" id="short_title" name="short_title" placeholder="Enter short title*" value="<?php echo $administrative_details['short_title'] ?>"
                                autocomplete="off">
                            </div>
                         </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="institutionInput">Name of the institution applying for certificate.</label>
                                <select class="form-control" id="institutionInput" name="institutionInput">
                                    <option value="" disabled>Select Name of institution</option>
                                    <option value="0">Mar Baselios Dental College Kothamangalam</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="completion_time">Total expected time for study completion</label>
                                <select class="form-control" id="completion_time" name="completion_time">
                                 
                                    <option value="" >Select the time period</option>
                                    <option value="0" <?php echo ($administrative_details['completion_time'] === '0') ? 'selected' : ''; ?>>less than 1 year</option>
                                    <option value="1" <?php echo ($administrative_details['completion_time'] === '1') ? 'selected' : ''; ?>>13 - 23 months</option>
                                    <option value="2" <?php echo ($administrative_details['completion_time'] === '2') ? 'selected' : ''; ?>>24 - 35 months</option>
                                    <option value="3" <?php echo ($administrative_details['completion_time'] === '3') ? 'selected' : ''; ?>>more than 3 year</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="qualification_gain">What degree will you get after this research?<i title="What academic degree or qualification do you aim to achieve upon the completion of this research and course?"> ℹ️</i></label>
                                <select class="form-control" id="qualification_gain" name="qualification_gain">
                                 
                                    <option value="" disabled selected>Select the qualification</option>
                                    <option value="0"<?php echo ($administrative_details['qualification_gain'] === '0') ? 'selected' : ''; ?>>Doctorate</option>
                                    <option value="1"<?php echo ($administrative_details['qualification_gain'] === '1') ? 'selected' : ''; ?>>MPhil</option>
                                    <option value="2"<?php echo ($administrative_details['qualification_gain'] === '2') ? 'selected' : ''; ?>>Post Graduate</option>
                                    <option value="3"<?php echo ($administrative_details['qualification_gain'] === '3') ? 'selected' : ''; ?>>Graduate</option>
                                    <option value="4"<?php echo ($administrative_details['qualification_gain'] === '4') ? 'selected' : ''; ?>>Not applicable</option>
                                </select>
                            </div>
                        </div>

                        


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="count_of_collabotators">Count of research collaborators.</label>
                                <input type="number" class="form-control" id="count_of_collabotators" 
       name="count_of_collabotators" placeholder="Enter the count*" 
       min="0" max="10" value="<?php echo $administrative_details['count_of_collaborators']; ?>">

                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pre_pi">Number of previous study led by the primary applicant as PI<i title="PI stands for principal investigator"> ℹ️</i></label>
                                <input type="number" class="form-control" id="pre_pi" name="pre_pi" placeholder="Enter count*" value="<?php echo $administrative_details['pre_pi'] ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pre_co">Number of previous study led by the primary applicant as CI<i title="CI stands for coinvestigator"> ℹ️</i></label>
                                <input type="number" class="form-control" id="pre_co" name="pre_co" placeholder="Enter count*" value="<?php echo $administrative_details['pre_co'] ?>" >
                            </div>
                        </div>

                        

                        <div id="collaborators_table_container"></div>


                 


                   

                        </div>
<?php
$query = "SELECT * FROM collaborators where application_id=$id";
$result = $con->query($query);

// Store results in an array
$collaborators = [];
while ($row = $result->fetch_assoc()) {
    $collaborators[] = $row;
}

$con->close();
?>
                        <script>
        document.addEventListener("DOMContentLoaded", function() {
            const countInput = document.getElementById("count_of_collabotators");
            const tableContainer = document.getElementById("collaborators_table_container");

            // Pre-fetched collaborator data from PHP
            let collaborators = <?php echo json_encode($collaborators); ?>;
            
            function generateTable(count) {
                tableContainer.innerHTML = "";

                if (count > 0) {
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
                        let collaborator = collaborators[i] || {}; // Use existing data or empty

                        let row = document.createElement("tr");
                        row.innerHTML = `
                            <td><input type="text" class="form-control" name="collaborator_name_${i}" value="${collaborator.name || ''}" required></td>
                            <td><input type="text" class="form-control" name="collaborator_designation_${i}" value="${collaborator.designation || ''}" required></td>
                            <td><input type="text" class="form-control" name="collaborator_department_${i}" value="${collaborator.department || ''}" required></td>
                            <td><input type="email" class="form-control" name="collaborator_email_${i}" value="${collaborator.email || ''}" required></td>
                            <td>
                                <select class="form-control" name="collaborator_role_${i}">
                                    <option value="">Select role</option>
                                    <option value="0" ${collaborator.role === "0" ? "selected" : ""}>Guide</option>
                                    <option value="1" ${collaborator.role === "1" ? "selected" : ""}>Co-investigator</option>
                                </select>
                            </td>
                        `;
                        tbody.appendChild(row);
                    }

                    table.appendChild(tbody);
                    tableContainer.appendChild(table);
                }
            }

            // Generate table with existing collaborator data
            generateTable(collaborators.length);

            // Change table based on user input
            countInput.addEventListener("input", function() {
                generateTable(parseInt(countInput.value, 10));
            });
        });
    </script>



            






