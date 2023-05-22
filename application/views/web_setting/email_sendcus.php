<?php

$mail = $this->phpmailer_lib->load();
    if(isset($_POST['submit_btn'])){

        $to = $_POST['to_email'];
        $cc = $_POST['cc_email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $created = $this->session->userdata('user_id');

            // print_r($created); die();

        // echo '<pre>';
        // print_r($_POST); die;
        // echo '</pre>';

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
            $mail->isSMTP();                                           
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = 'absolutegranitestones@gmail.com';              
            $mail->Password   = 'qpiwamptiigcpodl';                            
            $mail->SMTPSecure = 'tls';            
            $mail->Port       = 587;                                   
            $mail->setFrom($to, 'Mailer');
            $mail->addAddress($to, 'Mailer');     //Add a recipient
            $mail->addCC($cc);

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = "<b>Message:</b>  $message "."<br>";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            // echo 'Message has been sent';
            echo "<script>alert('Email Send Successfull')</script>";
            $conn = mysqli_connect('localhost', 'root', '', 'stockeaic_test');
            $sql = "INSERT INTO `email_data`(`to_email`, `cc_email`, `subject`, `message`, `created_by`) VALUES ('".$to."', '".$cc."', '".$subject."', '".$message."', '".$created."')";
            $result = mysqli_query($conn, $sql);    
                // if($result){
                //    echo "<script>alert('Inserted Success')</script>";
                // }else{
                //     echo "<script>alert('Inserted Failed !!!')</script>";
                // }
            // echo "<script>window.location.href='select_quote.html'</script>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
       
    }

?> 

<script type="text/javascript">
   history.back();
</script>  