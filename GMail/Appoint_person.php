<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';

function mailer_test($username, $password) {
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
        $mail->Subject = 'Committee Selection Confirmation - ORMS';
        
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
                    <h1 class='title'>Congratulations on Your Committee Selection</h1>
                </div>
                
                <p class='subtitle'>Dear Esteemed Colleague,</p>
                
                <p class='subtitle'>We are pleased to inform you that you have been selected to serve as a member of the Research Committee at ABC Institution. Your expertise and contributions to the field have made you an ideal candidate for this distinguished position.</p>
                
                <div class='credentials-container'>
                    <p style='margin: 0; color: #666;'>Your temporary login password is:</p>
                    <div class='password-code'>$password</div>
                    <p style='margin: 5px 0; color: #666;'>Please login and update your profile within 48 hours</p>
                    <a href='https://orms.biostarhealth.in/' class='button'>Access Portal</a>
                </div>

                <p class='subtitle'>This appointment presents an opportunity to contribute to groundbreaking research initiatives and collaborate with distinguished scholars in your field. We look forward to your valuable contributions to our academic community.</p>

                <div class='notice'>
                    <strong>Next Steps:</strong>
                    <ol style='margin: 10px 0 0 20px;'>
                        <li>Login to the committee portal using your institutional email and the temporary password</li>
                        <li>Update your profile and contact information</li>
                        <li>Review the committee guidelines and upcoming meeting schedule</li>
                    </ol>
                </div>

                <div class='footer'>
                    <p>Additional information regarding committee responsibilities and upcoming meetings will be shared shortly.</p>
                    <p>© 2025 ABC Institution. All rights reserved.</p>
                    <p>For any queries, please contact: committee.support@abcinstitution.edu</p>
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