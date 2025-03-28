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
            <div>Reviewer Id</div>
            <div>Reviewer Name</div>
            <div>Reviewer status</div>

            <div>More Details</div>
        </div>
        <div class="table-body">
        <?php 

            $comm_id=$_GET['id'];
            $type=4;
            $status=0;
            $count=0;
            $sql="select * from commitee_table_detailed where type='$type' and status='$status'";
            $res=mysqli_query($con,$sql);
            while($row=mysqli_fetch_array($res))
            {       
                $p_id=$row['user_id'];
                $sql_name="select * from user_table_global where id='$p_id'";
                $name=mysqli_fetch_array(mysqli_query($con,$sql_name));
        ?>      
        <div class="table-row">
            <div><?php echo ++$count; ?></div>
            <div>IEC/<?php echo $row['commitee_id'] ."/". $row['user_id']; ?></div>

            <div><?php echo $name['holder_name']; ?></div>
            <div><a class='btn'>More details</a></div>
            <div><a class='btn'></a></div>

        </div>
            <?php  }?>
        </div>
    </div>
</div>

</body>
