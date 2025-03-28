<?php
session_start();
include '../../database/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die(json_encode(['message' => 'Invalid CSRF token']));
    }



    $applicationid=$_POST['applicationid'];

    $applicationid_formatted=$_POST['applicationid_formatted'];
    $applicationid_count=$_POST['applicationid_count'];


    
    $institutionInput = $_POST['institutionInput'] ?? '';
    $count_of_collaborators = $_POST['count_of_collabotators'] ?? 0;


    $administrative_details = json_encode([
        'titleInput' => $_POST['titleInput'] ?? '',
        'short_title' => $_POST['short_title'] ?? '',
        'completion_time' => $_POST['completion_time'] ?? '',
        'qualification_gain' => $_POST['qualification_gain'] ?? '',
        'count_of_collaborators' => $_POST['count_of_collabotators'] ?? '',
        'pre_pi' => $_POST['pre_pi'] ?? '',
        'pre_co' => $_POST['pre_co'] ?? '',
        'summary' => $_POST['summary'] ?? ''
    ]);


    $research_related_info = json_encode([
        'academicResearchType' => $_POST['academicResearchType'] ?? '',
        'i_c_ResearchType' => $_POST['i_c_ResearchType'] ?? '',
        'Estimate_amm' => $_POST['Estimate_amm'] ?? '',
        's_fund_id' => $_POST['s_fund_id'] ?? '',
        'ext_agency_type' => $_POST['ext_agency_type'] ?? '',
        'research_approach' => $_POST['research_approach'] ?? '',
        'Vitro_Vivo_type' => $_POST['Vitro_Vivo_type'] ?? '',
        'stored_status_invitro' => $_POST['stored_status_invitro'] ?? '',
        'sample_size' => $_POST['sample_size'] ?? '',
        'number_sample_size' => $_POST['number_sample_size'] ?? '',
        'India' => $_POST['India'] ?? '',
        'USA' => $_POST['USA'] ?? '',
        'Intervention_sample_size' => $_POST['Intervention_sample_size'] ?? '',
        'Placebo_sample_size' => $_POST['Placebo_sample_size_no'] ?? '000',
        'total_sample_size' => $_POST['total_sample_size'] ?? '',
        'out_status' => $_POST['out_status'] ?? '',
        'justification' => $_POST['justification'] ?? '',
    ]); 

    $participant_data = json_encode([
        'type_participant' => $_POST['type_participant'] ?? '',
        'other_par_type' => $_POST['other_par_type'] ?? '',
        'responsible_participant' => $_POST['responsible_participant'] ?? '',
        'other_par_type_specify' => $_POST['other_par_type_specify'] ?? '',
        'method_recruitment' => $_POST['method_recruitment'] ?? '',
        'other_method_recruitment' => $_POST['other_method_recruitment'] ?? '',
    
        'vulerable_status_type' => $_POST['vulerable_status_type'] ?? '',
        'justification_inclusion' => $_POST['justification_inclusion'] ?? '',
        'reimbursement_status' => $_POST['reimbursement_status'] ?? '',
        'reimbursement_type' => $_POST['reimbursement_type'] ?? '',
        
        'justification_Monetary' => $_POST['justification_Monetary'] ?? '',
        'incentives_fee_status' => $_POST['incentives_fee_status'] ?? '',
        'incentives_fee_type' => $_POST['incentives_fee_type'] ?? '',
        'incentives_fee_Monetary' => $_POST['incentives_fee_Monetary'] ?? '',
        'recruitment_fee_status' => $_POST['recruitment_fee_status'] ?? '',
        
        'recruitment_fee_type' => $_POST['recruitment_fee_type'] ?? '',
        'recruitment_fee_Monetary' => $_POST['recruitment_fee_Monetary'] ?? '',
    ]);

    $benefit_risk = json_encode([
        'risk_status' => $_POST['risk_status'] ?? '',
        'risk_categorize' => $_POST['risk_categorize'] ?? '',
        'risk_categorize_miti' => $_POST['risk_categorize_miti'] ?? '',
        'benefit_risk_status' => $_POST['benefit_risk_status'] ?? '',
        'society_community_risk_status' => $_POST['society_community_risk_status'] ?? '',
        'improve_science_risk_status' => $_POST['improve_science_risk_status'] ?? '',
        'describe_benefites_risk' => $_POST['describe_benefites_risk'] ?? '',
        'adverse_event_status' => $_POST['adverse_event_status'] ?? '',
        'reporting_procedures_status' => $_POST['reporting_procedures_status'] ?? '',
        'reporting_procedures_stratagies' => $_POST['reporting_procedures_stratagies'] ?? ''
    ]);



    $informed_consent = json_encode([
        'specify_lar' => $_POST['specify_lar'] ?? '',
        'consent_obtain' => $_POST['consent_obtain'] ?? '',
        'consent_obtain_other' => $_POST['consent_obtain_other'] ?? '',
        'translation_status' => $_POST['translation_status'] ?? '',
        'waiver_status' => $_POST['waiver_status'] ?? '',
        'stored_status' => $_POST['stored_status'] ?? ''
    ]);


    $compensation_data = json_encode([
        'compensation_status' => $_POST['compensation_status'] ?? '',
        'compensation_status_why' => $_POST['compensation_status_why'] ?? '',
        'compensation_status_who_bear' => $_POST['compensation_status_who_bear'] ?? '',
        'treatment_status' => $_POST['treatment_status'] ?? '',
        'who_provide_treatment' => $_POST['who_provide_treatment'] ?? '',
        'compensation_research_SAEs' => $_POST['compensation_research_SAEs'] ?? '',
        'causality_treatment_specify' => $_POST['causality_treatment_specify'] ?? ''
    ]);
    

    $storage_confidentality = json_encode([
        'type_sample' => $_POST['type_sample'] ?? '',
        'type_sample_container' => $_POST['type_sample_container'] ?? '',
        'sample_handle' => $_POST['sample_handle'] ?? '',
        'where_sample_handle' => $_POST['where_sample_handle'] ?? '',
        'Explain_plan_of_data_analysis' => $_POST['Explain_plan_of_data_analysis'] ?? '',
        'long_sample_handle' => $_POST['long_sample_handle'] ?? '',
        'propose_status' => $_POST['propose_status'] ?? '',
        'propose_status_specify' => $_POST['propose_status_specify'] ?? '',
        'disseminated_status' => $_POST['disseminated_status'] ?? '',
        'disseminated_status_specify' => $_POST['disseminated_status_specify'] ?? '',
        'study_results_status' => $_POST['study_results_status'] ?? '',
        'IPR_status' => $_POST['IPR_status'] ?? '',
        'IPR_status_specify' => $_POST['IPR_status_specify'] ?? '',
        'supporting_status' => $_POST['supporting_status'] ?? '',
        'supporting_status_specify' => $_POST['supporting_status_specify'] ?? ''
    ]);
    

    // Process checkbox selections
    $academic_research = isset($_POST['academic_research']) ? implode(',', $_POST['academic_research']) : '';
    $research_type = isset($_POST['research_type']) ? implode(',', $_POST['research_type']) : '';

    $consent_type = isset($_POST['consent_type']) ? implode(',', $_POST['consent_type']) : '';
    $waiver_reason = isset($_POST['waiver_reason']) ? implode(',', $_POST['waiver_reason']) : '';


    /////file uploads

    
    $uploadDir = "../../../uploads/";
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0755, true); // Create directory if not exists
    }

    ////////////

    function uploadFile($file, $uploadDir) {
        if (!isset($_FILES[$file]) || $_FILES[$file]['error'] !== UPLOAD_ERR_OK) {
            return null; // No file uploaded or an error occurred
        }

        $allowedExtensions = ['pdf'];
        $maxFileSize = 5 * 1024 * 1024; // 5MB limit

        $fileTmpPath = $_FILES[$file]['tmp_name'];
        $fileName = basename($_FILES[$file]['name']);
        $fileSize = $_FILES[$file]['size'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Validate file extension and size
        if (!in_array($fileExt, $allowedExtensions) || $fileSize > $maxFileSize) {
            return null;
        }

        // Ensure unique file name
        $newFileName = time() . "_" . uniqid() . "." . $fileExt;
        $destinationPath = $uploadDir . $newFileName;

        // Move uploaded file
        if (move_uploaded_file($fileTmpPath, $destinationPath)) {
            return $newFileName;
        }
        return null;
    }
     // Set upload directory
     $uploadDir = "../../../uploads/";

     // Handle file uploads

     $user_id= $_SESSION['user_id'];

     $documents_files = json_encode([
        'consentFile' => !empty($_FILES['consent_obtain_other_upload']['name']) || !empty($_POST['consent_obtain_other_upload_already']) 
            ? (uploadFile('consent_obtain_other_upload', $uploadDir) ?: $_POST['consent_obtain_other_upload_already']) 
            : null,
    
        'mouFile' => !empty($_FILES['MoU_upload']['name']) || !empty($_POST['MoU_upload_already']) 
            ? (uploadFile('MoU_upload', $uploadDir) ?: $_POST['MoU_upload_already']) 
            : null,
    
        'Proposal_pdf_copy' => !empty($_FILES['Proposal_pdf_copy']['name']) || !empty($_POST['Proposal_pdf_copy_already']) 
            ? (uploadFile('Proposal_pdf_copy', $uploadDir) ?: $_POST['Proposal_pdf_copy_already']) 
            : null,
    
        'ctri_request_upload' => !empty($_FILES['ctri_request_upload']['name']) || !empty($_POST['ctri_request_upload_already']) 
            ? (uploadFile('ctri_request_upload', $uploadDir) ?: $_POST['ctri_request_upload_already']) 
            : null
    ]);
    
    

$status=0;
    


    if (!$con) {
        die(json_encode(['message' => 'Database connection failed']));
    }



    // Start Transaction
    $con->begin_transaction();

    try {
        // Insert main form data
        $stmt = $con->prepare("UPDATE application_table 
        SET institutionInput = ?, 
            administrative_details = ?, 
            research_related_info = ?, 
            participant_data = ?, 
            benefit_risk = ?, 
            informed_consent = ?, 
            compensation_data = ?, 
            storage_confidentality = ?, 
            academic_research = ?, 
            research_type = ?, 
            consent_type = ?, 
            waiver_reason = ?, 
            documents_files = ?, 
            user_id = ? ,
            status = ?,
            applicant_id_sc = ?,
            applicant_id_sc_co = ?
        WHERE id = ?");
    
    $stmt->bind_param("sssssssssssssssssi", 
        $institutionInput, 
        $administrative_details, 
        $research_related_info, 
        $participant_data, 
        $benefit_risk, 
        $informed_consent, 
        $compensation_data, 
        $storage_confidentality, 
        $academic_research, 
        $research_type, 
        $consent_type, 
        $waiver_reason, 
        $documents_files, 
        $user_id, 
        $status,
        $applicationid_formatted,
        $applicationid_count,
        $applicationid);
    
    if (!$stmt->execute()) {
        throw new Exception("Error updating main form: " . $stmt->error);
    }
    

        $application_id = $applicationid;
        $stmt->close();

        $stmt = $con->prepare("DELETE FROM collaborators WHERE application_id = ?");
        $stmt->bind_param("i", $applicationid);

        if (!$stmt->execute()) {
            throw new Exception("Error deleting collaborators: " . $stmt->error);
        }


        // Insert collaborators if count is greater than 0
        if ($count_of_collaborators > 0) {
            $stmt_collab = $con->prepare("INSERT INTO collaborators 
                (application_id, name, designation, department, email, role) 
                VALUES (?, ?, ?, ?, ?, ?)");

            for ($i = 0; $i < $count_of_collaborators; $i++) {
                $name = $_POST["collaborator_name_$i"] ?? '';
                $designation = $_POST["collaborator_designation_$i"] ?? '';
                $department = $_POST["collaborator_department_$i"] ?? '';
                $email = $_POST["collaborator_address_$i"] ?? '';
                $role = $_POST["collaborator_role_$i"] ?? '';

                $stmt_collab->bind_param("issssi", $application_id, $name, $designation, $department, $email, $role);

                if (!$stmt_collab->execute()) {
                    throw new Exception("Error inserting collaborator: " . $stmt_collab->error);
                }
            }
            $stmt_collab->close();
        }

        // Commit Transaction
        $con->commit();
        echo json_encode(['message' => 'Form submitted successfully']);

    } catch (Exception $e) {
        $con->rollback();
        echo json_encode(['message' => 'Transaction failed: ' . $e->getMessage()]);
    }

    $con->close();
}
?>

