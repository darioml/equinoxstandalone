<?php
@define("SAFE_ZONE", 1);
include_once("global.php");

if (trim(@$_GET['search']) != "") //is there a search present?
{
	$customer = $db->escape_string($_GET['search']);
	
	//search stuff
	if ($customer[0] != '^')	{	$customer = "%" . $customer;		}
	else						{	$customer = substr($customer, 1);	}
	
	$results_ .= $core->displayUsers($db->query("SELECT customers.*, count(codes.code) as codesused FROM customers LEFT JOIN codes ON customers.boxID = codes.boxID GROUP BY customerID HAVING customers.name LIKE '$customer%' LIMIT 50"));
}
elseif (trim(@$_POST['search']) != "") //is there a search present?
{
	$customer = $db->escape_string($_POST['search']);
	
	//search stuff
	if ($customer[0] != '^')	{	$customer = "%" . $customer;		}
	else						{	$customer = substr($customer, 1);	}
	
	$results_ .= $core->displayUsers($db->query("SELECT customers.*, count(codes.code) as codesused FROM customers LEFT JOIN codes ON customers.boxID = codes.boxID GROUP BY customerID HAVING customers.name LIKE '$customer%' LIMIT 50"));
}
else //DEFAULT
{
	$results_ .= $core->displayUsers($db->query("SELECT customers.*, count(codes.code) as codesused FROM customers LEFT JOIN codes ON customers.boxID = codes.boxID GROUP BY customerID LIMIT 50"));
}