<?php
include 'Stripegateway.php';
$myStripe = new Stripegateway();
$data = array('ID' => 'prod_Dssk0MqIb07wuu', 'description' => 'nyaman dipakai');
$result = $myStripe->up_product($data);
echo "<pre>"; print_r($result);