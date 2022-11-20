<?php require_once('connect.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <script src="https://kit.fontawesome.com/f6d6d0e1e0.js" crossorigin="anonymous"></script>
    </head>
    <title>Anya Booking</title>
    <link rel="stylesheet" href="../css/owner_style.css">
    <header id="header">
        <table>
            <tr>
                <th>
                    <h1>ANYA booking</h1>
                </th>
                <th class="right">
                    <button onclick="location.href='owner_chat.php'" id="icon"><i class="fa-solid fa-comment-dots"></i></button>
                    <button onclick="location.href='owner_profile.php'" id="icon"><i class="fa-solid fa-circle-user"></i></button>
                </th>
            </tr>
        </table>
    </header>
    <div class="navbar">
        <a href="owner_home.php">&ensp;Hotel Info&ensp;</a>
        <a href="owner_booking.php">&ensp;Booking&ensp;</a>
    </div>
	<?php
        $numberofroomincart = 2;
        if ($numberofroomincart < 2) {
            echo "<body class=shortpage>";
        }
        else {
            echo "<body>";
        }
    ?>
        <div id="content" class="form">
			<!--%%%%% Main block %%%%-->
			<!--Form -->
            <form action="owner_home_del2.php" method="post">
                <h2>ROOM LIST</h2>
                <div id="card">
                    <br><br><br><br><br><br><br>
                    <table>
                        <?php
                        $q ="select * from room, building, owner where room.B_ID=building.ID and owner.ID=room.O_ID";
                        $result=$mysqli->query($q);
                        if(!$result){
                            echo "Select failed. Error: ".$mysqli->error ;
                            return false;
                        }

                        $row=$result->fetch_array();
                        $row1=$result->fetch_array();
                        $rnm=$row['R_Name'];
                        session_start();
                        $_SESSION['rname']=$rnm;

                        ?>
                        <tr>
                            <th rowspan="6">
                                <img src="../img/kitagawa.jpg" height="300" style="margin-left: 20px;"/>
                            </th>
                            <th colspan="2">
                                <p class="title">&emsp;Room Name: <?php echo $row['R_Name'];?></p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p>&emsp;Building Name :<?php echo $row['B_Name'];?></p>
                            </th>
                            <th>
                                <p> &emsp;Room ID: <?php echo $row['ID'];?></p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p>&emsp;Max Adult : <?php echo $row['MaxAdult'];?></p>
                            </th>
                            <th>
                                <p>&emsp;Building ID : <?php echo $row['ID'];?> </p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p>&emsp;Facility: <?php echo $row['Facility'];?></p>
                            </th>
                            <th>
                                <p>&emsp;Price: <?php echo $row['Price'];?></p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p style="margin-left: 65%">Availability</p>
                            </th>
                            <th>
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </th>
                        </tr>
                        <tr>
                            <td colspan="3" class="center">
                                <input type="submit" value="DELETE"  class="submit" style="width:100px;">
                            </td>
                        </tr>
                    </table>
                    <br><br><br><br><br><br>
                    <table>
                        <tr>
                            <th rowspan="6">
                                <img src="../img/kitagawa.jpg" height="300" style="margin-left: 20px;" onclick="location.href='owner_home_del2.php'"/>
                            </th>
                            <th colspan="2">
                                <p class="title">&emsp;Room Name: <?php echo $row1['R_Name'];?></p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p>&emsp;Building Name : <?php echo $row1['B_Name'];?></p>
                            </th>
                            <th>
                                <p> &emsp;Room ID: <?php echo $row1['ID'];?></p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p>&emsp;Max Adult : <?php echo $row1['MaxAdult'];?></p>
                            </th>
                            <th>
                                <p>&emsp;Building ID : <?php echo $row1['ID'];?> </p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p>&emsp;Facility: <?php echo $row1['Facility'];?></p>
                            </th>
                            <th>
                                <p>&emsp;Price: <?php echo $row1['Price'];?></p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                            <p style="margin-left: 65%">Availability</p>
                            </th>
                            <th>
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </th>
                        </tr>
                        <tr>
                            <td colspan="3" class="center">
                                <input type="submit"  value="DELETE" class="submit"  style="width:100px;" onclick="location.href='owner_home_del2.php'">
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
	    </div>
        <div id="footer">
            CSS326 Section 1 Group 6
        </div>   
    </body>
</html>
