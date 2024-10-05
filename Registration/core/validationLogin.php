<?php 
require_once '../app.php';

// Decomposing and preparation
if( $_SERVER['REQUEST_METHOD']==='POST')
{

    foreach ($_POST as $key => $value) {
        $$key = prepareInput($value);
    }
    // Validation
    //Name : required |string |min 3
    if(isset($_POST['name'])){
        if(isRequired($name)){
                setError('name','required') ;
        }elseif(!isString($name)){
                setError('name','should be string') ;
        }elseif(!isLessThan($name ,50)){
                setError('name','length not more than 50');
        }elseif(!minLen($name,3)){
            setError('name','name must be more than 3');
        }
    }

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
       return redirect('auth/register.php');
    }

   
     // if validation passes 
    $user = getOne('users',"email = '$email'");

    if(empty($user) && isset($_POST['name'])){
        $password_hashed = password_hash($password,PASSWORD_DEFAULT) ;
        // if validation passes 
       $user =  insertData('users',['name'=>$name, 'email'=>$email, 'password'=>$password_hashed]);
    }
    
    if (! empty($user)){
        $passwordMatches = password_verify($password , $user['password']);
        if($passwordMatches)
        {
            //store admin in session
        
            setSession('id' , $user['id']);
            setSession('name' , $user['name']);
            setSession('email' , $user['email']);
            
            // redirect to users/index.php 
            redirect("users/index.php");
            
        }else{
            
            setError('password', 'password is incorrect');
            
            //redirect to admin login page 
        }
    }else{


        setError('email', 'you are not a user');

    }

    if(!empty($_SESSION['error'])){
       redirect('auth/register.php');




    }
}

