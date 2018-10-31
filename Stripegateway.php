<?php
include("./vendor/autoload.php");
class Stripegateway{
	public function __construct(){
		$stripe = array(
			"secret_key" => "sk_test_rzstAWLMVG0eSmegjhDfYYdc",
			"public_key" => "pk_test_R1vkOoywKpxEe4jU8tSFhgkA");
		\Stripe\Stripe::setApikey($stripe["secret_key"]);
	}

	public function addproduct($data){
		$message = "";
		try{
			$product = \Stripe\Charge::create(array('name' => $data['name'],
				'caption' => $data['caption'],
				'description' => $data['description'],
				'active' => true));
			$message = $product->status;
		}catch(Exception $e){
			$message = $e->getMessage();
		}
		return $message;
	}

	public function up_product($data){
		$message = "";
		try{
			$ch = \Stripe\Product::retrieve($data['ID']);
			$ch->description = $data['description'];
			$message = $ch->save();
		}catch(Exception $e){
			$message = $e->getMessage();
		}
		return $message;
	}

	public function delproduct($data){
		$message = "";
		try{
			$product = \Stripe\Product::retrieve($data['ID']);
			$product->delete();
		}catch(Exception $e){
			$message = $e->getMessage();
		}
		return $message;
	}
}