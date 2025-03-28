<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';

function mailer_test($username, $password)
{
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
        $mail->Subject = 'Secure Verification Code - BioStar Health';
    
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
                .logo {
                    width: 150px;
                    height: auto;
                    margin-bottom: 20px;
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
                    line-height: 1.6;
                    margin: 20px 0;
                }
                .otp-container {
                    background: #f5f7ff;
                    border: 1px solid #e3e9ff;
                    border-radius: 8px;
                    padding: 20px;
                    margin: 25px 0;
                    text-align: center;
                }
                .otp-code {
                    font-family: 'Courier New', monospace;
                    font-size: 32px;
                    font-weight: bold;
                    color: #1a237e;
                    letter-spacing: 4px;
                    margin: 10px 0;
                }
                .warning {
                    background: #fff8e1;
                    border-left: 4px solid #ffa000;
                    padding: 15px;
                    margin: 20px 0;
                    font-size: 14px;
                    color: #666;
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
                    <!-- Replace with your actual logo URL -->
                   
                    <h1 class='title'>Secure Verification Required</h1>
                </div>
                
                <p class='subtitle'>Thank you for choosing BioStar Health. To ensure the security of your account, please use the verification code below to complete your request.</p>
                
                <div class='otp-container'>
                    <p style='margin: 0; color: #666;'>Your verification code is:</p>
                    <div class='otp-code'>$password</div>
                    <p style='margin: 5px 0; color: #666;'>This code will expire in 10 minutes</p>
                </div>
    
                <div class='warning'>
                    <strong>Security Notice:</strong> If you didn't request this verification code, please contact our support team immediately at support@biostarhealth.in
                </div>
    
                <div class='footer'>
                    <p>This is an automated message, please do not reply to this email.</p>
                    <p>© 2025 BioStar Health. All rights reserved.</p>
                    <p>Privacy Policy | Terms of Service | Contact Support</p>
                </div>
            </div>
        </body>
        </html>";
    
        $mail->isHTML(true);
        $mail->Body = $emailBody;
        
        // Send the email
        $mail->send();
        return true;
        //echo 'Verification code has been sent successfully.';
    } catch (Exception $e) {
       // echo "Message could not be sent. Error: {$mail->ErrorInfo}";
        return false;
    }
}
?>
