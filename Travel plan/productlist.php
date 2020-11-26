

<?php
if (isset($_POST['insert']))
{
	
	$xml = new DOMDocument();

	$t = $_POST['title'];
	$pr = $_POST['price'];
	$qty = $_POST['quantity'];
	$number=$_POST['itemNumber'];

	$productsTag = $xml->getElementsByTagName("products")->item(0);

	$nameTag=$xml->createElement("name",$t);
	$priceTag=$xml->createElement("price",$pr);
	$itemNumTag=$xml->createElement("item_number",$number);

	$productTag->appendChild($nameTag);
	$productTag->appendChild($priceTag);
	$productTag->appendChild($itemNumTag);


}


?>


