<?php

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
 $firstname = $_POST["firstname"];
 $middlename = $_POST["middlename"];
 $lastname = $_POST["lastname"];

 $email = $_POST["email"];
 $gender = $_POST["gender"];

 $subjects = '';

 if(isset($_POST['math'])) $subjects .= 'math ';
 if(isset($_POST['science'])) $subjects .= 'science ';
 if(isset($_POST['filipino'])) $subjects .= 'filipino ';
 if(isset($_POST['english'])) $subjects .= 'english ';
 
 $database = new PDO('sqlite:form.db');
 $query = $database->prepare("insert into form(firstname,middlename,lastname,email,gender,subjects) values('{$firstname}','{$middlename}','{$lastname}','{$email}','{$gender}','{$subjects}');");
 $query->execute();
}

header('Location: test-form-view.php');
?>