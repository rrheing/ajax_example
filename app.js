// JS FILE BELOW
// This section should be placed in the dedicated js/app.js file
// The separate folder will hold the app.js file, and we'll call it by using src="js/app.js" -->

function functionName(functionValue) {

	// by using .post we're going to send a POST to resources.php and declare the resource ID
	$.post('server_side_code.php', 

		{ 'functionValue': functionValue },

		function (result) {

			// look for the #resource id and replace the HTML content with what's returned
			$('#resource').replaceWith(result);

		}); // close the .post code block
}
