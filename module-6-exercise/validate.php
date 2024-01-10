<html>
<body>
<style>
th,td{
 border: 1px solid black;
}
</style>

<?php

function goBack(){
   header("Location: form.php?message=Invalid input");
}


function validate($input) {
    $pattern = '/[\'";!@#$%^&*()\-_=+{}|:,<.>?]/';

    if(empty($input) || preg_match($pattern, $input)) {
        goBack();
    }
}


if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $firstname = filter_var($_POST['firstname'],FILTER_SANITIZE_STRING);
    validate($firstname);
    $middlename = filter_var($_POST['middlename'],FILTER_SANITIZE_STRING);
    validate($middlename);
    $lastname = filter_var($_POST['lastname'],FILTER_SANITIZE_STRING);
    validate($lastname);
    $sex = filter_var($_POST['sex'],FILTER_SANITIZE_STRING);
    $subjects = [];
    
    for($i=0; $i<count($_POST['subjects']); $i++){
        array_push($subjects,filter_var($_POST['subjects'][$i],FILTER_SANITIZE_STRING));
        validate($subjects[$i]);
    }
    
    $email = filter_var($_POST['email'],FILTER_SANITIZE_STRING);
    
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        goBack();
    }
    
    echo "First Name: {$firstname}<br/>";
    echo "Middle Name: {$middlename}<br/>";
    echo "Last Name: {$lastname}<br/>";
    echo "Sex: {$sex}<br/>";
    echo "Subjects:".implode(', ',$subjects)."<br/>";
    echo "Email: {$email}<br/>";
    
    
    echo "<hr>CSV Format:<br/>
          firstname,{$firstname}<br/>
          middlename,{$middlename}<br/>
          lastname,{$lastname}<br/>
          email,{$email}<br/>
          sex,{$sex}<br/>
          subjects,".implode(",",$subjects);
    
    echo "<hr>Table Format:<br>
          <table>
           <tr>
            <th>firstname</th>
            <th>middlename</th>
            <th>lastname</th>
            <th>email</th>
            <th>sex</th>
            <th>subjects</th>
           </tr>
            <td>{$firstname}</td>
            <td>{$middlename}</td>
            <td>{$lastname}</td>
            <td>{$email}</td>
            <td>{$sex}</td>
            <td>".implode(",", $subjects)."</td>
           </tr>
          </table>";
        
    $file = fopen('output.csv','w');
    $csv = array(
        array('firstname','middlename','lastname','email','sex','subjects'),
        array($firstname,$middlename,$lastname,$email,$sex,implode(',',$subjects))
    );
    
    foreach ($csv as $line) {
     fputcsv($file, $line);
    }
    fclose($file);
}
else{
    echo 'Open on the html form.';
}

?>
</body>
</html>