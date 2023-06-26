<?php
$pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', 'root');
$pdo->exec("SET NAMES UTF8");
session_start();

$email = $_POST['email'];

$query = "SELECT * FROM users where email = :email";
$stmt = $pdo->prepare($query);
$stmt->execute(['email' => $email]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);
$uid = $data["id"];

$tohash = rand(1, 10000);
$newreception = password_hash($tohash, PASSWORD_BCRYPT);

$sql = "INSERT INTO activation (`user_id`, `code`) VALUES (?,?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$uid, $newreception]);



// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include library files 
require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

// Create an instance; Pass `true` to enable exceptions 
$mail = new PHPMailer;

// Server settings 
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;    //Enable verbose debug output 
$mail->isSMTP();                            // Set mailer to use SMTP 
$mail->Host = 'sebastienmerv.be';           // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;                     // Enable SMTP authentication 
$mail->Username = 'noreply@sebastienmerv.be';       // SMTP username 
$mail->Password = '@1704fleche';         // SMTP password 
$mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 465;                          // TCP port to connect to 

// Sender info 
$mail->setFrom('noreply@sebastienmerv.be', 'E-commerce');
// $mail->addReplyTo('reply@example.com', 'SenderName'); 
$mail->CharSet = "UTF-8";
// Add a recipient 
$mail->addAddress($email);

//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 

// Set email format to HTML 
$mail->isHTML(true);

// Mail subject 
$mail->Subject = 'Mot de passe oublié';

// Mail body content 
$bodyContent = '<h1>Lien de récupération du compte de MR ' . $data["name"];
$bodyContent .= '<p>Voici le lien de recuperation de votre compte : <a href="http://localhost/ecommerce/membres/resetpassword.php?account=' . $newreception . '">Récupérer</a></b></p>';
$mail->Body    = $bodyContent;

// Send email 
if (!$mail->send()) {
    echo 'Une erreur est arrivé: ' . $mail->ErrorInfo . '  Merci de contacter un administrateur avec ce rapport.';
} else {
    header('Location: login.php?success=true');
}