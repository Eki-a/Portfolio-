<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    if ($name && $email && $subject && $message) {
    
        $to = 'juliencoulot77@gmail.com';
        $email_subject = "Nouveau message de contact : $subject";
        $email_body = "Vous avez reçu un nouveau message depuis votre site web.\n\n" .
                      "Nom : $name\n" .
                      "Email : $email\n\n" .
                      "Message :\n$message\n";

        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";


        if (mail($to, $email_subject, $email_body, $headers)) {

            echo "<script>alert('Votre message a été envoyé avec succès. Merci de nous avoir contactés !');</script>";
            echo "<script>window.location.href = 'index.html';</script>";
        } else {
            echo "<script>alert('Une erreur est survenue lors de l\'envoi du message. Veuillez réessayer plus tard.');</script>";
        }
    } else {
        echo "<script>alert('Veuillez remplir tous les champs correctement.');</script>";
    }
} else {
    echo "<script>alert('Méthode non autorisée.');</script>";
}
?>