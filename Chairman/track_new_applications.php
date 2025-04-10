<?php include './Partials_out/header.php'; ?>

<style>
    a {
        text-decoration: none;
    }
</style>

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
                <th style="padding: 12px; border-bottom: 2px solid #ddd;">Name of Applicant</th>
                <th style="padding: 12px; border-bottom: 2px solid #ddd;">Review Panel</th>   
                <th style="padding: 12px; border-bottom: 2px solid #ddd;"></th>

                <th style="padding: 12px; border-bottom: 2px solid #ddd;">Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php

            $query = "SELECT * FROM application_table 
            WHERE status >= 3";

            $result = $con->query($query);
            $slno = 1;

            while ($row = $result->fetch_assoc()) {

                $user_id = $row['user_id'];
                $status = $row['status'];

                // Fetch the applicant's name from user_table_global
                $user_query = "SELECT holder_name FROM user_table_global WHERE id = $user_id";
                $user_result = $con->query($user_query);
                
                if ($user_result->num_rows > 0) {
                    $user_data = $user_result->fetch_assoc();
                    $applicant_name = $user_data['holder_name'];
                } else {
                    $applicant_name = "Unknown"; // Fallback in case of missing data
                }

                echo "<tr style='border-bottom: 1px solid #ddd;'>";
                echo "<td style='padding: 10px;'>$slno</td>";
                echo "<td style='padding: 10px;'>$applicant_name</td>";
                if ($status!=100) {
                echo "<td style='padding: 10px;'><a href='./scientific_review_preview/review_panel.php?id=" . $row['id'] . "' style='color: blue; text-decoration: underline;'>Review panel</a></td>";
                echo "<td style='padding: 10px;'><a href='./scientific_review_preview/assessment_veiwer.php?id=" . $row['id'] . "' style='color: blue; text-decoration: underline;'>View reviews</a></td>";
                }
                
                if ($status==3) {
                    echo "<td style='padding: 10px;'><a href='./scientific_review_preview/approve.php?id=" . $row['id'] . "' style='color: blue; text-decoration: underline;'>Approved for review</a></td>";

                }
                elseif($status==4) 
                {
                echo "<td style='padding: 10px;'>Under reviewing</td>";
                echo "<td style='padding: 10px;'><a href='./scientific_review_preview/approve.php?id=" . $row['id'] . "' style='color: blue; text-decoration: underline;'>Approve to start</a></td>";

                }
                elseif($status==5) 
                {
                echo "<td style='padding: 10px;'>Approved to proceed</td>";

                }
                elseif($status==6) 
                {
                echo "<td style='padding: 10px;'>Fixed for continous review</td>";
              
                }
                elseif($status==7) 
                {
                echo "<td style='padding: 10px;'>Under review</td>";
                echo "<td style='padding: 10px;'><a href='./scientific_review_preview/approve_con.php?id=" . $row['id'] . "' style='color: blue; text-decoration: underline;'>Approve to start</a></td>";
                }
                elseif($status==8) 
                {
                echo "<td style='padding: 10px;'>Approved to proceed</td>";
              
                }
                elseif($status==10) 
                {
                echo "<td style='padding: 10px;'>Fixed for final review</td>";
              
                }
                elseif($status==11) 
                {
                echo "<td style='padding: 10px;'>Under review</td>";
                echo "<td style='padding: 10px;'><a href='./scientific_review_preview/approve_fin.php?id=" . $row['id'] . "' style='color: blue; text-decoration: underline;'>Approve to Final review</a></td>";
                }
                elseif($status==12) 
                {
                echo "<td style='padding: 10px;'>Approved successfully</td>";
              
                }
                elseif($status==100) 
                {
                    echo "<td style='padding: 10px; color: red; font-weight: bold;'>Research cancelled</td>";
              
                }
                echo "</tr>";

                $slno++;
            
        }
            ?>
        </tbody>
    </table>
</div>

<?php include './Partials_out/footer.php'; ?>
