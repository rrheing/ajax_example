<!-- PHP FILE BELOW -->
<!-- This section should be placed in the destination PHP file.  
	For example, this might be called "server_side_code.php" -->
<?php 

// Catch the variables as posted by the javascript snippet
$function_value = $_POST['functionValue'];

// You could call a function here
$number_from_database = 100;
$total_value = ( $number_from_database + $function_value );

echo "You added " . $function_value . " to the value in the database.<br>";
echo "The database had " . $number_from_database . " in it originally.<br>";
echo "The server added these together and they equal " . $total_value . "<br>";
