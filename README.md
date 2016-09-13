# PHP-APPLICATIF-PDO-BINDPARAM
Project Coding Academy - Epitech

Ex01:
Write  a function my_get_args that takes as parameter a variable number of arguments and returns these arguments in an array

Ex02 : 
Write  a  function my_print_users  that  takes  as  parameter a PDO  instance  and a variable  number  of integers.
Each integer corresponds to an identifier "id" in the "users" table of the database given to you.
The  function  must  display  the  user name  ("name"  field)  which corresponds  to  each  id  passed  as parameter followed by "\n".
The function must return true if some results have been found and false otherwise.
Display all the user names while the id is an integer. When the parameter is not an integer, raise the exception "Invalid id given"

Ex04 :
Write a function my_password_hash that takes as parameter a password in plain-text and returns an  array containing the hashed 
password in MD5 as well as the "salt" used for hashing. The salt must be different on each call.
Then  write  a  function  my_password_verify  that  takes  as  parameter  a  password  in  plain-text,  a  salt, 
and  a  hashed  password.  This  function  must  return  true  or  false,  depending  on  whether  the  hashed 
password corresponds to the plain-text password with the associated salt or not.


Ex05 :
Write  a  function  my_password_change  that  takes  as  parameter  a  PDO  instance,  an  email  and  a 
password,  and  modifies  the  user  associated  with  the  email ("email"  field)  in  the  database  by 
changing  his  password  ("password"  field).  You  will  have  to  use  the  function  password_hash  of  PHP 
and let it manage the salt with the default algorithm. The password recorded in the database has to 
be the result of hashing and not the password in plain-text. The password will be checked with 
the function PHP 5.5 password_verify();
Your  function  must  raise  an  exception  if  the  password  passed  as  parameter  is  empty  or  if  the  user 
does not exist.Use Exception() without message

Ex06 :FINALLY
Write  a  function  my_change_user taking  as  parameter  a  PDO  instance  and  a  variable  number  of
usernames ("name" field) in the "users" table.
For  each  name  passed  as  parameter,  modify  the  corresponding  name  in  the  database  so  that  it follows the same 
logic as the following example: "toto" => "Toto42" (first letter in uppercase, the rest in lowercase, and 42 added at the end).
If a user passed as parameter does not exist in the database, you must raise a PDO Exception with the message "User not found".
The  function  must  return  an  array  containing  the  modified  names,  sorted  by  number  of  characters and then by alphabetical order.
In all cases, the function must display "Good luck with the user DB! "followed by "\n".
