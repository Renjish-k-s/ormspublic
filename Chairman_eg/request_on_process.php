<?php include './Partials/header.php'; ?>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .table-container {
        width: 100%;
        padding: 20px;
        display: flex;
        justify-content: center;
    }

    .table {
        display: flex;
        flex-direction: column;
        width: 100%;
        max-width: 1000px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .table-header {
        display: flex;
        background-color: #f4f4f4;
        font-weight: bold;
    }

    .table-header div {
        flex: 1;
        padding: 12px 15px;
        text-align: center;
    }

    .table-row {
        display: flex;
        border: 1px solid #ddd;
    }

    .table-row div {
        flex: 1;
        padding: 12px 15px;
        text-align: center;
    }

    .table-row:nth-child(even) {
        background-color: #f9f9f9; /* Zebra striping */
    }

    .more-details-button {
        padding: 8px 12px;
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 4px;
    }

    .more-details-button:hover {
        background-color: #0056b3;
    }

    @media (max-width: 768px) {
        .table-header, .table-row {
            flex-direction: column;
            align-items: flex-start;
        }

        .table-header div {
            display: none; /* Hide headers on small screens */
        }

        .table-row div {
            width: 100%;
            padding-left: 50%; /* Align text to the right */
            position: relative;
            text-align: right;
            border: none; /* Remove border for a cleaner look */
        }

        .table-row div::before {
            content: attr(data-label);
            position: absolute;
            left: 10px;
            width: 50%;
            padding-left: 10px;
            font-weight: bold;
            text-align: left;
        }

        .more-details-button {
            width: 100%;
            padding: 10px;
            font-size: 14px;
        }
    }
</style>
</head>
<body>

<div class="table-container">
    <div class="table">
        <div class="table-header">
            <div>Slno</div>
            <div>Application ID</div>
            <div>Submitted Date</div>
            <div>Status</div>
            <div>More Details</div>

            <div>Reviewer Details</div>
        </div>
        <div class="table-body">
      <?php  
      $count=0;
 
$member_id=$_SESSION['id'];
//echo $member_id;
$status=0;
$sql="select * from commitee_table_detailed where user_id='$member_id' and status='$status'";
$res=mysqli_query($con,$sql);
$c=mysqli_num_rows($res);
//echo $c;



if($c==1)
{
    $row=mysqli_fetch_array($res);
    $commitee_id=$row['commitee_id'];
    $status=3;
    $sql_applications="select * from application_table where commitee_id='$commitee_id' and status=$status";
    $res_application=mysqli_query($con,$sql_applications);
    $c_no_applications=mysqli_num_rows($res_application);
}
else{

    echo '<h2>YOU ARE NOT A MEMBER OF ANY COMMITEE</h2>';
}

while ($row_application = mysqli_fetch_array($res_application)) {  ?>
            <div class="table-row">
                <div data-label="Slno"><?php echo ++$count; ?></div> <!-- Increment serial number -->
                <div data-label="Application ID">IEC/MBDC/<?php echo $row_application['commitee_id'] ."/". $row_application['application_id']; ?></div>
                <div data-label="Submitted Date">
                <?php echo $row_application['date']; ?>
                </div>
                <div data-label="Status"><?php
                $status=$row_application['status'];

                if($status==3)
                {
                    echo'Under Reviewing';
                }
               
                
                ?></div>

                <div data-label="More Details">
                <?php if ($status==3): ?>
                    <a class="more-details-button" href="preview_show.php?id=<?php echo $row_application['id'];?>">More Details</a>
                <?php endif; ?>
                

                </div>

                <div data-label="More Details">
                    <a class="more-details-button" href="reviewer_list.php?id=<?php echo $row_application['commitee_id'];?>&re_id=<?php echo $row_application['id']; ?>">Reviewers list</a>
                

                </div>

            </div>

            <?php  }
            
          
            ?>

    
           
        </div>
    </div>
</div>

</body>
