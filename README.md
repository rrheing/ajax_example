# AJAX with PHP Demo

AJAX stands for Asynchronous JavaScript And XML, and refers to a method of making asynchronous requests.  Asynchronous means that it's possible to communicate with the server without requiring the entire page to be re-loaded.  This can improve user experience dramatically by cutting out the need to reload entire pages when updating a single value, such as an interactive  editor in a web application.

## Using this Repository

Included here are three files that can be used to demonstrate an asynchronous request.  There's an HTML front page where the user interacts with the content, a Javascript snippet that sends the request to the server, and a server side snippet that does the backend processing.  Once the processing is complete, the result is then handled by the javascript, and the HTML page is updated based on the Javascript function.  The example below uses php for the server-side processing.

In order to use this code, you can upload these three files to a server.

## The HTML Front Page

The HTML page is served up to the client (the end user), and the user's browser renders the HTML on the page.  There are three buttons, each with an onClick() javascript function and a different value.  
```
onClick="functionName(200)"
```

In the middle of the page, there's a span tag with the id of "resource", this id is how the javascript will know where to place the returned content.
```
<span id="resource">
```

At the bottom of the page, we'll see two <script> tags, which include a link to the Google AJAX API and the app.js file where the functionName() function is defined.  The AJAX link brings in the javascript that we'll be using later.

```<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="app.js"></script>
```


## The Javascript in the Middle
This file has a single function that takes one argument.  This argument is the value that we saw on the HTML page and the one we're interested in passing to the database.  In an application, this might be something like a user ID, or it could be a value that we fetched from somewhere on a page, such as an input area.  In the function, we can use the variable by calling the functionValue variable name
```
function functionName(functionValue)
```

The first thing we'll do in the function is call the .post() function from JQuery, which will take a destination URL, data, and a success function. Read more about the JQuery .post() function [here](https://api.jquery.com/jquery.post/). Since this takes a few arguments, we're going to split it up on different lines for clarity.  The first argument is the destination of our request, which is the server_side_code.php file below:
```
$.post('server_side_code.php',
```
Next, we're going to pair up the value that we retrieved from the button, and we're going to assign it to a post value.  This will pass that data to the PHP file, and allow it to work with the data
```
{ 'functionValue': functionValue },
```
Once that's finished, the success function will look for the element with the id 'resource', and will replace the contents with the result variable.  
```
$('#resource').replaceWith(result);
```
Notice that this is replacing the entire element with the result, meaning that the span with the ID 'resource' will be overwritten.  If we wanted to keep that ID so that it could run multiple times, we would want the javascript to handle the result in a different way.


## The Server Side PHP
In this example, the server side code is very simple - it's adding a number provided by the user and then adding it to a hard-coded value on the page.  The first thing this snippet will do is check for a value in the post fields.  We achieve this with  the snippet below, that assigns the functionValue from the post variables and assigns it to the $function_value variable.
```
$function_value = $_POST['functionValue'];
```
In this example, the only server side processing that we're performing is using an existing value, and adding it to the user value from above.  The snippet then prints out that content with an echo, which the javascript processes and uses to update the element mentioned above
```
$total_value = ( $number_from_database + $function_value );
```
In an application, this is where a developer could use a database connection to retrieve information about a particular account ID, update values of a specific field, or even check on the process of a job.


