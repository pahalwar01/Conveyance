<?php
include '../../../connection.php';
error_reporting(0);
?>

<?php

$display =  "SELECT * FROM DATA";
$data = mysqli_query($conn, $display);

$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);

echo $result[fname];
    // ." ".
    //  $result[sender]." ".
    //  $result[date]." ".
    //  $result[work]." ".
    //  $result[from]." ".
    //  $result[to]." ".
    //  $result[km];

// echo $total;

if($total != 0)
{
    // echo "Table has records";
}
else
{
    echo "No records found";
}

?>