<?php
   $type = $_GET['Reports'];
   $file_name = '.xls';

   $mapping_filenames = [
    'coustomer' => 'coustomer Report',
    'Inventory' => 'Inventory Report',
    'vendor' => 'vendor Report'
   ];

   $file_name = $mapping_filenames[$type] . '.xls';
   header("Content-Disposition: attachment; filename=\"$file_name\"");
   header("Content-Type: application/vnd.ms-excel");

