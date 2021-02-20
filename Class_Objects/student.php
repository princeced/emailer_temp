<?php 


if(isset($_POST['name']) && isset($_POST['email'])  && isset($_POST['password'])  && isset($_POST['subject']) && isset($_POST['comment'])){

     $name=$_POST['name'];
     $email=$_POST['email'];
     $password=$_POST['password'];
     $subject=$_POST['subject'];
     $comment=$_POST['comment'];

     $otp = rand(100000,999999);
     

    Class Student {

        public $name;
        public $email;
        public $password;
        public $subject;
        public $comment;


        function __construct($name, $email,$password, $subject,$comment) {
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->subject = $subject;
            $this->comment = $comment;
            

          }

       public function NewRegistation(){

        
        return json_encode(array('name'=>$this->name,'email'=>$this->email,'password'=> $this->password,'subject'=>$this->subject,'comment'=>$this->comment));
       
       }

    }


    $studentReg=new Student($name, $email,$password, $subject,$comment);



    echo $studentReg->NewRegistation();

}
