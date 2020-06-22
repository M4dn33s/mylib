<?php
function filter_user_input($string) {

	// Escapes special characters in the unescaped_string, taking into account the current
	// character set of the connection so that it is safe to place it in a mysql query.
	#$string = mysql_real_escape_string($string);

	// This removes additional bad words
	// IS THIS NECESSARY ???
	$badwords = array('union','order','having','by');
	#echo $string;
	$string = str_ireplace($badwords, "", $string);
	#echo $string;

	// This converts multiple spaces into single spaces
	// (which is important for fixing spacing if any words were removed above)
	$string = preg_replace('/\\s+/', ' ', $string);
	
	// This trims any spaces at beginning and end of variable
	$string = trim($string); 

	// Finally, this checks to see if there are only spaces left, and if so sets $string to NULL
	// (which important when searching a database for text, as a single space could return all entries in table)
	$stringtest = preg_replace('/\\s+/', '', $string);
	$stringcount = strlen($stringtest);
	if ($stringcount == 0) {$string=NULL;}

	return $string;

}
?>