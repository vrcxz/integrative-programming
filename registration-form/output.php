<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<style>

body{
 margin: 0px;
 padding: 0px;
}

.main-container{
 display: flex;
 flex-direction: column;
 gap: 10px;
 padding: 10px;
 background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('background3.gif');
 background-color: #0b1a1d;
 background-size: 100%;
 background-repeat: no-repeat;
 color: white;
 height: 100vh;
 //-webkit-text-stroke-width: 0.4px;
 //-webkit-text-stroke-color: black;
}

@media (min-width: 768px) { 
 .main-container{
 background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('background4.gif');
 }
}

.container{
 border: 1px solid white;
 background-color: rgba(255,255,255,0.25);
 padding: 5px;
}

</style>

<div class="main-container">
<?php

$database = new PDO('sqlite:form.db');
$query = $database->prepare('select * from form;');
$query->execute();

while($array = $query->fetch(PDO::FETCH_ASSOC)){
 echo "<div class='container'>";
 echo "Name: {$array['firstname']} {$array['middlename']} {$array['lastname']} <br>";
 $gender = ucwords($array['gender']);
 echo "Gender: {$gender} <br>";
 echo "Email: {$array['email']} <br>";

 $subjects = ucwords($array['subjects']);
 $subjects = trim($subjects);
 $subjects = str_replace(' ',', ',$subjects);
 echo "Subjects Taken: {$subjects} <br>";
 echo "</div>";
}

?>
</div>

</body>
</html>