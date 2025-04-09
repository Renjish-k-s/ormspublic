<?php

session_start();

include '../Partials_in/header.php';?>

<style>
    a {
        text-decoration: none;
    }
</style>


<?php

$sql="SELECT * FROM `commitee_table` WHERE type='0'";
$res=mysqli_query($con,$sql);


?>
<div style="max-width: 1000px; margin: 20px auto; padding: 20px; overflow-x: auto;">
    <table style="
        width: 100%;
        border-collapse: collapse;
        text-align: left;
        font-family: Arial, sans-serif;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        background: white;
        border-radius: 8px;
        overflow: hidden;
    ">
        <thead style="background: linear-gradient(135deg, #2C3E50, #3498DB); color: white;">
            <tr>
                <th style="padding: 12px; border-bottom: 2px solid #ddd;">SL No</th>
                <th style="padding: 12px; border-bottom: 2px solid #ddd;">Commitee id</th>
                <th style="padding: 12px; border-bottom: 2px solid #ddd;">Date</th>   

                <th style="padding: 12px; border-bottom: 2px solid #ddd;">Edit</th>
                <th style="padding: 12px; border-bottom: 2px solid #ddd;">Cancel</th>

            </tr>
        </thead>
        <tbody>

        <?php 
        $sl=0;
        while($row=mysqli_fetch_array($res)){?>
            <tr style='border-bottom: 1px solid #ddd;'>
            <td style='padding: 10px;'><?php echo ++$sl; ?></td>
            <td style='padding: 10px;'><?php echo $row['commitee_id']; ?></td>
            <td style='padding: 10px;'><?php echo $row['date_meet']; ?></td>
            <td><a href="./edit_shedule_commitee.php?id=<?php $row['id']; ?>">Change date</a></td>
            <td><a href="">Delete</a></td>





            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>

