<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "sheikhfaraz.euroshub@gmail.com";
    $subject = "New Contact Form Submission";

    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    $body = "Name: $first_name $last_name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Message:\n$message";

    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        $status = "Your message has been sent successfully!";
    } else {
        $status = "Sorry, your message could not be sent.";
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
        <div class="contact-container">
            <div class="contact-info">
                <h1>CONTACT</h1>
                <p>If you want to talk to me, then please fill out the form</p>
                <p><a href="mailto:sheikhfaraz.euroshub@gmail.com">sheikhfaraz.euroshub@gmail.com</a></p>
                <p><a href="tel:+923335747903">Call: +923335747903</a></p>
                <?php if (!empty($status)) echo "<p class='status'>$status</p>"; ?>
            </div>
            <div class="contact-form">
                <form method="POST" action="">
                    <div class="name-fields">
                        <input type="text" name="first_name" placeholder="First name *" required>
                        <input type="text" name="last_name" placeholder="Last name *" required>
                    </div>
                    <input type="email" name="email" placeholder="Email *" required>
                    <input type="text" name="phone" placeholder="Phone">
                    <textarea name="message" placeholder="Message"></textarea>
                    <button type="submit">Send</button>
                </form>
            </div>
        </div>
    </section>

    <footer class="footer-container">
        <div class="logo">S</div>
        <p>© 2035 by Sheikh Faraz. Powered and secured by my PC</p>
    </footer>
</body>
</html>
