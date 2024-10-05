<?php 





$success = "";
// $errors = [];
// validate required
function isRequired($input){
  return empty($input);
}
// validate string 
function isString($input){
  return is_string($input);
}
//validate email
function isEmail($input){
  return filter_var($input , FILTER_VALIDATE_EMAIL);
}
// validate length 
function isLessThan($input , $maxlength){
  $length = strlen($input);
  return ($length <= $maxlength);
}
function minLen($input , $minlen){
  $length = strlen($input);
  return ($length >= $minlen);
}

// function getError(string $key){
//   global $errors;
//   if(isset($errors["$key"]))
//   echo "<span class = 'text-danger'>(".$errors["$key"].")</span> ";
// }
function getError(string $key){
  
  if(isset($_SESSION['error'][$key]))
  echo "<span class = 'text-danger'>(".$_SESSION['error'][$key].")</span> ";

}



