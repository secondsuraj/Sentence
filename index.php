<?php
$insert=false;
if(isset($_POST['subject'])){
    
    $server= "localhost";
    $username= "root";
    $password= "";
    $con = mysqli_connect($server,$username,$password);
    if(!$con){
        die("Connection Failed due to" . mysqli_connect_error());
    }

    $emailadd = $_POST['emailadd'];
    $emailadd2="From:pandeysuraj3110@gmail.com";
    $uname = $_POST['uname'];
    $subject = $_POST['subject'];
    $mymessage = $_POST['mymessage'];

    $sql = "INSERT INTO `sentence_database`.`sentence_database` (`emailadd`, `uname`, `subject`, `mymessage`, `dt`) VALUES ('$emailadd', '$uname', '$subject', '$mymessage', current_timestamp());";
    //  echo $sql;

    if($con->query($sql) == true){
        // echo "Successfully inserted";
        mail($uname,$subject,$mymessage,$emailadd2);
        $insert=true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";  
    }
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sentence</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" media="screen and (max-width: 900px)" href="css/phone.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/annyang/2.6.0/annyang.min.js"></script>
    <script src="js/index.js"></script>
   
<body>

    <nav id="navbar">
        <div id="logo">
            <img src="css/logo.png" alt="">
        </div>
        <ul>
            <li class="item"><a href="#home">Services</a></li>
            <li class="item"><a href="#services-container">Downloads</a></li>
            <li class="item"><a href="#client-section">About</a></li>
            <li class="item"><a href="#contact">Contact us</a></li>
        </ul>
        <div id="clockcontainer">
            <div id="hour"></div>
            <div id="minute"></div>
            <div id="second"></div>
        </div>
    </nav>
    

    <section id="home">
        <div id="box1">
            <h2 class="h-primary center">Welcome to Sentence</h2>
        </div>
        <div id="box2">
            <form action="index.php" id="form-group" method="POST">
                <h1 class="h-secondary">Please Speak</h1>
                <input type="email" id="emailadd" name = "emailadd" placeholder="Write my Email Address" />
                <input type="email" id="uname" name="uname" placeholder="Write Receiver's Email Address" />
                <input type="text" id="subject" name="subject" placeholder="Write the Subject" />
                <textarea id="mymessage" name="mymessage" placeholder="Write the Message"></textarea>
                <?php
                if($insert==true){
                     echo "<p class='submitmsg1'>Thanks for using our service</p>";}
                ?> 
                <style>
                submitmsg1{
                    background-color: transparent;
                }
                </style>
                <div class="center">
                    <button class = "btn" >Send it</button>
                </div>
                
            </form>
        </div>
    </section>
    
    
    <!-- <footer>
        <div class="center">
            <div class="footitem">
                <a href="">Made by Suraj</a>
            </div>
        </div>
    </footer> -->
    
</body>

</html>