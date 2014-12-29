<?php

require_once ROOT . "DBInterface/customerDB.php";
require_once ROOT . "DBInterface/addressDB.php";


function getCustomer($customerID){
	$addressDB = new AddressDB();
	$customerDB = new CustomerDB();
	$sqlResCustomer = $customerDB->getCostomerByID($customerID);
	$customerRes = $sqlResCustomer->fetch_object();
	
	$sqlResBilling = $addressDB->getAddressByID($customerRes->BillingAddress);
	$billingRes = $sqlResBilling->fetch_object();
	
	$billingAddress = new Address($billingRes->Address_ID, $billingRes->Address1, $billingRes->Address2, $billingRes->Zip, $billingRes->City, $billingRes->Country);
	
	$sqlResShipping = $addressDB->getAddressByID($customerRes->ShippingAddress);
	$shippingRes = $sqlResShipping->fetch_object();
	
	$shippingAddress = new Address($shippingRes->Address_ID, $shippingRes->Address1, $shippingRes->Address2, $shippingRes->Zip, $shippingRes->City, $shippingRes->Country);
	
	$customer = new Customer($customerRes->Costumer_ID, $customerRes->CostumerRegistration, $customerRes->Gender, $customerRes->Title, $customerRes->FirstName, $customerRes->LastName, $customerRes->Birthday, $customerRes->PhoneNumber, $customerRes->MobileNumber, $customerRes->EMail, $billingAddress, $shippingAddress);
	
	
	
	return $customer;
}
	
	


?>