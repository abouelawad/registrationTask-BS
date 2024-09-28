<?php 


// if(isset($_POST['submit']))
//                     {
//                         foreach ($_POST as $key => $value) {
//                             $$key = prepareInput($value);
//                         }
//                         // Validation
//                          // email : required | string : max:100
                        
//                         if(isRequired($email)){
//                             $errors['email'] = 'required';
                        
//                         }elseif(!isEmail($email)){
//                             $errors['email'] = 'should be Email';
//                             // echo $errors['email'];
//                         }elseif(!isLessThan($email ,70)){
//                             $errors['email']='length not more than 70';
//                         }
                        
//                          //password : required , string , max:255
//                         if(isRequired($password)){
//                             $errors['password'] = 'required';
//                         }elseif(!isString($password)){
//                             $errors['password'] = 'should be string';
//                         }elseif(!isLessThan($password ,255)){
//                             $errors['password']='length not more than 255';
//                         }
                    
//                          // if validation passes 
//                         $user = getOne('users',"email = '$email'");
                
//                         if (! empty($user)){
//                             $passwordMatches = password_verify($password , $user['password']);
                        
//                             if($passwordMatches)
//                             {
//                                 //store admin in session
                            
//                                 setSession('id' , $user['id']);
//                                 setSession('name' , $user['name']);
//                                 setSession('email' , $user['email']);
//                                 // redirect to admin/index.php 
//                                 redirect("users/index.php");
//                                 echo ' password matches';
//                             }else{
//                                 //redirect to admin login page 
//                                 $errors['password'] = 'password is incorrect';
//                             }
//                         }else{
//                             $errors['email'] = 'you are not auser';
//                         }
//                     }
                    ?>

<?php
$success = "";
$errors = [];
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

function getError(string $key){
  global $errors;
  if(isset($errors["$key"]))
  echo "<span class = 'text-danger'>(".$errors["$key"].")</span> ";
}


