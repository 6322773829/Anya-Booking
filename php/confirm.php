<?php require_once('connect.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <script src="https://kit.fontawesome.com/f6d6d0e1e0.js" crossorigin="anonymous"></script>
    </head>
    <title>Anya Booking</title>
    <link rel="stylesheet" href="../css/style.css">
    <header id="header">
        <table>
            <tr>
                <th>
                    <h1>ANYA booking</h1>
                </th>
                <th class="right">
                    <button onclick="location.href='customer_chat.php'" id="icon"><i class="fa-solid fa-comment-dots" style="font-size: 38px; color: cart.php291f1d;"></i></button>
                    <button onclick="location.href='cart.php'" id="icon"><i class="fa-solid fa-cart-shopping" style="font-size: 38px; color: cart.php291f1d;"></i></button>
                    <button onclick="location.href='profile.php'" id="icon"><i class="fa-solid fa-circle-user" style="font-size: 38px; color: cart.php291f1d;"></i></button>
                </th>
            </tr>
        </table>
    </header>
    <div class="navbar">
        <a href="customer_home.php">&ensp;Home&ensp;</a>
        <a href="customer_booking.php">&ensp;Booking&ensp;</a>
    </div>
	<body>
        <div id="content" class="form">
			<!--%%%%% Main block %%%%-->
			<!--Form -->
			<?php
        session_start();
           $RID = $_SESSION['RID'];
           $BID = $_SESSION['BID'];
           
           $checkin = $_POST['check_in_date'];
           $checkout = $_POST['check_out_date'];

$c= "select * from book, customer, room where book.C_ID=customer.ID and room.ID=book.R_ID  ";
$b= "select * from building, room where room.B_ID=building.ID ";

 $r="UPDATE book SET Check_inDate='$checkin', Check_outDate='$checkout' where book.ID=$BID";
            $result=$mysqli->query($c);
            if(!$result){
                echo "Select failed. Error: ".$mysqli->error ;
                return false;
            }
            $result1=$mysqli->query($b);
            if(!$result1){
                echo "Select failed. Error: ".$mysqli->error ;
                return false;
            }
            $result2=$mysqli->query($r);
            if(!$result){
                echo "Select failed. Error: ".$mysqli->error ;
                return false;
            }

            $row=$result->fetch_array();
            $row1=$result1->fetch_array();
            $row2=$result1->fetch_array();
            


            ?>
				<h2>Completed Booking<p></p></h2>
				
				<h4>Booking ID: <?php echo $row['ID']; ?> </h4>
               
				<div class="row">
                    <div class="column" style="background-color:none;">
                        <img src="../img/kitagawa.jpg" width="250" height="200"/>
                      
                    </div>
                    <div class="column" style="background-color:none;">
                     
                      <p> &emsp;&emsp; Building Name: <?php echo $row1['B_Name']; ?> </p>
                      <p>&emsp;&emsp;Check in Date :  <?php echo $row['Check_inDate']; ?></p>
                      <!-- &emsp; //<input type="text  " name="check_in_date"> -->
                      <p>&emsp;&emsp; No. of People: <?php echo $row['MaxAdult']; ?></p>
                    </div>
                    <div class="column" style="background-color:none;">
                        <p> &emsp; Room Name: <?php echo $row1['R_Name']; ?></p>
                        <p>&emsp;Check out Date :  <?php echo $row['Check_outDate']; ?></p>
                         <!-- <input type="text" name="check_out_date"> -->
                        <p>&emsp; Price: <?php echo $row['Price']; ?></p>
                    </div>
                    
                  </div>
				

				<br></br>
				<div class="center">
                    <input type="submit"  value="Home" onclick= "location='customer_home.php'">			
					<input type="submit"  value="Cancel Booking" onclick= "location='customer_booking.php'">	
				</div>
	    </div>
        <div id="footer">
            CSS326 Section 1 Group 6
        </div>   
    </body>
</html>
