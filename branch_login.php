<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    
    <!-- <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap-4.3.1-dist/js/bootstrap.js"></script> -->
    <link rel="stylesheet" href="style1.css">

</head>
<body>
    <center>
        <div>
        <h3>Admin Login Page</h3>
        <br>
        <form action="" method="post" class ="a2"> <br>
        
            Company id:<input type="text" name= "username" required>
             <br>
            Password:<input type="password" name= "password" required>       
        <br>
            <input type="Submit" name="submit"><br>
            <?php
            session_start();
            $email="";
            $name = "";
            if(isset($_POST['submit'])){
            $conn =mysqli_connect("localhost","root","");
            $db = mysqli_select_db($conn,"ebill");
            $query = "select * from company where com_id = '$_POST[username]'";
            $query_run = mysqli_query($conn,$query);
            while($row = mysqli_fetch_assoc($query_run)){
            if($row['com_id'] == $_POST['username']){
                if($row['password'] == $_POST['password']){
                    $_SESSION['username'] = $row['com_id'];
                    header("Location: admin_dashboard.php");
                }
                else{
                    echo "wrong password";
                }
            }
            else{
                echo "wrong email";
            }
        }
    }
       ?>
        
        </form>
    </div>
       
    </center>
    
</body>
</html>