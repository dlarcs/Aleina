<?php

  class ClassRegister {
   public function  handleRegister(){
     $input = file_get_contents('php://input');
     $data = json_decode($input,true);
alert("holaaa");
     echo json_encode("lo hicimos");exit;
     echo json_encode($data['name']."  ".$data["email"]."  ".$data['password']);

     switch ($data['action']) {
       case 'register':
           $this->register($data);
         break;


       default:
         // code...
         break;
     }
   }
   private function register($data){
     echo json_encode("lo hicimos otra vez");
   }


  }

echo json_encode("hola");
  $registerClass = new ClassRegister();
  $registerClass -> handleRegister();
 ?>
