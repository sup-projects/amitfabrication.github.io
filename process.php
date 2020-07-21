<?php

include_once('userinfo.php');

if(isset($_POST['submit']))
    
{
    
            $name=mysqli_real_escape_string($con,$_POST['name']);       
            $email=mysqli_real_escape_string($con,$_POST['email']); 
            $mobile=mysqli_real_escape_string($con,$_POST['mobile']);  
            $comments=mysqli_real_escape_string($con,$_POST['comments']);
    
        
    
    
         (mysqli_query($con,"insert into userdata2 (Name,Email,Mobile,Comments) values('$name','$email','$mobile','$comments')"));
    
        {
            
            
            $html="<table><tr><td>Name:</td><td>$name</td></tr>
            <tr><td>Email:</td><td>$email</td></tr>
            <tr><td>Mobile:</td><td>$mobile</td></tr>
            <tr><td>Comments:</td><td>$comments</td></tr></table>
            ";
                
    
        include('smtp/PHPMailerAutoload.php'); 
           $mail=new PHPMailer(true); 
            $mail->isSMTP();
            $mail->Host="smtp.gmail.com";
            $mail->port=587;
            $mail->SMTPSecure="tls";
            $mail->SMTPAuth=true;
            $mail->Username="amitfabrication0914@gmail.com";
            $mail->Password="Ashriya@0914";
            $mail->SetFrom("amitfabrication0914@gmail.com");
            $mail->addAddress("amitfabrication0914@gmail.com");
            $mail->IsHTML(true);
            $mail->Subject="Costomer Details:";
            $mail->Body=$html;
        $mail->SMTPoptions=array('ssl'=>array('verify_peer'=>false,'varify_peer_name'=>false,'allow_self_signed'=>false));
            
           if($mail->send()){
                        
                        
               header('location:index.php');
           }
           else{
               echo "Usend";
           }
            
        }
                             
                                         
}
    else
    {
        echo "Fill the data";
    }

                                 

?>
