-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2025 at 01:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_research_management_system_global`
--

-- --------------------------------------------------------

--
-- Table structure for table `application_table`
--

CREATE TABLE `application_table` (
  `id` int(11) NOT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `applicant_id_sc` varchar(100) DEFAULT NULL,
  `applicant_id_sc_co` varchar(10) DEFAULT NULL,
  `applicant_id_ec` varchar(20) DEFAULT NULL,
  `applicant_id_ec_co` varchar(15) DEFAULT NULL,
  `institutionInput` varchar(100) DEFAULT NULL,
  `administrative_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`administrative_details`)),
  `research_related_info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`research_related_info`)),
  `participant_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`participant_data`)),
  `benefit_risk` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`benefit_risk`)),
  `informed_consent` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`informed_consent`)),
  `compensation_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`compensation_data`)),
  `storage_confidentality` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`storage_confidentality`)),
  `academic_research` text DEFAULT NULL,
  `research_type` text DEFAULT NULL,
  `consent_type` text DEFAULT NULL,
  `waiver_reason` text DEFAULT NULL,
  `documents_files` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`documents_files`)),
  `ethics_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `in_status` int(1) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application_table`
--

INSERT INTO `application_table` (`id`, `user_id`, `applicant_id_sc`, `applicant_id_sc_co`, `applicant_id_ec`, `applicant_id_ec_co`, `institutionInput`, `administrative_details`, `research_related_info`, `participant_data`, `benefit_risk`, `informed_consent`, `compensation_data`, `storage_confidentality`, `academic_research`, `research_type`, `consent_type`, `waiver_reason`, `documents_files`, `ethics_details`, `in_status`, `status`, `time_date`) VALUES
(43, '1', 'MBDC/01/03/2025', '2', 'IEC/MBDC/01/03/2025', '1', '0', '{\"titleInput\":\"test\",\"short_title\":\"test\",\"completion_time\":\"\",\"qualification_gain\":\"\",\"count_of_collaborators\":\"\",\"pre_pi\":\"\",\"pre_co\":\"\",\"summary\":\"\"}', '{\"academicResearchType\":\"\",\"i_c_ResearchType\":\"\",\"Estimate_amm\":\"\",\"s_fund_id\":\"\",\"ext_agency_type\":\"\",\"research_approach\":\"\",\"Vitro_Vivo_type\":\"\",\"stored_status_invitro\":\"\",\"sample_size\":\"\",\"number_sample_size\":\"\",\"India\":\"\",\"USA\":\"\",\"Intervention_sample_size\":\"\",\"Placebo_sample_size\":\"\",\"total_sample_size\":\"\",\"out_status\":\"\",\"justification\":\"\"}', '{\"type_participant\":\"\",\"other_par_type\":\"\",\"responsible_participant\":\"\",\"other_par_type_specify\":\"\",\"method_recruitment\":\"0\",\"other_method_recruitment\":\"\",\"vulerable_status_type\":\"0\",\"justification_inclusion\":\"\",\"reimbursement_status\":\"\",\"reimbursement_type\":\"0\",\"justification_Monetary\":\"\",\"incentives_fee_status\":\"0\",\"incentives_fee_type\":\"0\",\"incentives_fee_Monetary\":\"\",\"recruitment_fee_status\":\"0\",\"recruitment_fee_type\":\"0\",\"recruitment_fee_Monetary\":\"\"}', '{\"risk_status\":\"\",\"risk_categorize\":\"\",\"risk_categorize_miti\":\"\",\"benefit_risk_status\":\"\",\"society_community_risk_status\":\"\",\"improve_science_risk_status\":\"\",\"describe_benefites_risk\":\"\",\"adverse_event_status\":\"\",\"reporting_procedures_status\":\"\",\"reporting_procedures_stratagies\":\"\"}', '{\"specify_lar\":\"\",\"consent_obtain\":\"\",\"consent_obtain_other\":\"\",\"translation_status\":\"\",\"waiver_status\":\"\",\"stored_status\":\"\"}', '{\"compensation_status\":\"\",\"compensation_status_why\":\"\",\"compensation_status_who_bear\":\"\",\"treatment_status\":\"\",\"who_provide_treatment\":\"\",\"compensation_research_SAEs\":\"\",\"causality_treatment_specify\":\"\"}', '{\"type_sample\":\"\",\"type_sample_container\":\"\",\"sample_handle\":\"\",\"where_sample_handle\":\"\",\"Explain_plan_of_data_analysis\":\"\",\"long_sample_handle\":\"\",\"propose_status\":\"\",\"propose_status_specify\":\"\",\"disseminated_status\":\"\",\"disseminated_status_specify\":\"\",\"study_results_status\":\"\",\"IPR_status\":\"\",\"IPR_status_specify\":\"\",\"supporting_status\":\"\",\"supporting_status_specify\":\"\"}', '', '', '', '', '{\"consentFile\":null,\"mouFile\":null,\"Proposal_pdf_copy\":\"1742912855_67e2bd57c4d17.pdf\",\"ctri_request_upload\":null}', '{\"review_type\":\"\",\"scientific_status\":\"\",\"rev_date\":\"\"}', NULL, '4', '2025-03-21 18:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `chat_table`
--

CREATE TABLE `chat_table` (
  `id` int(10) NOT NULL,
  `sender_id` int(10) NOT NULL,
  `reciver_id` int(10) NOT NULL,
  `message` varchar(400) NOT NULL,
  `on_create` varchar(20) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat_table`
--

INSERT INTO `chat_table` (`id`, `sender_id`, `reciver_id`, `message`, `on_create`) VALUES
(1, 12, 43, 'hai', '2025-04-05 14:31:44'),
(2, 12, 43, 'i have a question', '2025-04-05 14:38:19'),
(3, 43, 12, 'hai', '2025-04-05 16:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `collaborators`
--

CREATE TABLE `collaborators` (
  `id` int(100) NOT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commitee_table`
--

CREATE TABLE `commitee_table` (
  `id` int(10) NOT NULL,
  `commitee_id` varchar(100) NOT NULL,
  `year` int(100) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `date_meet` date DEFAULT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commitee_table`
--

INSERT INTO `commitee_table` (`id`, `commitee_id`, `year`, `type`, `date_meet`, `status`) VALUES
(4, 'IEC/MBDC/01/03/2025', 2025, '1', '2025-05-31', 1),
(5, 'MBDC/01/03/2025', 2025, '0', '2025-05-31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `commitee_table_detailed`
--

CREATE TABLE `commitee_table_detailed` (
  `id` int(100) NOT NULL,
  `commitee_id` varchar(100) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaint_box`
--

CREATE TABLE `complaint_box` (
  `id` int(10) NOT NULL,
  `appid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `adderss` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  `on_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint_box`
--

INSERT INTO `complaint_box` (`id`, `appid`, `name`, `adderss`, `email`, `subject`, `description`, `status`, `on_created`) VALUES
(1, '111', 'ww', 'ww', 'ram@gmail.com', '111', '1111', '0', '2025-04-01 05:42:20');

-- --------------------------------------------------------

--
-- Table structure for table `extension_application`
--

CREATE TABLE `extension_application` (
  `id` int(10) NOT NULL,
  `app_id` varchar(110) DEFAULT NULL,
  `user_id` varchar(10) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `description` varchar(10000) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `on_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `extension_application`
--

INSERT INTO `extension_application` (`id`, `app_id`, `user_id`, `duration`, `description`, `status`, `on_create`) VALUES
(11, '43', '1', '2 years', 'test', '0', '2025-04-05 02:01:51');

-- --------------------------------------------------------

--
-- Table structure for table `scientific_revew_table`
--

CREATE TABLE `scientific_revew_table` (
  `id` int(10) NOT NULL,
  `application_id` varchar(100) DEFAULT NULL,
  `reviewer_id` varchar(10) DEFAULT NULL,
  `review` varchar(10000) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `review_type` int(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scientific_revew_table`
--

INSERT INTO `scientific_revew_table` (`id`, `application_id`, `reviewer_id`, `review`, `status`, `review_type`, `time`) VALUES
(10, '43', '49', 'test', '0', 0, '2025-04-02 17:16:52'),
(11, '43', '12', 'test', '0', 0, '2025-04-03 16:36:47'),
(12, '43', '12', 'test', '0', 1, '2025-04-03 16:38:18'),
(13, '43', '12', 'test', '0', 1, '2025-04-05 09:10:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_table_global`
--

CREATE TABLE `user_table_global` (
  `id` int(100) NOT NULL,
  `holder_name` varchar(100) NOT NULL,
  `username_email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `gcp_upload` varchar(100) DEFAULT NULL,
  `resume` varchar(100) DEFAULT NULL,
  `signature` varchar(100) DEFAULT NULL,
  `more_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`more_details`)),
  `status` varchar(10) DEFAULT NULL,
  `log_time` varchar(100) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table_global`
--

INSERT INTO `user_table_global` (`id`, `holder_name`, `username_email`, `password`, `usertype`, `photo_path`, `gcp_upload`, `resume`, `signature`, `more_details`, `status`, `log_time`) VALUES
(1, 'Renjish', 'user@gmail.com', '$2y$10$m49UIj6x7gZt/Ykq9MCdpeMVrd1bYeLwnh9p1Gn/jue3Im9Mid9Wi', '5', '1742916981_67e2cd75956dd.jpg', NULL, NULL, NULL, '{\"Mobile\":\"9567225114\",\"sex\":\"Male\",\"address\":\"Thanponnankala vadakkethu puthen veedu\",\"a_email\":\"renjishksimon@gmail.com\",\"qualification\":\"\",\"gcp_status\":\"\"}', '1', '2025-03-03 09:03:47'),
(11, 'Head of the institution', 'head@gmail.com', '$2y$10$zLFSKMVBIsIzYtuR1PR4q.K2AzbDn2Oqm3FTf1SX5SgTurAAcEleS', '1', '', NULL, NULL, NULL, NULL, '2', '2025-03-03 09:03:47'),
(12, 'Renjish k s', 'reviewer@gmail.com', '$2y$10$zLFSKMVBIsIzYtuR1PR4q.K2AzbDn2Oqm3FTf1SX5SgTurAAcEleS', '4', '', NULL, NULL, NULL, NULL, '1', '2025-03-03 09:03:47'),
(13, 'Member', 'member@gmail.com', '$2y$10$zLFSKMVBIsIzYtuR1PR4q.K2AzbDn2Oqm3FTf1SX5SgTurAAcEleS', '3', '', NULL, NULL, NULL, NULL, '1', '2025-03-03 09:03:47'),
(15, 'Chairman', 'chair@gmail.com', '$2y$10$zLFSKMVBIsIzYtuR1PR4q.K2AzbDn2Oqm3FTf1SX5SgTurAAcEleS', '2', '', NULL, NULL, NULL, NULL, '1', '2025-03-03 09:03:47'),
(48, 'Renjish K S', 'membersc@gmail.com', '$2y$10$zLFSKMVBIsIzYtuR1PR4q.K2AzbDn2Oqm3FTf1SX5SgTurAAcEleS', '8', NULL, NULL, NULL, NULL, '{\"inistitution_id\":\"0\"}', '0', '2025-03-19 13:08:51'),
(49, 'Renjish K S', 'reviewersc@gmail.com', '$2y$10$zLFSKMVBIsIzYtuR1PR4q.K2AzbDn2Oqm3FTf1SX5SgTurAAcEleS', '7', NULL, NULL, NULL, NULL, '{\"inistitution_id\":\"0\"}', '0', '2025-03-19 14:11:08'),
(50, 'Renjish', 'chairmansc@gmail.com', '$2y$10$zLFSKMVBIsIzYtuR1PR4q.K2AzbDn2Oqm3FTf1SX5SgTurAAcEleS', '6', NULL, NULL, NULL, NULL, '{\"inistitution_id\":\"0\"}', '0', '2025-03-21 07:13:04'),
(52, 'Renjish K S', 'renjishksimon@gmail.com', '$2y$10$.6OYtJu5Vl6p6N1ye.REKeHbS286rvlQfCHm99OTrgP7cJXwFa0mW', '8', NULL, NULL, NULL, NULL, '{\"inistitution_id\":\"0\"}', '0', '2025-04-01 07:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `vote_table`
--

CREATE TABLE `vote_table` (
  `id` int(10) NOT NULL,
  `app_id` int(10) NOT NULL,
  `reviewer_id` int(10) NOT NULL,
  `rev_type` int(1) NOT NULL,
  `vote_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vote_table`
--

INSERT INTO `vote_table` (`id`, `app_id`, `reviewer_id`, `rev_type`, `vote_status`) VALUES
(4, 43, 12, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application_table`
--
ALTER TABLE `application_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_table`
--
ALTER TABLE `chat_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collaborators`
--
ALTER TABLE `collaborators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commitee_table`
--
ALTER TABLE `commitee_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commitee_table_detailed`
--
ALTER TABLE `commitee_table_detailed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint_box`
--
ALTER TABLE `complaint_box`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extension_application`
--
ALTER TABLE `extension_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scientific_revew_table`
--
ALTER TABLE `scientific_revew_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table_global`
--
ALTER TABLE `user_table_global`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vote_table`
--
ALTER TABLE `vote_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application_table`
--
ALTER TABLE `application_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `chat_table`
--
ALTER TABLE `chat_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `collaborators`
--
ALTER TABLE `collaborators`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `commitee_table`
--
ALTER TABLE `commitee_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `commitee_table_detailed`
--
ALTER TABLE `commitee_table_detailed`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `complaint_box`
--
ALTER TABLE `complaint_box`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `extension_application`
--
ALTER TABLE `extension_application`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `scientific_revew_table`
--
ALTER TABLE `scientific_revew_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_table_global`
--
ALTER TABLE `user_table_global`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `vote_table`
--
ALTER TABLE `vote_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
