<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

$status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ali.rayyan001@gmail.com';       // Your Gmail address
        $mail->Password   = 'egjiherhpokyifeq';              // App password (not your Gmail password)
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom($_POST['email'], $_POST['first_name'] . ' ' . $_POST['last_name']);
        $mail->addAddress('ali.rayyan001@gmail.com'); // Your Gmail again as recipient

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = '
            <strong>Name:</strong> ' . htmlspecialchars($_POST['first_name']) . ' ' . htmlspecialchars($_POST['last_name']) . '<br>
            <strong>Email:</strong> ' . htmlspecialchars($_POST['email']) . '<br>
            <strong>Phone:</strong> ' . htmlspecialchars($_POST['phone']) . '<br>
            <strong>Message:</strong><br>' . nl2br(htmlspecialchars($_POST['message']));

        $mail->send();
        $status = "Your message has been sent successfully!";
    } catch (Exception $e) {
        $status = "Sorry, your message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <section id="contact" class="section5">
        <div class="container">
            <h2>Contact Us</h2>
            <form method="post" action="contact.php">
                <input type="text" name="first_name" placeholder="First Name" required><br>
                <input type="text" name="last_name" placeholder="Last Name" required><br>
                <input type="email" name="email" placeholder="Email" required><br>
                <input type="text" name="phone" placeholder="Phone"><br>
                <textarea name="message" placeholder="Your Message" required></textarea><br>
                <button type="submit">Send Message</button>
            </form>
            <?php if (!empty($status)) echo "<p>$status</p>"; ?>
        </div>
    </section>
</body>
</html>
