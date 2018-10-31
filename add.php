<?php
include('Stripegateway.php');
$myStripe = new Stripegateway();
if(isset($_POST['btnsubmit'])){
	$data = array('name' => $_POST['name'],
		'caption' => $_POST['caption'],
		'description' => $_POST['description']);
	$result = $myStripe->addproduct($data);
	echo "<pre>"; print_r($result);
}