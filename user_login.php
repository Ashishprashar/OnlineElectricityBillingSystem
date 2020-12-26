<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumer Login</title>
    
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap-4.3.1-dist/js/bootstrap.js"></script>
    <style>
    *{
        background-color:rgb(75, 69, 69);
    }
    #header{
    height:10%;
    width:100%;
    top:0%;
    background-color:black;
    position:fixed;
    color:white;
    text-align:center;
    padding-top:10px;
}

h4{
    background-color:black;

}


    </style>
</head>
<body>
    <center>
    <div id="header"> 
        <h4> Online electricity Billing management System&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4> 
      
    
    
    </div>
             <br>
        <form action="" method="post" style="margin-top:20%;"> <br>
        <div>
            <h4 style="background-color:rgb(75, 69, 69);">Consumer ID:<input type="text" name= "bill" placeholder="Enter Consumer ID" required> </h4><br>
            </div> <br>
            <input type="submit" name="submit"><br>
        </form>
        <?php
            if(isset($_POST['submit'])){
        $conn =mysqli_connect("localhost","root","");
        $db = mysqli_select_db($conn,"ebill");
        $query = "select * from `consumer` where `c_id` = '$_POST[bill]'";
        $query_run = mysqli_query($conn,$query);
        while($row = mysqli_fetch_assoc($query_run)){
            if($row['c_id'] == $_POST['bill']){
                session_start();
                $_SESSION['c_id'] = $row['c_id'];
                    header("Location: bill_detail.php");
            }
            else{
                echo "<br>Bill doesn't exist";
            }
        }
    }
       ?>

    
    </center>
    
</body>
</html>