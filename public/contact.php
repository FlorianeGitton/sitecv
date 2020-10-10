<?php

$errors = [];

$validator = new Validator($_POST);

$validator->check('name', 'required');

$validator->check('email', 'required');

$validator->check('email', 'email');

$validator->check('message', 'required');

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



if(!empty($errors)){
    
    $_SESSION['errors'] = $errors;
    $_SESSION['inputs'] = $_POST;
    header('location: index.php');
}else{
    $_SESSION['success'] = 1;

    $message = $_POST['message'];

    $headers = 'FROM: site@local.dev';

    mail('gitton.floriane@gmail.com', 'Formulaire de contact', $message, $headers);  

    header('location: index.php');

}




