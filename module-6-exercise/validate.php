<?php

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $firstname = filter_var($_POST['firstname'],FILTER_SANITIZE_STRING);
    echo "First Name: {$firstname}<br/>";
    
    $middlename = filter_var($_POST['middlename'],FILTER_SANITIZE_STRING);
    echo "Middle Name: {$middlename}<br/>";
    
    $lastname = filter_var($_POST['lastname'],FILTER_SANITIZE_STRING);
    echo "Last Name: {$lastname}<br/>";
    
    $sex = filter_var($_POST['sex'],FILTER_SANITIZE_STRING);
    echo "Sex: {$sex}<br/>";
    
    $subjects = [];
    echo "Subjects:<br/>";
    
    for($i=0; $i<count($_POST['subjects']); $i++){
        array_push($subjects,filter_var($_POST['subjects'][$i],FILTER_SANITIZE_STRING));
        echo "{$subjects[$i]}<br/>";
    }
    
    $email = filter_var($_POST['email'],FILTER_SANITIZE_STRING);
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo '(Valid email) ';
  }
    else{
        echo '(Invalid) ';
    }
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
}
else{
    echo 'Open on the html form.';
}

?>