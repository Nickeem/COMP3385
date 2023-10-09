<?php

function isEmailValid($email) : bool 
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isPasswordValid($password) : bool {
    // valid criteria
    $is_10_characters = false;
    $contains_upper = false;
    $contains_digit = false;
    if (strlen($password) > 9) 
    {
       $is_10_characters = true;
    }
    for ($i = 0; $i < strlen($password); $i++){
       if (ctype_upper($password[$i])) 
       {
          $contains_upper = true;
       }
       if (is_numeric($password[$i]))
       {
          $contains_digit = true;
       }
   }
    return $is_10_characters && $contains_upper && $contains_digit;
}


$email = "valid_email@hotmail.com";
$password = "Password12345";
if(isPasswordValid($password))
{
    echo "Valid password";
}
else 
{
    echo "Invalid email";
}