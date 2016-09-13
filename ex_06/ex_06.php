<?php
/*
@Author: crosnier
@Date:   2016-06-30T19:23:13+02:00
@Email:  Debellaistre@gmail.com/GitHub:crosnierb
@Last modified by:   crosnier
@Last modified time: 2016-06-30T19:27:29+02:00
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
      my_change_user($dbh, "hugo", "martin", "loic");
      #return $dbh;
    } catch (Exception $e) {
      echo "Error\n";
      echo "PROGRAMME ERROR: ".$e->getMessage()." storage in ".$error_log_file."\n";
      file_put_contents($error_log_file, $e->getMessage()."\n", FILE_APPEND);
    }
  }
}

function my_change_user($bdd, ...$names){
  if ($names > 0){
    for($i = 0; $i < sizeof($names); $i++){
      $size =  sizeof($names[$i])
      $sqlUpdate = $bdd->prepare("UPDATE users SET name = RIGHT(LEFT(CONCAT(name, '42'), 1), :length)  WHERE name = :name");
      $sqlUpdate->bindParam(":name", $names[$i], PDO::PARAM_STR, 255);
      $sqlUpdate->bindParam(":length", $size);
      $sqlUpdate->execute();
      }
      if ($sqlUpdate->rowCount() === 0){
        throw new Exception("User not found");
      }
  } else {
    echo  "Good luck with the user DB!\n";
  }
}

connect_db('localhost', 'root', "", 3050, "gecko");
 ?>
