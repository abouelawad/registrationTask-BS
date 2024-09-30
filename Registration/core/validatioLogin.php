<?php 
require_once '../app.php';

// Decomposing and preparation
if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD']==='POST')
{
    foreach ($_POST as $key => $value) {
        $$key = prepareInput($value);
    }
    // Validation
     // email : required | string : max:100
    
    if(isRequired($email)){
         setError('email','required');
    
    }elseif(!isEmail($email)){
         setError('email','should be Email');
        // echo $_SESSION['error']['email'];
    }elseif(!isLessThan($email ,30)){
         setError('email','length not more than 30');
    }
    
     //password : required , string , max:255
    if(isRequired($password)){
         setError('password','required') ;
    }elseif(!isString($password)){
         setError('password','should be string') ;
    }elseif(!isLessThan($password ,15)){
         setError('password','length not more than 15');
    }
   

    if(!empty($_SESSION['error'])){
       return redirect('auth/login.php');
    }
     // if validation passes 
    $user = getOne('users',"email = '$email'");
    
    if (! empty($user)){
        $passwordMatches = password_verify($password , $user['password']);
        if($passwordMatches)
        {
            //store admin in session
        
            setSession('id' , $user['id']);
            setSession('name' , $user['name']);
            setSession('email' , $user['email']);
            
            // redirect to admin/index.php 
            redirect("users/index.php");
            
        }else{
            
            //redirect to admin login page 
            setError('password', 'password is incorrect');
        }
    }else{
        
      setError('email', 'you are not a user');
        
    }

    if(!empty($_SESSION['error'])){
       redirect('auth/login.php');
    }
}


