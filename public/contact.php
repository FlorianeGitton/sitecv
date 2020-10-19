<?php

require '_include.php';

$errors = [];

$message = $_POST['message'];

// $headers = 'FROM: test@site.net';

mail('gitton.foriane@gmail.com', "Formulaire de contact", $message, headers);

$validator = New Validator($_POST);

$validator->check('name', 'required');

$validator->check('email', 'required');

$validator->check('name', 'email');

$validator->check('name', 'required');

$errors = $validator->errors();


// if(!array_key_exists('name', $_POST) || $_POST['name'] == ''){
//     $errors['name'] = "Vous n'avez pas renseigné votre nom";

// }

// if(!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
//     $errors['email'] = "vous n'avez pas renseigné un email valide";
// }

// if(!array_key_exists('message', $_POST) || $_POST['message'] == ''){
//     $errors['message'] = "vous n'avez pas renseigné votre message";
// }

session_start();



if(!empty($errors)){
    
    $_SESSION['errors'] = $errors;
    $_SESSION['inputs'] = $_POST;
    header('location: index.php');
}else{
    $_SESSION['success'] = 1;

    $message = $_POST['message'];

    $headers = 'FROM: ' . $_POST['email'];

    mail('gitton.floriane@gmail.com', 'Formulaire de contact' . $_POST['name'] , $message, $headers);  

    header('location: index.php');

}




