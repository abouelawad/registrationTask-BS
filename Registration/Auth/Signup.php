<?php require('../app.php') ?>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<title>signup</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-6 mx-auto my-5">
            <div class="card ">
                <div class="card-header">
                    <h3 class="text-center">signup</h3>

                    <?php 
                    // Decomposing and preparation
                    if(isset($_POST['submit']))
                    {
                        
                        foreach ($_POST as $key => $value) {
                            $$key = prepareInput($value);
                        }
                        // Validation
                         // email : required | string : max:100
                        
                        if(isRequired($name)){
                            $errors['name'] = 'required';
                        
                        }elseif(!isString($name)){
                            $errors['name'] = 'should be string';
                            // echo $errors['email'];
                        }elseif(!isLessThan($name ,80)){
                            $errors['name']='length not more than 80';
                        }

                        if(isRequired($email)){
                            $errors['email'] = 'required';
                        
                        }elseif(!isEmail($email)){
                            $errors['email'] = 'should be Email';
                            // echo $errors['email'];
                        }elseif(!isLessThan($email ,70)){
                            $errors['email']='length not more than 70';
                        }
                        
                         //password : required , string , max:255
                        if(isRequired($password)){
                            $errors['password'] = 'required';
                        }elseif(!isString($password)){
                            $errors['password'] = 'should be string';
                        }elseif(!isLessThan($password ,255)){
                            $errors['password']='length not more than 255';
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
                                echo ' password matches';
                            }else{
                                //redirect to admin login page 
                                $errors['password'] = 'password is incorrect';
                            }
                        }else{
                            $password_hashed = password_hash($password,PASSWORD_DEFAULT) ;
                            // if validation passes 
                           $user = insert('users',"(name, email, password)
                                    VALUES ('$name', '$email', '$password_hashed')");

                                    echo 'user added successfully';
                        }
                    }
                    ?>

                    <div>
                        <form class="border p-5 my-3 " method="POST" action="">
                        <div class="form-group">
                                <label for="name"  class="text-dark ">Name <?php getError( 'name');?></label>
                                <input type="text" name="name" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="email"  class="text-dark ">Email <?php getError('email');?></label>
                                <input type="text" name="email" class="form-control" id="email">
                            </div>
                           
                            <div class="form-group">
                                <label for="password"  class="text-dark ">Password <?php getError('password');?></label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
</body>
</html>
