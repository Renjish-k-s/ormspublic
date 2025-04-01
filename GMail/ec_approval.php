<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';
require 'vendor/autoload.php';



function mailer_test($username) {
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'mail.biostarhealth.in';
        $mail->SMTPAuth = true;
        $mail->Username = '_mainaccount@biostarhealth.in';
        $mail->Password = 'a@U;7e39imSWD7';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        
        // Email settings
        $mail->setFrom('_mainaccount@biostarhealth.in', 'BioStar Health');
        $mail->addAddress($username);
        $mail->Subject = 'Scientific Review Application Approval - ORMS';
        
        // HTML email template
        $emailBody = "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <style>
                body {
                    font-family: 'Segoe UI', Arial, sans-serif;
                    background-color: #f8f9fa;
                    margin: 0;
                    padding: 0;
                }
                .email-container {
                    max-width: 600px;
                    margin: auto;
                    background: #ffffff;
                    padding: 40px;
                    border-radius: 8px;
                    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                }
                .header {
                    text-align: center;
                    margin-bottom: 30px;
                }
                .title {
                    color: #1a237e;
                    font-size: 24px;
                    font-weight: 600;
                    margin: 0;
                }
                .subtitle {
                    color: #424242;
                    font-size: 16px;
                    line-height: 1.8;
                    margin: 20px 0;
                }
                .credentials-container {
                    background: #f5f7ff;
                    border: 1px solid #e3e9ff;
                    border-radius: 8px;
                    padding: 20px;
                    margin: 25px 0;
                    text-align: center;
                }
                .password-code {
                    font-family: 'Courier New', monospace;
                    font-size: 28px;
                    font-weight: bold;
                    color: #1a237e;
                    letter-spacing: 4px;
                    margin: 10px 0;
                }
                .notice {
                    background: #e8f5e9;
                    border-left: 4px solid #2e7d32;
                    padding: 15px;
                    margin: 20px 0;
                    font-size: 14px;
                    color: #424242;
                }
                .footer {
                    margin-top: 30px;
                    padding-top: 20px;
                    border-top: 1px solid #eee;
                    font-size: 12px;
                    color: #757575;
                    text-align: center;
                }
                .button {
                    display: inline-block;
                    background-color: #1a237e;
                    color: white;
                    padding: 12px 24px;
                    text-decoration: none;
                    border-radius: 4px;
                    margin-top: 20px;
                }
            </style>
        </head>
        <body>
            <div class='email-container'>
                <div class='header'>
                    <h1 class='title'>Scientific Review Application Approved</h1>
                </div>
                
                <p class='subtitle'>Dear Researcher,</p>
                
                <p class='subtitle'>We are pleased to inform you that your Scientific Review Application has been approved by <strong>Mar Baselios College of Dental College Kothamangalam</strong>. You can now download the certificate and proceed with the Ethics Review application.</p>
                
                <div class='credentials-container'>
                    <p style='margin: 0; color: #666;'>Your application has been successfully approved</p>
                    <p style='margin: 5px 0; color: #666;'>Please proceed with Ethics Review application as soon as possible</p>
                    <a href='https://orms.biostarhealth.in/' class='button'>Access Portal</a>
                </div>

                <p class='subtitle'>Now that your Scientific Review is approved, you are eligible to apply for the Ethics Review. Please complete this process as early as possible to avoid any delays in your research timeline.</p>

                <div class='notice'>
                    <strong>Next Steps:</strong>
                    <ol style='margin: 10px 0 0 20px;'>
                        <li>Login to <a href='http://orms.biostarhealth.in/'>http://orms.biostarhealth.in/</a></li>
                        <li>Navigate to Ethics Review → Track Application</li>
                        <li>Select your application from the list</li>
                        <li>Fill in the required Ethics details</li>
                        <li>Submit your Ethics Review application</li>
                    </ol>
                </div>

                <div class='footer'>
                    <p>Please complete the Ethics Review application process as soon as possible to ensure timely processing.</p>
                    <p>© 2025 All rights reserved.</p>
                    <p>For any queries, please contact: support@biostarhealth.in</p>
                </div>
            </div>
        </body>
        </html>
        ";
        
        $mail->isHTML(true);
        $mail->Body = $emailBody;
        
        // Send the email
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>