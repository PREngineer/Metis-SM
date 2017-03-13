<!DOCTYPE html>
<html lang="en">

<?php
// Initialize Session
include 'Session/init.php';
// Include the header
include 'Design/head.php';
?>

<body>
<?php

//$array = getCPUInfo();

//print_r($array);

echo "<h2>Basic System Stats</h2>";

echo "RAM Used: " . getRAMUse()."%<br>";

echo "CPU Load: " . getCPULoad() . "%<br>";

echo "Disk Total: " . disk_total_space("/") . "<br>";

echo "Disk Free: " . disk_free_space("/") . "<br>";

echo "Disk Use: " . getDiskUse() . "%<br>";

//hdd stat
echo "<h2>Hard Disk Stats</h2>";

$stat['hdd_free'] = round(disk_free_space("/") / 1024 / 1024 / 1024, 2);
$stat['hdd_total'] = round(disk_total_space("/") / 1024 / 1024/ 1024, 2);
$stat['hdd_used'] = $stat['hdd_total'] - $stat['hdd_free'];
$stat['hdd_percent'] = round(sprintf('%.2f',($stat['hdd_used'] / $stat['hdd_total']) * 100), 2);

echo "Disk Free: " . $stat['hdd_free'] . "GB<br>";
echo "Disk Total: " . $stat['hdd_total'] . "GB<br>";
echo "Disk Used: " . $stat['hdd_used'] . "GB<br>";
echo "Disk Used: " . $stat['hdd_percent'] . "%<br>";

//network stat
echo "<h2>Network Stats</h2>";

echo "Interface is: " . getNetworkInterface()."<br>";

$arr = getNetworkThroughput();

echo "Rx Bytes: " . $arr['rx']." Bytes<br>";

echo "Tx Bytes: " . $arr['tx']." Bytes<br>";

?>
</body>

</html>