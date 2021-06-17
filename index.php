<?php
$insert = FALSE;
if (isset($_POST['Name'])) {
    //set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "goa_trip";
    //create a connection
    $con = mysqli_connect($server, $username, $password, $database) or die(mysqli_error($con));
    //check for connection success
    if (!$con) {
        die("Connection Error" . mysqli_connect_error());
    }

    //collect post variables
    $Name = $_POST['Name'];
    $Age = $_POST['Age'];
    $Gender = $_POST['Gender'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];
    $others = $_POST['others'];

    $sql_query = "INSERT INTO `goa_trip`.`trip` (`Name`, `Age`, `Gender`, `Phone`, `Email`, `others`, `Registration_time`) VALUES
    ('$Name', '$Age', '$Gender', '$Phone', '$Email', '$others', current_timestamp());";
    // echo $sql_query;

    //exicute the query
    if ($con->query($sql_query) == TRUE) {
        //flag for successfull insertion
        $insert = TRUE;
    } else {
        echo " ERROR: $sql_query <br> $con->error";
    }
    //close the database connection
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Welcome to Goa Travel Form</title>
</head>

<body onload='document.form1.text1.focus()'>
    <img class="bg" src="img/GOA3.jpg" alt="NIT DURGAPUR">
    <!-- <img class="LOGO" src="img/download.png" alt="NIT DURGAPUR"> -->
    <div class="container">
        <h1 class="display">Welcome to NIT DURGAPUR GOA trip form</h1>
        <p class="lead" style="font-weight: bold;font-size: 18px;">Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if ($insert == true) {
            echo "<p class='submitMsg'> Thanks for submitting this form and we are happy to see you joining us for GOA trip </p>";
        }
        ?>
        <form action="index.php" method="post" onSubmit="return formValidation();">
            <div class="form-group">
                <input type="text" name="Name" id="Name" placeholder="Enter your Name" size="50" required>
            </div>
            <div class="form-group">
                <input type="number" name="Age" id="Age" placeholder="Enter your Age" max ="25" min="18">
            </div>
            <div class="form-group">
                <input type="text" name="Gender" id="Gender" placeholder="Enter your Gender" required>
            </div>
            <div class="form-group">
                <input type="tel" name="Phone" id="Phone" placeholder="Enter your phone number" required>
            </div>
            <div class="form-group">
                <input type="email" name="Email" id="Email" placeholder="Enter your Email id" required>
            </div>
            <div class="form-group">
                <textarea name="others" id="others" cols="30" rows="10" placeholder="Enter your Message Here..."></textarea>
            </div>
            <button class="btn" onclick="ValidateEmail(document.form1.text1)">Submit</button>
        </form>
    </div>
    <footer>
        <center>
            <h3>Developed By : Anupam Dey</h3>
            <h4>Copyright &copy; 2021 Anupam Dey</h4>
        </center>
    </footer>
    <script src="js/script.js"></script>
</body>
</html>
