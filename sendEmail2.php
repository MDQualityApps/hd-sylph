<?php
    use PHPMailer\PHPMailer\PHPMailer;

    if (isset($_POST['name']) && isset($_POST['email'])) {
        $name = $_POST['name'];
        $number = $_POST['number'];
        $email = $_POST['email'];
//        $subject = $_POST['subject'];
        $request = $_REQUEST['request'];
        $prefertime = $_REQUEST['prefertime'];
        
        $body = $_POST['body'];


        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "aravindan.mdq@gmail.com"; //enter you email address
        $mail->Password = 'Password@123'; //enter you email password
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        //Email Settings
        $mail->isHTML(true);
  
        $mail->setFrom($email, $name);
        $mail->addAddress("aravindan.mdq@gmail.com"); //enter you email address
        $mail->Subject = ($email);
        $mail->Body = ("NAME:$name<br>Number:$number<br>email:$email<br>REQUEST TYPE:$request<br>prefertime:$prefertime<br>commets:$body ");

        if ($mail->send()) {
            $status = "success";
            $response = "Email is sent!";
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }

        exit(json_encode(array("status" => $status, "response" => $response)));
    }
?>
