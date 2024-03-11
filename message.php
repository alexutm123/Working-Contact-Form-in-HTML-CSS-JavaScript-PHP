<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$website = $_POST['website'];
$message = $_POST['message'];

if (!empty($email) && !empty($message)) { // если поля email и сообщение не пустые
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // если email валидный
        $receiver = "pilich.sasha@gmail.com        "; // email адрес получателя
        $subject = "From: $name <$email>"; // тема письма
        $body = "Name: $name\nEmail: $email\nPhone: $phone\nWebsite: $website\nMessage: $message\n\nRegards,\n$name"; // текст письма
        $sender = "From: $email"; // отправитель

        if (mail($receiver, $subject, $body, $sender)) { // отправка письма
            echo "Your message has been sent";
        } else {
            echo "Sorry, failed to send your message!";
        }
    } else {
        echo "Enter a valid email address!";
    }
} else { 
    echo "Email and message fields are required!";
}
?>
