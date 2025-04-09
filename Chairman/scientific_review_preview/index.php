<?php 
session_start();
?>
<?php include '../Partials/header.php'; ?>

<link rel="stylesheet" href="./css/common.css">
<?php
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$stmt = $con->prepare("SELECT * FROM application_table WHERE id = ?");
$stmt->bind_param("i", $id);  // 'i' stands for integer

// Set parameter and execute
$id = $_GET['id'];
$stmt->execute();

// Get result
$result = $stmt->get_result();
$row = $result->fetch_assoc();  

$administrative_details = json_decode($row['administrative_details'], true);
$research_related_info = json_decode($row['research_related_info'], true);
$participant_data	 = json_decode($row['participant_data'], true);
$benefit_risk	 = json_decode($row['benefit_risk'], true);

$informed_consent	 = json_decode($row['informed_consent'], true);

$compensation_data	 = json_decode($row['compensation_data'], true);

$storage_confidentality		 = json_decode($row['storage_confidentality'], true);

$documents_files	 = json_decode($row['documents_files'], true);







$academic_research = explode(",", $row['academic_research']);
$research_type = explode(",", $row['research_type']);
$consent_type = explode(",", $row['consent_type']);
$waiver_reason = explode(",", $row['waiver_reason']);





?>

<style>
   #suceessfullsubmission
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


<div class="content">
    <div class="login-container d-flex justify-content-center align-items-center min-vh-50" style="margin-top: 0rem;">
        <div class="container bg-white p-4 rounded shadow-sm">
            <!-- PHP Form Start -->
            <form id="myform" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <input type="hidden" name="applicationid" value="<?php echo $_GET['id'];?>">

            <?php include './adminitrative_details.php'; ?>
            <?php include './research_related_info.php'; ?>
            <?php include './participant_related.php'; ?>
            <?php include './benefitsandrisk.php'; ?>
            <?php include './informed_concent.php'; ?>
            <?php include './compenstion_patment.php'; ?>
            <?php include './storage_confidentality.php'; ?>
            <?php include './documents.php'; ?>

            <?php if(isset($row['status']) && $row['status'] === null) { ?>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            <?php } ?>



            </form>
        </div>
    </div>
</div>

<div id="suceessfullsubmission">
<div style="
    background: linear-gradient(135deg, #2C3E50, #3498DB);
    color: #fff;
    padding: 20px;
    border-radius: 10px;
    font-family: Arial, sans-serif;
    text-align: center;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    max-width: 600px;
    margin: 30px auto;
    font-size: 16px;
    font-weight: bold;
    line-height: 1.5;
">
    ✅ <span style="font-size: 18px;">2nd step toward your application submission is completed!</span> <br><br>
    🚀 you have scuessfully submitted the application & on reviewing
    <br>
    <div class="d-flex justify-content-center">
        <br>
                 <button type="submit"  style="background: linear-gradient(135deg, #2C3E50, #3498DB);"class="btn btn-primary">Submit</button>
            </div>
</div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php include '../Partials/footer.php'; ?>






















<script>
$(document).ready(function(){
    $('#myform').on('submit', function(event){
        event.preventDefault(); // Prevent default form submission

        var formdata = new FormData(this); // Create FormData object

        $.ajax({
            url: './db.php', // PHP file to handle upload
            type: 'POST',
            data: formdata,
            contentType: false, // Important: Prevent jQuery from setting content type
            processData: false, // Important: Prevent jQuery from processing data
            success: function(response) {
                alert('Form submitted successfully!\nResponse: ' + response);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                alert('There was an error submitting the form.');
            }
        });
    });
});
</script>