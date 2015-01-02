<?php

require_once ROOT . "DBInterface/customerDB.php";
require_once ROOT . "DBInterface/addressDB.php";


function getCustomer($customerID){
	$addressDB = new AddressDB();
	$customerDB = new CustomerDB();
	$sqlResCustomer = $customerDB->getCostomerByID($customerID);
	$customerRes = $sqlResCustomer->fetch_object();
	
	if ($customerRes == null){
		return null;
	}
	
	$sqlResBilling = $addressDB->getAddressByID($customerRes->BillingAddress);
	$billingRes = $sqlResBilling->fetch_object();
	
	if ($billingRes != null){
		$billingAddress = new address($billingRes->Address_ID, $billingRes->Address1, $billingRes->Address2, $billingRes->Zip, $billingRes->City, $billingRes->Country);
	}
	else{
		$billingAddress = null;
	}
	$sqlResShipping = $addressDB->getAddressByID($customerRes->ShippingAddress);
	$shippingRes = $sqlResShipping->fetch_object();
	if ($shippingRes != null){
		$shippingAddress = new address($shippingRes->Address_ID, $shippingRes->Address1, $shippingRes->Address2, $shippingRes->Zip, $shippingRes->City, $shippingRes->Country);
	}
	else{
		$shippingAddress = null;
	}
	$customer = new customer($customerRes->Costumer_ID, $customerRes->CostumerRegistration, $customerRes->Gender, $customerRes->Title, $customerRes->FirstName, $customerRes->LastName, $customerRes->Birthday, $customerRes->PhoneNumber, $customerRes->MobileNumber, $customerRes->EMail, $billingAddress, $shippingAddress);
	
	
	
	return $customer;
}
	
	


?>