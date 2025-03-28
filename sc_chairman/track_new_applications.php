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
            </tr>
        </thead>
        <tbody>
            <?php

            $query = "SELECT * FROM application_table 
            WHERE status >= 0 
            AND in_status IS NULL 
            AND institutionInput = " . (int)$storage_confidentality['inistitution_id'] . " 
            ORDER BY status ASC;";

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
                echo "<td style='padding: 10px;'><a href='./scientific_review_preview/review_panel.php?id=" . $row['id'] . "' style='color: blue; text-decoration: underline;'>Review panel</a></td>";
                echo "<td style='padding: 10px;'><a href='./scientific_review_preview/assessment_veiwer.php?id=" . $row['id'] . "' style='color: blue; text-decoration: underline;'>View reviews</a></td>";

                if ($status==0) {
                    echo "<td style='padding: 10px;'><a href='./scientific_review_preview/approve.php?id=" . $row['id'] . "' style='color: blue; text-decoration: underline;'>Approve</a></td>";

                }
                elseif($status==1) {
                {
                echo "<td style='padding: 10px;'>Approved</td>";
                }
                echo "</tr>";

                $slno++;
            }
        }
            ?>
        </tbody>
    </table>
</div>

<?php include './Partials_out/footer.php'; ?>
