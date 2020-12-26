<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Dashboard</title>
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap-4.3.1-dist/js/bootstrap.js"></script> 
    
    <style type="text/css">
    *{
        background-color: rgb(75, 69, 69);
    }
    .in{
        width:30%;
        border-top: 0;
    border-left: 0;
    border-right: 0;
    border-block-color: initial;
        color:white;
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
#left_side{
    height:75%;
    width:15%;
    top:20%;
    margin:10px;
    position:fixed;
    
}
#right_side{
    height:75%;
    width:80%;
    position:fixed;
    left:17%;
    top:21%;
    color:red;
    border:solid 4px black;
    padding-top:40px;
}
form{
    background-color:whitesmoke:
}

#logout{
    padding:0%;

    text-align:right;
    padding-right:20px;
    background-color:black;
    padding-bottom:20px;
}
.g{
    background-color:rgb(75, 69, 69);
    color:black;
    text-align:center;
}
    </style>
    <?php
    session_start();
    $conn =mysqli_connect("localhost","root","");
            $db = mysqli_select_db($conn,"ebill");
    ?>
</head>
<body>
    <div id="header"> 
        <h4> Online electricity Billing management System&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4> 
      
    
    <div id="logout"> Company Id: <?php echo $_SESSION['username']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="logout.php" id="logout">Logout</a>
    </div>
    </div> 
    <div id ="left_side">
        <form action="" method="post">

            <table>
            <tr>
                    <td>
                        <input type="submit"  name="branch_login" value="Branch Login" onclick="myFunction()">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit"  name="add_branch" value="Add New Branch" onclick="myFunction()">
                    </td>
                </tr>
               
                <tr>
                    <td>
                        <input type="submit" name="delete_branch" value="Delete Branch" onclick="myFunction()">
                    </td>
                </tr>
               
                <tr>
                    <td>
                        <input type="submit" name="list" value="Branch List" onclick="myFunction()">
                    </td>
                </tr>
                
            </table>
        </form>
    </div>
    <div id ="right_side" style="overflow:auto;">
    <div id ="demo" style="overflow:auto;">
    
                     
     </form>
     <?php

        if(isset($_POST['add_branch'])){
            ?>
        <h4 class ="g">enter details</h4>
                <form action="" method="post" class ="g">
                   <input type="text" name = "branch_name" placeholder="enter the Branch Name" class="in" >  <br> <br>
                   <input type="text" name = "region" placeholder="enter the region"  class="in"> <br> <br>
                   <input type="text" name = "branch_password" placeholder="enter the Branch password"  class="in">  <br> <br>
                   <input type="text" name = "branch_id" placeholder="enter the Branch id"  class="in"><br><br>
                   <input type="text" name = "rate" placeholder="enter the Rate/units"  class="in"><br><br>
                   <input type="submit" name = "adding_new_branch" >
                    </form>
        
            <?php
        }        
        else
        if(isset($_POST['delete_branch'])){
            ?>
        <h4 class ="g">enter details</h4>
                <form action="" method="post" class ="g">
                   <input type="text" name = "delete_b" placeholder="enter the Branch Id"  class="in">  <br>
                   <br>
                   <input type="submit" name = "delete_branch_by_id" >
                    </form>
        
            <?php
        }else        
        if(isset($_POST['list'])){
            $com_id=$_SESSION['username'];
            $query ="SELECT * FROM `supply_branch` where `com_id` = $com_id";
            $query_run = mysqli_query($conn,$query);
            while($row = mysqli_fetch_assoc($query_run) ){
                ?>
        
        
        <table class ="g">
                    <tr>
                        <td>
                            <b >&nbsp;&nbsp;&nbsp;&nbsp;Branch Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                        </td>
                        <td>
                            <input  type="text" style="color:white; border:0;" value=<?php echo $row['name']?> disabled>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                            <b >&nbsp;&nbsp;&nbsp;&nbsp;Region:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                        </td>
                        <td>
                            <input  type="text" style="color:white; border:0;" value=<?php echo $row['region']?> disabled>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                            <b >&nbsp;&nbsp;&nbsp;&nbsp;Rate:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                        </td>
                        <td>
                            <input  type="text" style="color:white; border:0;" value=<?php echo $row['rate']?> disabled>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                            <b >&nbsp;&nbsp;&nbsp;&nbsp;Branch id:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                        </td>
                        <td>
                            <input  type="text" style="color:white; border:0;" value=<?php echo $row['b_id']?> disabled>
                        </td>
                        
                    </tr>
                   
        </table>
                
        <br>
        <br>    
            <?php
            }

        }
        else
        {
            ?>
        
                <form action="" method="post" class ="g">
                   Branch ID&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name = "branch_login_id" placeholder="enter the Branch Id" class="in">  <br> <br>
                   Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name = "branch_login_password" placeholder="enter password" class="in"> <br> <br>
                   <input type="submit" name = "branch_login_button" value ="login">
                   <?php
   
                   ?>                   
                    </form>
        
            <?php
        }
        if(isset($_POST['branch_login_button'])){
            $branch_id = $_POST['branch_login_id'];
            $branch_password =$_POST['branch_login_password'];
            $query = "select * from supply_branch where b_id = $branch_id";
            $query_run = mysqli_query($conn,$query);
            while($row = mysqli_fetch_assoc($query_run)){
                if($row['b_id'] == $branch_id){
                    if($row['password'] == $branch_password){
                        $_SESSION['b_id'] = $branch_id;
                        header("Location: branch_dashboard.php");
                    }
                    else{
                        echo "<script>alert(\"Wrong Password\")</script>";
                    }
                }else{
                    echo "<script>alert(\"Wrong ID\")</script>";
                }
            }

        }
       
        if(isset($_POST['adding_new_branch'])){
            $name=$_POST['branch_name'];
            $region=$_POST['region'];
            $password=$_POST['branch_password'];
            $id=$_POST['branch_id'];
            $rate=$_POST['rate'];
            $com_id=$_SESSION['username'];

            $query ="INSERT INTO `supply_branch` (`name`, `region`, `password`, `b_id`, `rate`, `com_id`) VALUES ('$name', '$region', '$password', '$id', '$rate', '$com_id')
            ";
            $query_run = mysqli_query($conn,$query);
            echo "New Branch Added";
        }
        if(isset($_POST['delete_branch_by_id'])){
            
            $id=$_POST['delete_b'];
            

            $query ="DELETE FROM `supply_branch` WHERE `supply_branch`.`b_id` = $id";
            $query_run = mysqli_query($conn,$query);
            echo "Branch with id =$id is deleted";
        }

        
    ?>
    </div>
    </div>
   
</body>
</html>