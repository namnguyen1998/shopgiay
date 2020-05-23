<?php
$ID = $_GET['ID'];
$url="https://thongtindoanhnghiep.co/api/city/$ID/district";
echo @file_get_contents($url);
