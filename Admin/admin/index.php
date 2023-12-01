<?php

@include 'menu.php';

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<!-- ======================= Cards ================== -->
<div class="cardBox">
    <div class="card">
        <div>
            <div class="numbers">7</div>
            <div class="cardName">Customers Count</div>
        </div>

        <div class="iconBx">
            <ion-icon name="eye-outline"></ion-icon>
        </div>
    </div>

    <div class="card">
        <div>
            <div class="numbers">10</div>
            <div class="cardName">Vendors</div>
        </div>

        <div class="iconBx">
            <ion-icon name="cart-outline"></ion-icon>
        </div>
    </div>

    <div class="card">
        <div>
            <div class="numbers">26508</div>
            <div class="cardName">Total Monthly Sale</div>
        </div>

        <div class="iconBx">
            <ion-icon name="wallet"></ion-icon>
        </div>
    </div>

    <div class="card">
        <div>
            <div class="numbers">9586</div>
            <div class="cardName">Monthly Profit</div>
        </div>

        <div class="iconBx">
            <ion-icon name="cash-outline"></ion-icon>
        </div>
    </div>
</div>

<!-- ================ Order Details List ================= -->
<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Monthly Sale</h2>
            <a href="#" class="btn">View All</a>
        </div>

        <div class="chratBox">

            <canvas id="myChart" style="width:100%;max-width:1080px"></canvas>

        </div>
    </div>

    <!-- ================= New Customers ================ -->
    <!-- <div class="recentCustomers">
        <div class="cardHeader">
            <h2>Cashier Sales</h2>
        </div>
        <div class="pieChart">
            <div><canvas id="myChart1" style="width:100%;max-width:600px height=20rem "></canvas></div>
            <div><canvas id="myChart2" style="width:100%;max-width:600px"></canvas></div>
        </div>
        <div class="pieChart">
            <div><canvas id="myChart3" style="width:100%;max-width:600px"></canvas></div>
            <div><canvas id="myChart4" style="width:100%;max-width:600px"></canvas></div>
        </div>
    </div> -->

</div>

</div>
</div>
<?php

$sql = "SELECT Name, Amount FROM vendor";
$result = $conn->query($sql);

$xValues = array();
$yValues = array();
$barColors = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $xValues[] = $row["Name"];
        $yValues[] = $row["Amount"];
        $barColors[] = "rgba(" . mt_rand(0, 255) . "," . mt_rand(0, 255) . "," . mt_rand(0, 255) . ",0.6)";
    }
}

?>


<script>
    var xValues = <?php echo json_encode($xValues); ?>;
    var yValues = <?php echo json_encode($yValues); ?>;
    var barColors = <?php echo json_encode($barColors); ?>;

    new Chart("myChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "Vendor Sale"
            }
        }
    });
</script>
<!-- chart1 -->
<script>
    var xValues = ["Paid Bills", "Credit Bills"];
    var yValues = [55, 49,];
    var barColors = [
        "#b91d47",
        "#00aba9",
    ];

    new Chart("myChart1", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,
                text: "Dumidu"
            }
        }
    });
</script>
<!-- chart2 -->
<script>
    var xValues = ["Paid Bills", "Credit Bills"];
    var yValues = [55, 49,];
    var barColors = [
        "#e8c3b9",
        "#1e7145"
    ];

    new Chart("myChart1", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,
                text: "Dumidu"
            }
        }
    });
</script>
<!-- chart3 -->
<script>
    var xValues = ["Paid Bills", "Credit Bills"];
    var yValues = [55, 49,];
    var barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        "#1e7145"
    ];

    new Chart("myChart1", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,
                text: "Dumidu"
            }
        }
    });
</script>
<!-- chart4 -->
<script>
    var xValues = ["Paid Bills", "Credit Bills"];
    var yValues = [55, 49,];
    var barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        "#1e7145"
    ];

    new Chart("myChart1", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,
                text: "Dumidu"
            }
        }
    });
</script>

<?php


// $query = "SELECT `id`, `Name`, `P_Number`, `address`, `Amount` FROM `vendor`";
// $result = $conn->query($query);

// $data = array();
// while ($row = $result->fetch_assoc()) {
//     $data[] = $row;
// }

// $conn->close();
?>



<?php
@include 'footer.php';
?>