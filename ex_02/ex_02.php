<?php
/*
@Author: crosnier
@Date:   2016-06-30T10:12:40+02:00
@Email:  Debellaistre@gmail.com/GitHub:crosnierb
@Last modified by:   crosnier
@Last modified time: 2016-06-30T19:55:30+02:00
*/

const ERROR_LOG_FILE = "errors.log";

function connect_db($host, $username, $passwd, $port, $db){
  if ((!$host)||(!$username)||(!$port)||(!$db)){
      echo "Bad params! Usage: php connect_db.php host username password port db\n";
  }
  else {
      $error_log_file = ERROR_LOG_FILE;
      try {
        $dbh = new PDO('mysql:host='.$host.';port='.$port.';dbname='.$db, $username, $passwd);
        echo "Connection to DB successful\n";
        return $dbh;
      } catch (PDOException $e) {
        echo "Error connection to DB\n";
        echo "PDO ERROR: ".$e->getMessage()." storage in ".$error_log_file."\n";
        file_put_contents($error_log_file, $e->getMessage()."\n", FILE_APPEND);
      }
  }
}

function my_print_users($bdd, ...$param){
    $i = 0;
    $bool = true;
    $nb_param = count($param);
    if ($nb_param > 0){
            while ($i < $nb_param){
                    if ((is_int($param[$i])) == true){
                            $sql = $bdd->prepare("SELECT name FROM users WHERE id = :id");
                            $sql->bindParam(":id", $param[$i], PDO::PARAM_INT);
                            $sql->execute();
                            $result = $sql->fetch();
                            if (!$result) {
                              throw new Exception("Invalid id given");
                            } else (!$result) ? ($bool = false) : $bool;
                            echo $result["name"]."\n";
                        $sql = 0;
                    $i++;
                }
        }
      } else{
            return false;
        }
        return (!$bool) ? false : true;
}

my_print_users(connect_db('localhost', 'root', "", 3050, "gecko"), 1, 2, 6, 4);
?>
