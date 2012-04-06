<?php

/*
Code written and managed by Dario Magliocchetti-Lombi for e.quinox

Copying is under no circumstances allowed, unless prior WRITTEN (not email) consent from author.

COPY 2011-2012, dario-ml
www.dario-ml.com

Page Name:		api.main.php
Description:		Holds most important data for all of the website.
Created:       		22 December 2011
Last Modified: 		25 December 2011


*/

if (!defined("SAFE_ZONE"))
{
        echo "Fatal Error : Not called from Safe Zone!";
        exit();
}

session_start();

$db = new mysqli("localhost", "root", "1q2w3e", "equinox");
//$db = new mysqli("sql.byethost1.org", "dariomlc_fogmt", "nkUOH~I)ADi5", "dariomlc_fogmt");

//this is our current algorithm, which will later be moved OUTSIDE the scope:
class eQuinoxAlgo
{
	function generate($length = 8)
	{
		for($i = 1; $i <= $length; $i++)
		{
			$return .= rand(0,9);
		}
		
		return $return;
	}
	
	function output($input, $breaker = " ")
	{
		$div = strlen($input) % 3;
		for($i = 0; $i < strlen($input); $i++)
		{
			if ($i%3 == $div)
			{
				$ret .= $breaker;
			}
			$ret .= $input[$i];
		}
		
		return $ret;
	}
}