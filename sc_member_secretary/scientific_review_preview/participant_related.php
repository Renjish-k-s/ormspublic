
<h2 class="text-center" id="partipant_related_information_id_header" style="display: <?php echo ($research_related_info['Vitro_Vivo_type'] === '0' && ($research_related_info['stored_status_invitro'] === '1' || $research_related_info['stored_status_invitro']=='3'))  ? 'block' : 'none'; ?>">PARTICIPANT RELATED INFORMATION</h2>


                    <div class="row" id="partipant_related_information_id" style="display: <?php echo ($research_related_info['Vitro_Vivo_type'] === '0' && ($research_related_info['stored_status_invitro'] === '1' || $research_related_info['stored_status_invitro']=='3'))  ? 'block' : 'none'; ?>">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="type_participant">Type of participants in the study</label>
                                        <select class="form-control" id="type_participant" name="type_participant">
                                            <option value="" disabled selected>Select type</option>
                                            <option value="0"<?php echo ($participant_data['type_participant'] === '0') ? 'selected' : ''; ?>>Healthy Volunteer</option>
                                            <option value="1"<?php echo ($participant_data['type_participant'] === '1') ? 'selected' : ''; ?>>Patient</option>
                                            <option value="2"<?php echo ($participant_data['type_participant'] === '2') ? 'selected' : ''; ?>>Vulnerable persons/ Special groups</option>
                                            <option value="3"<?php echo ($participant_data['type_participant'] === '3') ? 'selected' : ''; ?>>Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12" id="type_participant_other"  style="display: <?php echo ($participant_data['type_participant'] === '3')  ? 'block' : 'none'; ?>">
                                    <div class="form-group">
                                        <label for="short_title">Please specify type of participants</label>
                                        <input type="text" class="form-control" id="other_par_type" name="other_par_type" placeholder="Please specify*" autocomplete="off"  
                                        
                                        value="<?php echo $participant_data['other_par_type'];  ?>">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="responsible_participant">Who will be responsible for recruiting study participants?</label>
                                        <select class="form-control" id="responsible_participant" name="responsible_participant">
                                            <option value="" disabled selected>Select type</option>
                                            <option value="Principal Investigator (PI)"<?php echo ($participant_data['responsible_participant'] === 'Principal Investigator (PI)') ? 'selected' : ''; ?>>Principal Investigator (PI)</option>
                                            <option value="Co-Investigator(s)"<?php echo ($participant_data['responsible_participant'] === 'Co-Investigator(s)') ? 'selected' : ''; ?>>Co-Investigator(s)</option>
                                            <option value="Study Coordinator"<?php echo ($participant_data['responsible_participant'] === 'Study Coordinator') ? 'selected' : ''; ?>>Study Coordinator</option>
                                            <option value="Clinical Research Team"<?php echo ($participant_data['responsible_participant'] === 'Clinical Research Team') ? 'selected' : ''; ?>>Clinical Research Team</option>

                                            <option value="Healthcare Providers or Treating Physicians"<?php echo ($participant_data['responsible_participant'] === 'Healthcare Providers or Treating Physicians') ? 'selected' : ''; ?>>Healthcare Providers or Treating Physicians</option>
                                            <option value="Nursing Staff"<?php echo ($participant_data['responsible_participant'] === 'Nursing Staff') ? 'selected' : ''; ?>>Nursing Staff</option>
                                            <option value="Community Health Workers"<?php echo ($participant_data['responsible_participant'] === 'Community Health Workers') ? 'selected' : ''; ?>>Community Health Workers</option>
                                            <option value="Dedicated Recruitment Team"<?php echo ($participant_data['responsible_participant'] === 'Dedicated Recruitment Team') ? 'selected' : ''; ?>>Dedicated Recruitment Team</option>

                                            <option value="External Recruitment Agency"<?php echo ($participant_data['responsible_participant'] === 'External Recruitment Agency') ? 'selected' : ''; ?>>External Recruitment Agency</option>
                                            <option value="Digital or Online Recruitment Platforms"<?php echo ($participant_data['responsible_participant'] === 'Digital or Online Recruitment Platforms') ? 'selected' : ''; ?>>Digital or Online Recruitment Platforms</option>
                                            <option value="Outreach Specialists"<?php echo ($participant_data['responsible_participant'] === 'Outreach Specialists') ? 'selected' : ''; ?>>Outreach Specialists</option>
                                            <option value="11"<?php echo ($participant_data['responsible_participant'] === '11') ? 'selected' : ''; ?>>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12" id="other_par_type_other"  style="display: <?php echo ($participant_data['responsible_participant'] === '11')  ? 'block' : 'none'; ?>">
                                    <div class="form-group">
                                        <label for="other_par_type_specify">Please specify type of participants</label>
                                        <input type="text" class="form-control" id="other_par_type_specify" name="other_par_type_specify" placeholder="Please specify*" autocomplete="off"   value="<?php echo $participant_data['other_par_type_specify'];  ?>">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="method_recruitment">Method used to recruit study participants.</label>
                                        <select class="form-control" id="method_recruitment" name="method_recruitment">
                                            <option value="" disabled>Select type</option>
                                            <option value="0"<?php echo ($participant_data['method_recruitment'] === '0') ? 'selected' : ''; ?>>Patients visiting hospitals</option>
                                            <option value="1"<?php echo ($participant_data['method_recruitment'] === '1') ? 'selected' : ''; ?>>TV/Radio ads/ Social media/ Institution website</option>
                                            <option value="2"<?php echo ($participant_data['method_recruitment'] === '2') ? 'selected' : ''; ?>>Posters/leaflets/Letters</option>
                                            <option value="3"<?php echo ($participant_data['method_recruitment'] === '3') ? 'selected' : ''; ?>>Telephone</option>
                                            <option value="4"<?php echo ($participant_data['method_recruitment'] === '4') ? 'selected' : ''; ?>>Other</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12" id="other_method_recruitment_display"  style="display: <?php echo ($participant_data['method_recruitment'] === '4')  ? 'block' : 'none'; ?>">
                                    <div class="form-group">
                                        <label for="other_method_recruitment">Please specify method used to recruit</label>
                                        <input type="text" class="form-control" id="other_method_recruitment" name="other_method_recruitment" placeholder="Please specify*" autocomplete="off"  value="<?php echo $participant_data['other_method_recruitment'];  ?>">
                                    </div>
                                </div>


                        
                                <div class="col-md-12" id="vulerable_status_display"  style="display: <?php echo ($participant_data['type_participant'] === '2')  ? 'block' : 'none'; ?>">
                                <div class="form-group">
                                        <label for="other_method_recruitment">Please specify method used to recruit</label>
                                        <select class="form-control" id="vulerable_status_type" name="vulerable_status_type">
                                            <option value="" disabled>Select Status</option>
                                            <option value="0"<?php echo ($participant_data['vulerable_status_type'] === '0') ? 'selected' : ''; ?>>Economically and socially disadvantaged (unemployed individuals, orphans, abandoned  individuals, persons below the poverty line, ethnic minorities, sexual minorities – lesbian/ gay/bisexual and transgender (LGBT), etc.)</option>
                                            <option value="1"<?php echo ($participant_data['vulerable_status_type'] === '1') ? 'selected' : ''; ?>>Expectation of benefits or fear of retaliation in case of refusal to participate which may lead them to give consent.</option>
                                            <option value="2"<?php echo ($participant_data['vulerable_status_type'] === '2') ? 'selected' : ''; ?>> Have diminished autonomy due to dependency or being under a hierarchical system (students,  employees,  subordinates,  defence  services  personnel,  healthcare  workers,institutionalized individuals, under trials and prisoners).</option>
                                            <option value="3"<?php echo ($participant_data['vulerable_status_type'] === '3') ? 'selected' : ''; ?>> Suffering from stigmatizing or rare diseases.</option>
                                            <option value="4"<?php echo ($participant_data['vulerable_status_type'] === '4') ? 'selected' : ''; ?>>  Terminally ill or are in search of new interventions having exhausted all therapies.</option>
                                            <option value="5"<?php echo ($participant_data['vulerable_status_type'] === '5') ? 'selected' : ''; ?>>Afflicted with mental illness and cognitively impaired individuals, differently abled  mentally and physically disabled.</option>
                                            <option value="6"<?php echo ($participant_data['vulerable_status_type'] === '6') ? 'selected' : ''; ?>> Refugees, migrants, homeless, persons or populations in conflict zones, riot areas or disaster situations.</option>
                                            <option value="7"<?php echo ($participant_data['vulerable_status_type'] === '7') ? 'selected' : ''; ?>>Tribals and marginalized communities.</option>
                                            <option value="8"<?php echo ($participant_data['vulerable_status_type'] === '8') ? 'selected' : ''; ?>>Women in special situations (pregnant or lactating women, or those who have poor decision-making powers/poor access to healthcare.)</option>
                                            <option value="9"<?php echo ($participant_data['vulerable_status_type'] === '9') ? 'selected' : ''; ?>> Children (up to 18 years)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12" id="justification_inclusion_display" style="display: <?php echo ($participant_data['type_participant'] === '2')  ? 'block' : 'none'; ?>">
                                    <div class="form-group">
                                        <label for="justification_inclusion">Provide justification for inclusion/exclusion</label>
                                        <textarea class="form-control" id="justification_inclusion" name="justification_inclusion" placeholder="Enter justification*" rows="4" autocomplete="off"><?php echo $participant_data['justification_inclusion'];  ?></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="reimbursement_status">Is there any reimbursement to the participants?          </label>
                                        <select class="form-control" id="reimbursement_status" name="reimbursement_status">
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="0"<?php echo ($participant_data['reimbursement_status'] === '0') ? 'selected' : ''; ?>>Yes</option>
                                            <option value="1"<?php echo ($participant_data['reimbursement_status'] === '1') ? 'selected' : ''; ?>>No</option>
                                        </select>
                                    </div>
                                </div>
                    <div class="col-md-12" id="reimbursement_type_display" style="display: <?php echo ($participant_data['reimbursement_status'] === '0')  ? 'block' : 'none'; ?>">
                                    <div class="form-group">
                                        <label for="reimbursement_type">Type of reimbursement</label>
                                        <select class="form-control" id="reimbursement_type" name="reimbursement_type">
                                            <option value="" disabled>Select Status</option>
                                            <option value="0"<?php echo ($participant_data['reimbursement_type'] === '0') ? 'selected' : ''; ?>>Monetary</option>
                                            <option value="1"<?php echo ($participant_data['reimbursement_type'] === '1') ? 'selected' : ''; ?>>Non-Monetary</option>
                                        </select>
                                    </div>
                                </div>


                <div class="col-md-12" id="justification_Monetary_display" style="display: <?php echo ($participant_data['reimbursement_type'] === '0')  ? 'block' : 'none'; ?>">
                        <div class="form-group">
                                        <label for="justification_Monetary">If Monetary, please specify details</label>
                                        <textarea class="form-control" id="justification_Monetary" name="justification_Monetary" placeholder="Enter details*" rows="4" autocomplete="off"><?php echo $participant_data['justification_Monetary'];  ?></textarea>
                                    </div>
                                </div>




                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="incentives_fee_status">Are there any incentives to the participants?</label>
                                        <select class="form-control" id="incentives_fee_status" name="incentives_fee_status">
                                            <option value="" disabled>Select Status</option>
                                            <option value="0"<?php echo ($participant_data['incentives_fee_status'] === '0') ? 'selected' : ''; ?>>Yes</option>
                                            <option value="1"<?php echo ($participant_data['incentives_fee_status'] === '1') ? 'selected' : ''; ?>>No</option>
                                        </select>
                                    </div>
                                </div>


                        <div class="col-md-12" id="incentives_fee_display" style="display: <?php echo ($participant_data['reimbursement_status'] === '0')  ? 'block' : 'none'; ?>">
                                <div class="form-group">
                                        <label for="incentives_fee_type">Type of incentives</label>
                                        <select class="form-control" id="incentives_fee_type" name="incentives_fee_type">
                                        <option value="" disabled>Select Status</option>
                                            <option value="0"<?php echo ($participant_data['incentives_fee_type'] === '0') ? 'selected' : ''; ?>>Monetary</option>
                                            <option value="1"<?php echo ($participant_data['incentives_fee_type'] === '1') ? 'selected' : ''; ?>>Non-Monetary</option>
                                        </select>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12" id="incentives_fee_Monetary_display" style="display: <?php echo ($participant_data['incentives_fee_type'] === '0')  ? 'block' : 'none'; ?>">
                                <div class="form-group">
                                        <label for="recruitment_fee_Monetary">If Monetary, please specify details   </label>
                                        <textarea class="form-control" id="incentives_fee_Monetary" name="incentives_fee_Monetary" placeholder="Enter details*" rows="4" autocomplete="off"><?php echo $participant_data['incentives_fee_Monetary'];  ?></textarea>
                                    </div>
                                </div>




                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="recruitment_fee_status">Are there any recruitment fees or incentives for the PI or Institution?</label>
                                        <select class="form-control" id="recruitment_fee_status" name="recruitment_fee_status">
                                        <option value="" disabled>Select Status</option>
                                            <option value="0"<?php echo ($participant_data['recruitment_fee_status'] === '0') ? 'selected' : ''; ?>>Yes</option>
                                            <option value="1"<?php echo ($participant_data['recruitment_fee_status'] === '1') ? 'selected' : ''; ?>>No</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-12" id="recruitment_fee_display" style="display: <?php echo ($participant_data['recruitment_fee_status'] === '0')  ? 'block' : 'none'; ?>">
                                    <div class="form-group">
                                        <label for="recruitment_fee_type">Type of incentives</label>
                                        <select class="form-control" id="recruitment_fee_type" name="recruitment_fee_type">
                                        <option value="" disabled>Select Status</option>
                                            <option value="0"<?php echo ($participant_data['recruitment_fee_type'] === '0') ? 'selected' : ''; ?>>Monetary</option>
                                            <option value="1"<?php echo ($participant_data['recruitment_fee_type'] === '1') ? 'selected' : ''; ?>>Non-Monetary</option>
                                        </select>
                                        </select>
                                    </div>
                                </div>
                            

                                <div class="col-md-12" id="recruitment_fee_Monetary_display"   style="display: <?php echo ($participant_data['recruitment_fee_type'] === '0')  ? 'block' : 'none'; ?>">
                                    <div class="form-group">
                                        <label for="recruitment_fee_Monetary">If Monetary, please specify details   </label>
                                        <textarea class="form-control" id="recruitment_fee_Monetary" name="recruitment_fee_Monetary" placeholder="Enter details*" rows="4" autocomplete="off"><?php echo $participant_data['recruitment_fee_Monetary'];  ?></textarea>
                                    </div>
                                </div>

 
                    </div>




<script src="./js/participant_related.js"></script>
