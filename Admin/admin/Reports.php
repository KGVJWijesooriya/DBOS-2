<?php

@include 'menu.php';

?>

<body>

  <div id="reportsContainer">
    <div class="reportTypeContainer">
      <div class="reportType">
        <p>Costomers</p>
        <div class="alignRight">
          <a href="report_csv.php?Reports=coustomer" class="reportExportBtn">Excel</a>
          <a href="report_pdf.php?Reports=coustomer" class="reportExportBtn">Pdf</a>
        </div>
      </div>
    </div>
    <div class="reportTypeContainer">
      <div class="reportType">
        <p>Inventory</p>
        <div class="alignRight">
          <a href="report_csv.php?Reports=Inventory" class="reportExportBtn">Excel</a>
          <a href="report_pdf.php?Reports=Inventory" class="reportExportBtn">Pdf</a>
        </div>
      </div>
    </div>

    <div class="reportTypeContainer">
      <div class="reportType">
        <p>Vendors</p>
        <div class="alignRight">
          <a href="report_csv.php?Reports=vendor" class="reportExportBtn">Excel</a>
          <a href="report_pdf.php?Reports=vendor" class="reportExportBtn">Pdf</a>
        </div>
      </div>
    </div>
  </div>


  <!-- <script src="js/script.js"></script> -->
</body>

<?php
@include 'footer.php';
?>

</html>