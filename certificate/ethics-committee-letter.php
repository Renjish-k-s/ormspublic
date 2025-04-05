<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IERC Approval Letter</title>
    <style>
        @media print {
            @page {
                size: A4;
                margin: 0;
            }
            body {
                margin: 15mm;
            }
            .print-button {
                display: none;
            }
        }
        
        body {
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.3;
            color: #000;
            max-width: 210mm;
            margin: 0 auto;
            padding: 15px;
            position: relative;
        }
        
        .print-button {

            top: 10px;
            right: 10px;
            padding: 8px 15px;
            background-color: #0066cc;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }
        
        .print-button:hover {
            background-color: #004c99;
        }
        
        .letterhead {
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
            margin-bottom: 20px;
            position: relative;
            height: 80px;
        }
        
        .logo-left {
            position: absolute;
            left: 0;
            top: 0;
            width: 80px;
        }
        
        .logo-right {
            position: absolute;
            right: 0;
            top: 0;
            width: 60px;
        }
        
        .header-text {
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            margin-top: 15px;
        }
        
        .address {
            text-align: center;
            font-size: 13px;
        }
        
        .content {
            margin-top: 20px;
            text-align: justify;
            font-size: 12px;
        }
        
        .recipient {
            margin-bottom: 10px;
        }
        
        .reference {
            margin-bottom: 10px;
        }
        
        .letter-body p {
            text-align: justify;
            margin-bottom: 8px;
        }
        
        .bullet-points {
            margin-left: 20px;
            margin-bottom: 8px;
            padding-left: 15px;
        }
        
        .bullet-points li {
            margin-bottom: 3px;
        }
        
        .signature {
            margin-top: 15px;
        }
        
        .signature p {
            margin: 3px 0;
        }

        img
        {
            height: 84px;
        }
    </style>
    <script>
        function printDocument() {
            window.print();
        }
    </script>
</head>
<body>
    
    <div class="letterhead">
        <div class="logo-left">
            <img src="Screenshot 2025-02-27 084446.png" alt="MBDC Logo" />
        </div>
        <div class="header-text">
            INSTITUTIONAL ETHICAL REVIEW COMMITTEE<br>
            MAR BASELIOS DENTAL COLLEGE,<br>
            <span class="address">KOTHAMANGALAM, KERALA 686 691</span>
        </div>
        <div class="logo-right">
            <img src="Screenshot 2025-02-27 084502.png" alt="Medical Symbol" />
        </div>
    </div>

    <div class="content">
        <div class="recipient">
            <p>Dr. Soma Susan Varghese<br>
            Principal Investigator.</p>
        </div>

        <div class="reference">
            <p><strong>Ref: Project No. IEC/MBDC/012024001</strong></p>
        </div>

        <div class="letter-body">
            <p>Institutional Ethics Committee of MBDC (PROVISIONAL REGISTRATION NUMBER-EC/NEW/INST/2022/2814) reviewed and discussed your application 02/02/2024 to conduct the research study entitled "<em>The impact of piper betel leaf on salivary copper levels in the individuals following the chewing of arecanut from copper-based fungicide treated arecanut palms and untreated arecanut palms</em>" during the IEC-MBDC meeting held on 21/02/2024, 8:30 AM onwards at IQAC Board Room, 4th floor clinical block.</p>
            
            <p>The following documents were reviewed and approved:</p>
            <ul class="bullet-points">
                <li>Project Submission form.</li>
                <li>Study protocol dated 02/02/2023.</li>
                <li>Current CVs of Principal investigator, Co-investigators</li>
            </ul>


            <p>The study is approved in its present form for a period of 2 years till 21/02/2026. The Principal Investigator should submit continuing review application/annual status report on or before 21/02/2026. You may request for extension of validity in the submission of continuing review application/annual status report. In order to ensure that there is no lapse in the IEC-MBDC approval period, it is mandatory to submit study status report prior to lapse of study.</p>

            <p>The study should be initiated only after -</p>
            <ul class="bullet-points">
                <li>Registration of the study with Clinical Trials Registry India (CTRI) (if applicable).</li>
                <li>Submission of Finalized Clinical Trial Agreement (if applicable).</li>
                <li>Submission of DCGI approval to IEC (if applicable).</li>
            </ul>

            <p>Following points must be noted:</p>
            <ul class="bullet-points">
                <li>IEC-MBDC has approved recruitment/review of participants/samples in this study.</li>
                <li>In the events of any protocol amendments, IEC-MBDC must be informed in accordance with SOP</li>
                <li>Principal Investigator should conduct the study in accordance with the IEC-MBDC approved protocol</li>
                <li>The PI should submit a report to the IEC-MBDC at the time of study completion or Premature Termination / Suspension / Discontinuation Report as applicable</li>
                <li>Principal Investigator should comply with regulations and guidelines as applicable</li>
            </ul>

            <p>Thanking You,</p>
        </div>

        <div class="signature">
            <p>Yours Sincerely,</p>
            <p><strong>Dr Subramaniam R MDS</strong><br>
            Chairman<br>
            IEC MBDC</p>
        </div>

    </div>

    <button class="print-button" onclick="printDocument()">Print Letter</button>
    
</body>
</html>
