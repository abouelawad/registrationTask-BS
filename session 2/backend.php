<?php
$users = [
  ['name'=> 'abdo', 'email'=>'a@a.com'],
  ['name'=> 'abou', 'email'=>'a@b.com'],
  ['name'=> 'sayed', 'email'=>'b@b.com'],

];




foreach($users as $user){
  if (in_array($_POST['name'],$user)){
    echo 'found';
    return
  }else{
    
  }
}

// if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
//     foreach($users as $user){
//       if($_POST['name']==$user['name']) {
//         if( $_POST['email']==$user['email']){
//           echo ' welcome ' .$user['name'];
//         }else{
//           echo 'password not correct';
//         }
//       }
//     }
//   }
