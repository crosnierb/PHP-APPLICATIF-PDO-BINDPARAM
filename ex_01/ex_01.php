<?php
/*
@Author: crosnier
@Date:   2016-06-30T10:12:40+02:00
@Email:  Debellaistre@gmail.com/GitHub:crosnierb
@Last modified by:   crosnier
@Last modified time: 2016-06-30T19:34:42+02:00
*/

function my_get_args(...$param)
{
    return $param;
}
var_dump(my_get_args("test1", "test2", 1 , 1, true));
?>
