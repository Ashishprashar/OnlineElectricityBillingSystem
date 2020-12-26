<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Details</title>
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
    width:50%;
    position:fixed;
    left:25%;
    margin:auto;
    padding:10px;
    text-align:center;;
    top:21%;
    
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
      
    
    <div id="logout">Customer Id: <?php echo $_SESSION['c_id']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="logout.php" id="logout">Logout</a>
    </div>
    </div> 
   
    <div id ="right_side" style="overflow:auto;">
    <div id ="demo" style="overflow:auto;">
    <?php
    $id = $_SESSION['c_id'];
    $query = "select * from `consumer` where `c_id` =$id";
    $query2=  "select * from `consumption_record` where `c_id` =$id";
    $qr = mysqli_query($conn,$query);
    $r = mysqli_fetch_assoc($qr);
    $qr1 = mysqli_query($conn,$query2);
    $r_b_id =$r['branch_id'];
    $query3 = "select * from `supply_branch` where `b_id` = $r_b_id" ;
    $qr2 = mysqli_query($conn,$query3);
    $r2 =mysqli_fetch_assoc($qr2);
    ?>
    <center>
    <table class="g">
    <tr>
    <td>
    <h5>Name:<?php echo $r['name'];?></h5>
    </td>
    </tr>
    <tr>
    <td>
    <h5>Consumer ID:<?php echo $r['c_id'];?></h5>
    </td>
    </tr>
    <tr>
    <td>
    <h5>Meter ID:<?php echo $r['meter_id'];?></h5>
    </td>
    </tr>
    <tr>
    <td>
    <h5>Branch ID:<?php echo $r['branch_id'];?></h5>
    </td>
    </tr>
    <tr>
    <td>
    <h5>Branch Name:<?php echo $r2['name'];?></h5>
    </td>
    </tr>
    <tr>
    <td>
    <h5>Region :<?php echo $r2['region'];?></h5>
    </td>
    </tr>
    <?php
    

        $sum=0;
    while($r1 = mysqli_fetch_assoc($qr1)){
        if($r1['status'] == 0){
    ?>
    <tr>
    <td>
    <h5>Month:<?php echo $r1['month'];?></h5>
    </td>
    </tr>
    <tr>
    <td>
    <h5>Unit Consumed:<?php echo $r1['unit_consumed']; $sum+=$r1['unit_consumed']*$r2['rate']?></h5>
    </td>
    </tr>
    <tr>
    <td>
    <h5>Status :Not Paid</h5>
    </td>
    </tr>
    <?php
        }
    }
        

if($sum == 0){
   ?><tr>
   <td>
   <h5> NO DUE</h5>
   </td>
   </tr><?php
}else{
    
    ?>
<tr>
<td>
<h5>Total Due:&nbsp;<?php echo $sum;?></h5>
</td>
</tr>
</table> 
<form action="" method="post">
<input type="submit" value="pay" name="pay">
</form>
<?php
}


if(isset($_POST['pay'])){
    $i =$_SESSION['c_id'];
    $q4 = "UPDATE `consumption_record` SET `status`= 1 WHERE `c_id` = $i";
    $qr4 = mysqli_query($conn,$q4);
    echo "<script language='javascript'>";
    echo 'alert("Your alert msg");';
    echo 'window.location.replace("bill_detail.php");';
    echo "</script>";
    

}
    ?>                 
 
 </center>    
</div>
</div>
   
</body>
</html>