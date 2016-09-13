<?php
/*
@Author: crosnier
@Date:   2016-06-30T14:16:16+02:00
@Email:  Debellaistre@gmail.com/GitHub:crosnierb
@Last modified by:   crosnier
@Last modified time: 2016-06-30T17:30:10+02:00
*/

const ERROR_LOG_FILE = "errors.log";

function connect_db($host, $username, $passwd, $port, $db){
  $email = "lic@loic.com";
  $new_password = "12345test";
  if ((!$host)||(!$username)||(!$port)||(!$db)){
    echo "Bad params! Usage: php connect_db.php host username password port db\n";
  }
  else {
    $error_log_file = ERROR_LOG_FILE;
    try {
      $dbh = new PDO('mysql:host='.$host.';port='.$port.';dbname='.$db, $username, $passwd);
      echo "Connection to DB successful\n";
      my_password_change($dbh, $email, $new_password);
      #return $dbh;
    } catch (Exception $e) {
      echo "Error\n";
      echo "PROGRAMME ERROR: ".$e->getMessage()." storage in ".$error_log_file."\n";
      file_put_contents($error_log_file, $e->getMessage()."\n", FILE_APPEND);
    }
  }
}

function my_password_change($bdd, $email, $new_password){
    if (($email) && ($new_password)){
        $hash = password_hash($new_password, PASSWORD_DEFAULT);
        $sqlUpdate = $bdd->prepare("UPDATE users SET password = :password WHERE email = :email");
        $sqlUpdate->bindParam(":email", $email, PDO::PARAM_STR, 255);
        $sqlUpdate->bindParam(":password", $hash, PDO::PARAM_STR, 255);
        $sqlUpdate->execute();
        if ($sqlUpdate->rowCount() === 0){
          throw new Exception();
        }
    } else {
      throw new Exception();
    }
}

connect_db('localhost', 'root', "", 3050, "gecko");
?>
