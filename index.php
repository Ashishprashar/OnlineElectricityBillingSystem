<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
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
<div style="margin-top:20%;">

        <br>
        <form action="" method="post" calss="a1">
            
            <input type="submit" name = "admin_login" value = "Company Login" > 
            
        </form>
        <br><br>
        <form action="" method="post">
        <input type="submit" name = "user_login" value = "Check Your Bill" >

        </form>        
        <?php
        if(isset($_POST['admin_login'])){
            header("Location: admin_login.php");
            
        }
        if(isset($_POST['user_login'])){
            header("Location: user_login.php");
            
        }
        ?>
        </div>
    </center>
    
</body>
</html>