<?php

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $firstname = htmlspecialchars($_POST['firstname']);
    echo "First Name: {$firstname}<br/>";
    
    $middlename = htmlspecialchars($_POST['middlename']);
    echo "Middle Name: {$middlename}<br/>";
    
    $lastname = htmlspecialchars($_POST['lastname']);
    echo "Last Name: {$lastname}<br/>";
    
    $sex = htmlspecialchars($_POST['sex']);
    echo "Sex: {$sex}<br/>";
    
    $subjects = [];
    echo "Subjects:<br/>";
    
    for($i=0; $i<count($_POST['subjects']); $i++){
        array_push($subjects,htmlspecialchars($_POST['subjects'][$i]));
        echo "{$subjects[$i]}<br/>";
    }
    
    $email = htmlspecialchars($_POST['email']);
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