<?php
/*
@Author: crosnier
@Date:   2016-06-30T10:12:40+02:00
@Email:  Debellaistre@gmail.com/GitHub:crosnierb
@Last modified by:   crosnier
@Last modified time: 2016-06-30T14:14:42+02:00
*/

function my_password_verify($pwd, $salt, $hash)
{
      $hashVerif = md5(crypt($pwd, $salt));
      $bool = (strcmp($hash, $hashVerif) != 0) ? false : true;
      return $bool;
}

function my_password_hash($pwd){
    $salt = md5(uniqid(rand(), false));
    $hash = md5(crypt($pwd, $salt));
    $bool = my_password_verify($pwd, $salt, $hash);
    $array = (!$bool) ? (my_password_hash($pwd)) : (array("hash" => $hash, "salt" => $salt));
    return $array;
}

var_dump(my_password_hash("12345YYYRRTT"));
?>
