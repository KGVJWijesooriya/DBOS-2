<?php

@include 'login-check.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.1.js" integrity="sha256-VuhDpmsr9xiKwvTIHfYWCIQ84US9WqZsLfR4P7qF6O8=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css" />

</head>

<body onload="initClock()">
    <!-- =============== Navigation ================ -->
    <div class="containerr">
        <div class="navigation">
            <ul>
                <li>
                    <a href="index.php" class="logo">
                        <!-- <span class="icon"> -->
                            <!-- <ion-icon name="logo-apple"></ion-icon> -->
                            <img src="../img/StockPro logo.png" alt="" width="70px" >
                        <!-- </span> -->
                        <span class="title"><h1>StockPro</h1></span>
                    </a>
                </li>

                <li>
                    <a href="index.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="coustomer.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>

                <li>
                    <a href="Inventory.php">
                        <span class="icon">
                            <ion-icon name="albums-outline"></ion-icon>
                        </span>
                        <span class="title">Inventory</span>
                    </a>
                </li>

                <li>
                    <a href="vendor.php">
                        <span class="icon">
                            <ion-icon name="enter-outline"></ion-icon>
                        </span>
                        <span class="title">Vendors</span>
                    </a>
                </li>

                <li>
                    <a href="Reports.php">
                        <span class="icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </span>
                        <span class="title">Reports</span>
                    </a>
                </li>

                <li>
                    <a href="register_form.php">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title">Register</span>
                    </a>
                </li>

                <li>
                    <a href="../logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="datetime">
                    <div class="date">
                        <span id="dayname">Day</span>,
                        <span id="month">Month</span>
                        <span id="daynum">00</span>,
                        <span id="year">Year</span>
                    </div>
                    <div class="time">
                        <span id="hour">00</span>:
                        <span id="minutes">00</span>:
                        <span id="seconds">00</span>
                        <span id="period">AM</span>
                    </div>

                </div>



                <div>
                    <div class="d-flex text-black">
                        <div>
                            <img src="assets/imgs/customer02.jpg" alt="" class="img-fluid" style="width: 50px; border-radius: 10px;">
                        </div>
                        <div class="flex-grow-1 ms-3" style="padding-left: 20px ;">
                            <h5 class="mb-1"><?php echo $_SESSION['admin_name'] ?></h5>
                            <p class="mb-2 pb-1">Admin</p>

                        </div>
                    </div>
                </div>
            </div>

            <!-- =========== Scripts =========  -->
            <!-- <script src="assets/js/main.js"></script> -->

            <script type="text/javascript">
                function updateClock() {
                    var now = new Date();
                    var dname = now.getDay(),
                        mo = now.getMonth(),
                        dnum = now.getDate(),
                        yr = now.getFullYear(),
                        hou = now.getHours(),
                        min = now.getMinutes(),
                        sec = now.getSeconds(),
                        pe = "AM";

                    if (hou == 0) {
                        hou = 12;
                    }
                    if (hou > 12) {
                        hou = hou - 12
                        pe = "PM";
                    }

                    Number.prototype.pad = function(digits) {
                        for (var n = this.toString(); n.length < digits; n = 0 + n);
                        return n;
                    }

                    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "Octomber", "November", "December"];
                    var week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                    var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
                    var values = [week[dname], months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
                    for (var i = 0; i < ids.length; i++)
                        document.getElementById(ids[i]).firstChild.nodeValue = values[i];

                }

                function initClock() {
                    updateClock();
                    window.setInterval("updateClock()", 1);
                }
            </script>

            <!-- ====== ionicons ======= -->
            <!-- <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> -->
</body>

</html>