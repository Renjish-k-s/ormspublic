<?php include './Partials/header.php'; ?>
<style>
        
        .container {
            width: 90%;
            max-width: 1000px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            color: #555;
            width: 45%;
        }
        .form-group .value {
            font-style: italic;
            color: #333;
            width: 45%;
            text-align: right;
        }
        .full-row {
            margin-bottom: 15px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .btn_reject {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: red;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<?php
$app_id=$_GET['id'];
//echo $app_id;

$sql_show="SELECT * FROM `application_table` WHERE id = ?";
$stmt_show = $con->prepare($sql_show);

$stmt_show->bind_param("i", $app_id);
$stmt_show->execute();

$result_show = $stmt_show->get_result();
$row_det = $result_show->fetch_assoc();

$stmt_show->close();
?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="container">
        <h2 align="center">Application Preview</h2>
        <br>
        <div class="form-group">
            <label>Title of the Research:</label>
            <div class="value" id="researchTitle"><?php echo $row_det['title']; ?></div>
        </div>
        <div class="form-group">
            <label>Name of the Institution Applying for Certificate:</label>
            <div class="value" id="institutionName"><?php echo $row_det['title']; ?></div>
        </div>
        <div class="form-group">
            <label>Name of the Primary Investigator:</label>
            <div class="value" id="primaryInvestigator"><?php echo $row_holdername['holder_name']; ?></div>
        </div>
        <div class="form-group">
            <label>No. of Co-investigators:</label>
            <div class="value" id="coInvestigators"><?php echo $row_det['no_coinvestigators']; ?></div>
        </div>
        <div class="form-group">
            <label>Type of Review:</label>
            <div class="value" id="reviewType"><?php if($row_det['type_of_review']==1){echo 'Exemption Review';}elseif($row_det['type_of_review']==2){echo 'Expedited Review';}else{echo 'Full Committee Review';} ?></div>
        </div>
        <div class="form-group">
            <label>Type of Study:</label>
            <div class="value" id="reviewType"><?php if($row_det['type_of_study']==0){echo 'Clinical Trials';}else{echo 'Socio-Behavioural and Public Health Research';} ?></div>
        </div>
        <div class="full-row">
            <label>Brief Summary / Lay Summary (Abstract):</label>
            <div class="value" id="summary"><?php echo $row_det['summary']; ?></div>
        </div>

        <!-- documents part -->


        <div class="form-group">
            <label>Application Form for Initial Review</label>
            <?php if (!empty($row_det['initial_review_form'])): ?>
                    <a href="../uploads/2024/<?php echo $row_det['initial_review_form']; ?>" target="_blank">View the file</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>

                
        </div>






        <div class="form-group">
            <label>Protocol</label>
            <?php if (!empty($row_det['protocol'])): ?>
                    <a href="../uploads/2024/<?php echo $row_det['protocol']; ?>" target="_blank">View the file</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>
                
        </div>


        <?php if ($row_det['type_of_review']!=3): ?>
        <div class="form-group">

        <?php if ($row_det['type_of_review']==1): ?>
        <label>Exemption Review</label>
        <?php endif; ?>
        <?php if ($row_det['type_of_review']==2): ?>
        <label>Expedited Review</label>
        <?php endif; ?>
            <?php if (!empty($row_det['expedited_exception'])): ?>
                    <a href="../uploads/2024/<?php echo $row_det['expedited_exception']; ?>" target="_blank">View the file</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>
                
        </div>
        <?php endif; ?>




        <div class="form-group">

        <?php if ($row_det['type_of_study']==0): ?>
        <label>Clinical Trials</label>
        <?php endif; ?>
        <?php if ($row_det['type_of_study']==1): ?>
        <label>Socio-Behavioural and Public Health Research</label>
        <?php endif; ?>
            <?php if (!empty($row_det['clinical_sociobehaviour'])): ?>
                    <a href="../uploads/2024/<?php echo $row_det['clinical_sociobehaviour']; ?>" target="_blank">View the file</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>
         
        </div>

        <div class="form-group">
            <label>Approval of Scientific Committee</label>
            <?php if (!empty($row_det['Scientific_approval'])): ?>
                    <a href="../uploads/2024/<?php echo $row_det['Scientific_approval']; ?>" target="_blank">View the file</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>
            
        </div>




        <div class="form-group">
            <label>Cover Letter to Member Secretary</label>
            <?php if (!empty($row_det['coverletter'])): ?>
                    <a href="../uploads/2024/<?php echo $row_det['coverletter']; ?>" target="_blank">View the file</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>
            
        </div>



        <div class="form-group">
            <label>The Corrected Version of ICD</label>
            <?php if (!empty($row_det['Icd_document'])): ?>
                    <a href="../uploads/2024/<?php echo $row_det['Icd_document']; ?>" target="_blank">View the file</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>
         
        </div>


        <div class="form-group">
            <label>Case Form or Questionnaire</label>
            <?php if (!empty($row_det['Questionaire'])): ?>
                    <a href="../uploads/2024/<?php echo $row_det['Questionaire']; ?>" target="_blank">View the file</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>
          
        </div>


        <div class="form-group">
            <label>Recruitment Procedure</label>
            <?php if (!empty($row_det['R_procedure'])): ?>
                    <a href="../uploads/2024/<?php echo $row_det['R_procedure']; ?>" target="_blank">View the file</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>
             
        </div>


        <div class="form-group">
            <label>Patient Instruction Card/Diary</label>
            <?php if (!empty($row_det['patientcard'])): ?>
                    <a href="../uploads/2024/<?php echo $row_det['patientcard']; ?>" target="_blank">View the file</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>
             
        </div>



        <div class="form-group">
            <label>Investigator Brochure</label>
            <?php if (!empty($row_det['invest_bro'])): ?>
                    <a href="../uploads/2024/<?php echo $row_det['invest_bro']; ?>" target="_blank">View the file</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>
            
        </div>



        <div class="form-group">
            <label>Details of Funding Agency</label>
            <?php if (!empty($row_det['Fund_agency'])): ?>
                    <a href="../uploads/2024/<?php echo $row_det['Fund_agency']; ?>" target="_blank">View the file</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>
   
        </div>

        <div class="form-group">
            <label>CV of Primary Investigators</label>
            <?php if (!empty($row_det['cv_primary'])): ?>
                    <a href="../uploads/2024/<?php echo $row_det['cv_primary']; ?>" target="_blank">View the file</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>
            
        </div>

        <div class="form-group">
            <label>GCP Training Certificate of Investigator</label>
            <?php if (!empty($row_det['gcp_cer'])): ?>
                    <a href="../uploads/2024/<?php echo $row_det['gcp_cer']; ?>" target="_blank">View the file</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>
           
        </div>
        
        <div class="form-group">
            <label>List of Ongoing Studies by the Primary Investigators</label>
            <?php if (!empty($row_det['List_study'])): ?>
                    <a href="../uploads/2024/<?php echo $row_det['List_study']; ?>" target="_blank">View the file</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>
              
        </div>


        <div class="form-group">
            <label>Regulatory Permission</label>
            <?php if (!empty($row_det['Reg_permission'])): ?>
                    <a href="../uploads/2024/<?php echo $row_det['Reg_permission']; ?>" target="_blank">View the file</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>
              
        </div>


        <div class="form-group">
            <label>Relevent Administrative Approval</label>
            <?php if (!empty($row_det['Relent_admin_approval'])): ?>
                    <a href="../uploads/2024/<?php echo $row_det['Relent_admin_approval']; ?>" target="_blank">View the file</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>
             
        </div>


        <div class="form-group">
            <label>IC-SCR Approval</label>
            <?php if (!empty($row_det['Icsr_approval'])): ?>
                    <a href="../uploads/2024/<?php echo $row_det['Icsr_approval']; ?>" target="_blank">View the file</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>
                
        </div>

        <div class="form-group">
            <label>MoU</label>
            <?php if (!empty($row_det['Mou'])): ?>
                    <a href="../uploads/2024/<?php echo $row_det['Mou']; ?>" target="_blank">View the file</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>
               
        </div>

        <div class="form-group">
            <label>Clinical Trail Agreement</label>
            <?php if (!empty($row_det['Clinical_agreement'])): ?>
                    <a href="../uploads/2024/<?php echo $row_det['Clinical_agreement']; ?>" target="_blank">View the file</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>
               
        </div>


        <div class="form-group">
            <label>Insurance Policy</label>
            <?php if (!empty($row_det['Insurance_policy'])): ?>
                    <a href="../uploads/2024/<?php echo $row_det['Insurance_policy']; ?>" target="_blank">View the file</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>
                
        </div>


        <div class="form-group">
            <label>Indemnity policy</label>
            <?php if (!empty($row_det['Indemnity_policy'])): ?>
                    <a href="../uploads/2024/<?php echo $row_det['Indemnity_policy']; ?>" target="_blank">View the file</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>
                
        </div>

        <div class="form-group">
            <label>Any additional document(s), as required by EC</label>
            <?php if (!empty($row_det['Additional_doc'])): ?>
                    <a href="../uploads/2024/<?php echo $row_det['Additional_doc']; ?>" target="_blank">View the file</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>
               
        </div>

        <div class="form-group">
            <label>Fees reciept</label>
            <?php if (!empty($row_det['Fee_rep'])): ?>
                    <a href="../uploads/2024/<?php echo $row_det['Fee_rep']; ?>" target="_blank">View the file</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>
              
        </div>


        



       <?php
       $sql_show="SELECT * FROM `co_investigator` WHERE application_id = ?";
       $stmt_show = $con->prepare($sql_show);
       
       $stmt_show->bind_param("i", $app_id);
       $stmt_show->execute();
       
       $result_show = $stmt_show->get_result();
       $count_res=mysqli_num_rows($result_show);
       
       $stmt_show->close();
       ?>
    <?php if ($count_res>0): ?>
        <div class="form-group">
        <label>Coinvestigators</label>
        </div>
       
       <?php
        while ($row = $result_show->fetch_assoc()) {  ?>
        <div class="form-group">
            <label><?php echo $row['coinvetigator_name']; ?></label>
            <?php if (!empty($row['cv_path'])): ?>
                    <a href="../uploads/2024/<?php echo $row['cv_path']; ?>" target="_blank">View the cv</a>
                <?php else: ?>
                    No file chosen
                <?php endif; ?>
                
        </div>


        <?php }?>
        <?php endif; ?>
<br>
<?php if($row_det['Fee_rep']==1) { ?>
    <div style="text-align: center;">
    <button class="btn" name="confirm_button">Confirm</button>

    <button class="btn_reject" name="Reject_button">Reject</button>
<?php } ?>
</div>

    </div>

    </form>

<?php 

if(isset($_POST['confirm_button']))
{

    $status=3;
    $sql="UPDATE `application_table` SET `status`='$status' WHERE id='$app_id'";
    if(mysqli_query($con,$sql))
    {

    echo "<script>alert('Confirmed sucessfully');</script>";
    }
    else
    {
        echo "<script>alert('Error occured');</script>";

    }
}
if(isset($_POST['Reject_button']))
{
    echo "<script>alert('Not applicable');</script>";

}




?>





















