<?php
$insert = false;
if(isset($_POST['name'])){
    $server ="localhost"; 
    $username ="root";
    $password ="";

    $con = mysqli_connect($server,$username,$password);
    if(!$con)
    {
        die("connection to this database failed due to".mysqli_connect_error());
    }
    // echo "Success connecting to db";

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];

    $sql =" INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `phone`, `email`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$phone', '$email', 'desc', current_timestamp());";
    // echo $sql;

    if($con->query($sql) == true){
        // echo "Successfully Inserted";
        $insert=true;
    }
    else {
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Welcome to Travel Form</title>
</head>
<body>
    <img class="bg" src="bg.jpg" alt="IIt Kharagpur">
    <div class="container">
        <h1>Welcone to IIT Kharagpur US Trip Form</h1>
        <p class="msg">Enter Your Details and Submit This Form To Confirm Your Participation in the Trip</p>
<?php
    if($insert == true){
        echo '<p class="submitMsg">Thanks for submiting your form. We are happy to see you joining us for the US Trip</p> ';
    }
?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone">
            <input type="email" name="email" id="email" placeholder="Enter Your Email">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any Other information Here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>



