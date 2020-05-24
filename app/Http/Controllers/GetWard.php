<?php
$ID = $_GET['ID'];
$url="https://thongtindoanhnghiep.co/api/district/$ID/ward";
echo @file_get_contents($url);

