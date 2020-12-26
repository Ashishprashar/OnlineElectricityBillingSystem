<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branch Dashboard</title>
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
.tab{
    color: white;

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
.n{
    color:black;
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
      
    
    <div id="logout"> Branch Id: <?php echo $_SESSION['b_id']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="logout.php" id="logout">Logout</a>
    </div>
    </div> 
    <div id ="left_side">
        <form action="" method="post">

            <table>
            <tr>
                    <td>
                        <input type="submit"  name="add_consumer" value="Add New Consumer" onclick="myFunction()">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit"  name="delete_consumer" value="Delete Consumer" onclick="myFunction()">
                    </td>
                </tr>
               
                <tr>
                    <td>
                        <input type="submit" name="edit_consumer" value="Edit Consumer" onclick="myFunction()">
                    </td>
                </tr>
               
                <tr>
                    <td>
                        <input type="submit" name="consumer_list" value="Consumer List" onclick="myFunction()">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="consumption_record_list" value="Consumption Record List" onclick="myFunction()">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="update_bill" value="Update Bill" onclick="myFunction()">
                    </td>
                </tr>
                
            </table>
        </form>
    </div>
    <div id ="right_side" style="overflow:auto;">
    <div id ="demo" style="overflow:auto;">
    
                     
     </form>
     <?php

        if(isset($_POST['add_consumer'])){
            ?>
        <h4 class ="g">enter details</h4>
                <form action="" method="post" class ="g">
                   <input type="text" name = "consumer_name" placeholder="enter the Consumer Name" class="in" >  <br> <br>
                   <input type="text" name = "meter_id" placeholder="enter the meter Id"  class="in">  <br> <br>
                   <input type="text" name = "consumer_id" placeholder="enter the consumer ID"  class="in">  <br> <br>
                   <input type="submit" value="add" name = "adding_new_consumer" >
                    </form>
        
            <?php
        }        
        else
        if(isset($_POST['delete_consumer'])){
            ?>
        <h4 class ="g">enter details</h4>
                <form action="" method="post" class ="g">
                   <input type="text" name = "delete_c" placeholder="enter the Consumer Id"  class="in">  <br>
                   <br>
                   <input type="submit" value ="Delete" name = "delete_consumer_by_id" >
                    </form>
        
            <?php
        }else        
        if(isset($_POST['edit_consumer'])){
            ?>

        <form action="" method="post" class ="g">
        
            <input type="text" name="consumer_id_to_edit" placeholder="enter the Consumer ID to edit" class ="in"><br><br>
            <input type="submit" name="edit_button" value="search">
                    
                    </form>
        
            <?php
            }

        else       
         if(isset($_POST['edit_button'])){
            
            $c_id = $_POST['consumer_id_to_edit'];
            $b = $_SESSION['b_id'];
                $query = "SELECT * FROM `consumer` where `c_id` = $c_id and `branch_id` = $b"   ;
                
                $query_run = mysqli_query($conn,$query);
                while($row = mysqli_fetch_assoc($query_run) ){
                    
                    ?>
                    <form action="" method="post" class ="g">
                    <b >&nbsp;&nbsp;&nbsp;&nbsp;Consumer Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name ="edited_name"value =<?php echo $row['name'];?> class="in"> <br>
                    <br>
                    <b >&nbsp;&nbsp;&nbsp;&nbsp;Consumer ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="edited_c_id" value =<?php echo (int)$row['c_id'];?> class="in" ><br>
                    <br>
                    <b >&nbsp;&nbsp;&nbsp;&nbsp;Meter ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="edited_meter_id" value =<?php echo $row['meter_id'];?> class="in"> <br>
                    <br>
                    <b >&nbsp;&nbsp;&nbsp;&nbsp;Branch ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="edited_branch_id" value =<?php echo (int)$row['branch_id'];?> class="in" >   <br>
                    <br>
                    <input type="submit" value="Edit" name= "edit_b">
                    
                    </form>
                    
                    <?php
                   
                    
            } 
        }
        else 
        if(isset($_POST['edit_b'])){
            $edited_name = $_POST['edited_name'];
            $edited_c_id = (int)$_POST['edited_c_id'];
            $edited_meter_id = $_POST['edited_meter_id'];
            $edited_branch_id =(int) $_POST['edited_branch_id'];
            $q="UPDATE `consumer` SET `name` = '$edited_name' WHERE `consumer`.`c_id` = $edited_c_id";
            $query_run1 = mysqli_query($conn,$q);
            $q1="UPDATE `consumer` SET `c_id` = '$edited_c_id' WHERE `consumer`.`c_id` = $edited_c_id";
            $query_run2 = mysqli_query($conn,$q1);
            $q2="UPDATE `consumer` SET `meter_id` = '$edited_meter_id' WHERE `consumer`.`c_id` = $edited_c_id";
            $query_run3 = mysqli_query($conn,$q2);
            $q3="UPDATE `consumer` SET `branch_id` = '$edited_branch_id' WHERE `consumer`.`c_id` = $edited_c_id";
            $query_run4 = mysqli_query($conn,$q3);

            echo "<script>alert(\"details edited successfully $edited_name\")</script>";
        }
        else if(isset($_POST['consumer_list'])){
            $b = $_SESSION['b_id'];
                $query = "SELECT * FROM `consumer` where`branch_id` = $b"   ;
            $query_run = mysqli_query($conn,$query);
            while($row = mysqli_fetch_assoc($query_run) ){
                ?>
                <center>
                <table class ="tab">
                    <tr>
                    <td><h5>Consumer Name:&nbsp;&nbsp;&nbsp;&nbsp;</h5></td> 
                    <td><h5><?php echo $row['name']?></h5></td>
                    </tr>    
                    <tr>
                    <td><h5>Consumer ID:&nbsp;&nbsp;&nbsp;&nbsp;</h5></td> 
                    <td><h5><?php echo $row['c_id']?></h5></td>
                    </tr>    
                    <br>    
                     <hr style="height:2%; backgroung-color:black;">
                </table>
               
                </center>
                <br>
                <?php

            }
        }else if(isset($_POST['update_bill'])){
            ?>
            <form action="" method="post" class="g">
            <input type="text" name ="Update_bill_search_by_id" placeholder="enter the consumer ID"><br> <br>
            <input type="submit" name="search_for_c_id">
            </form>
            <?php
        }else
        if(isset($_POST['search_for_c_id'])){
            $id =$_POST['Update_bill_search_by_id'];
            $b=$_SESSION['b_id'];
            $query="SELECT * FROM `consumption_record` WHERE `c_id` IN (SELECT c_id from `consumer` WHERE `branch_id` = $b)";
            $query_run=mysqli_query($conn,$query);
            $row = mysqli_fetch_assoc($query_run);
            $query1="SELECT * FROM `consumer` WHERE `c_id` = $id and `branch_id` = $b";
            $query_run1=mysqli_query($conn,$query1);
            $query2="SELECT * FROM `supply_branch` WHERE `b_id` = $b ";
            $query_run2=mysqli_query($conn,$query2);
            $row2 = mysqli_fetch_assoc($query_run2);
            if($row1 = mysqli_fetch_assoc($query_run1)){
            ?>
            <div class ="n">
                    
                   <br>
                    <form action="" method="post" class="n" >
                    <h5>&nbsp;&nbsp;&nbsp;&nbsp;Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name ="update_name" style="right:40%" value=<?php echo $row1['name'];?> class ="in" disabled></h5> <br>
                    <h5>&nbsp;&nbsp;&nbsp;&nbsp;Consumer ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name ="update_id" style="right:40%" value=<?php echo $row1['c_id'];?> class ="in" ></h5> <br>
                    <h5>&nbsp;&nbsp;&nbsp;&nbsp;month&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name ="new_month" style="right:40%" value=<?php echo $row['month'];?> class ="in"></h5> <br>
                    <h5>&nbsp;&nbsp;&nbsp;&nbsp;unit consumed&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type ="text" name="new_consumed" value =<?php echo 0;?> class="in"></h5>
                    <input type="submit" name="update" value="update">
                    </form>
                      
                     <hr style="height:2%; backgroung-color:black;">
                </table>
            <?php
            }
            else{
                echo "<script>alert(\"entered information doesnot exist\")</script>";
            }
        }
        else 
            if(isset($_POST['update'])){
                $unit =$_POST['new_consumed'];
                $month=$_POST['new_month'];
                $id =$_POST['update_id'];
                $status=0;
    
                $query="INSERT INTO `consumption_record` (`record_id`, `month`, `c_id`, `status`, `unit_consumed`) VALUES (NULL, '$month', '$id', '$status', '$unit')";
                $query_run=mysqli_query($conn,$query);
                echo "<script>alert(\"bill is updated successfully\")</script>";
            }
            else
        
        if(isset($_POST['adding_new_consumer'])){
            $name=$_POST['consumer_name'];
            $c_id =$_POST['consumer_id'];
            $meter_id=$_POST['meter_id'];
            $branch_id = $_SESSION['b_id'];
            $q ="select * from `consumer` ";
            $q_r=mysqli_query($conn,$q);
            while($row = mysqli_fetch_assoc($q_r)){
                if($row['c_id'] == $c_id){
                    echo "<script>alert(\"Consumer already exist with same details $c_id\")</script>";
                    exit(0);
                }
            }
            $query ="INSERT INTO `consumer` (`name`, `c_id`, `meter_id`, `branch_id`) VALUES ('$name', '$c_id', '$meter_id', '$branch_id')";
            $query_run = mysqli_query($conn,$query);
            

            echo "<script>alert(\"New Consumer Added with ID $c_id\")</script>";
           
               
            
        }else
        if(isset($_POST['delete_consumer_by_id'])){
            $c_id=$_POST['delete_c'];
            $b=$_SESSION['b_id'];
            $q1 ="select * from `consumer` where `branch_id` = $b";
            $q_r =mysqli_query($conn,$q1);
            
            while($r = mysqli_fetch_assoc($q_r)){
                if($r['c_id'] == $c_id){
            $query ="DELETE FROM `consumer` WHERE `consumer`.`c_id` = '$c_id' and `consumer`.`branch_id`= '$b'";
            $query_run = mysqli_query($conn,$query);
            
               echo "<script>alert(\"Consumer with ID $c_id is deleted successfully\")</script>";
                }else{
                echo "<script>alert(\"No data found\")</script>";  
                }       
            }
        }else if(isset($_POST['consumption_record_list'])){
            $b =$_SESSION['b_id'];
            $q = "select * from `consumption_record` where `c_id` in (select `c_id` from `consumer` where `branch_id` = $b)";
            $q_r = mysqli_query($conn,$q);
            ?>
            <form action="" class ="g">
            <h4 class="g">&emsp;&emsp;Consumer Id&emsp;&emsp;Month&emsp;&emsp;Status&emsp;&emsp;Unit Consumed</h4> 
            <?php
                while($r= mysqli_fetch_assoc($q_r)){
                ?>
                <h4 class="g">&emsp;<?php echo $r['c_id'];?>&emsp;&emsp;<?php echo $r['month']?>&emsp;&emsp;<?php if($r['status']){echo "PAID";}else{ echo "Not PAID";}?>&emsp;&emsp;<?php echo $r['unit_consumed'];?></h4> 
                
                <?php
            }
            ?>
                       
            </form>
            <?php
        }
        else
        {
            ?>
            <br><br><br>
        
              <h2 class= "g"> <marquee >Welcome to the Page</marquee></h2>
        
            <?php
        }

    

        
    ?>
    </div>
    </div>
   
</body>
</html>