<?php
include_once "database.php";
$error = [];
$success = false;

if (isset($_POST['send'])) {

    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];
    $Message = $_POST['message'];
    $header = "From : $Name" . "EmailAddress:$Email";
    if (empty($Name)) {
        $error["emptyname"] = "The Name Is Required";
    }
    if (empty($Email)) {
        $error["emptyemail"] = "The Email Is Required";
    }
    if (empty($Phone)) {
        $error["emptyphone"] = "The Phone Is Required";
    }
    if (empty($Message)) {
        $error["emptymessage"] = "The message Is Required";
    }
    if ($con == true) {
        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['message'])) {

            $con->query("insert into `contact` (`name`, `email`, `phone`, `message`) values ('$Name', '$Email', '$Phone', '$Message')");

            mail("gad993813@gmail.com", "contact us", $Message, $header);
            $success = true;
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContactUs Form</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section>
        <div class="header">
            <h1>Contact Us</h1>
        </div>
        <form action="" method="POST">
            <div>
                <i class="fa-solid fa-user"></i>
                <input type="text" placeholder="Enter Your Name" name="name" value="<?php

echo isset($_POST['send']) && !empty($error) ? $Name : "";

?>">
                <?php
if (isset($error['emptyname'])) {
    echo "<div class='empty'>" . $error['emptyname'] . "</div>";
}
?>
            </div>

            <div>
                <i class="fa-solid fa-envelope"></i>
                <input type="Email" placeholder="Enter Your Email" name="email" value="<?php

echo isset($_POST['send']) && !empty($error) ? $Email : "";

?>">

                <?php
if (isset($error['emptyemail'])) {
    echo "<div class='empty'>" . $error['emptyemail'] . "</div>";
}
?>
            </div>
            <div>

                <i class="fa-solid fa-phone"></i>
                <input type="tel" name="phone" required="required" placeholder="Enter phone Number" minlength="11" maxlength="11" value="<?php

echo isset($_POST['send']) && !empty($error) ? $Phone : "";

?>">
                <?php
if (isset($error['emptyphone'])) {
    echo "<div class='empty'>" . $error['emptyphone'] . "</div>";
}
?>

            </div>
            <div>
                <i class="fa-solid fa-comment"></i>
                <textarea name="message">
                <?php
echo isset($_POST['send']) && !empty($error) ? trim($Message) : "";
?>
                </textarea>

                <?php
if (isset($error['emptymessage'])) {
    echo "<div class='empty'>" . $error['emptymessage'] . "</div>";
}
?>
            </div>
            <div class="send">
                <label for="send"> <i class="fa-solid fa-paper-plane"></i></label>
                <input type="submit" value="send" name="send" id="send">
            </div>
            <?php
if ($success == true) {?>

<div class="ss">Data is Successfull to Send</div>

<?php
 header("Refresh:3,url=index.php");
}

?>
        </form>
    </section>
</body>

</html>