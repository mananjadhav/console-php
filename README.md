This is a basic php based simple class to make logs in the browser console.
Something like this must already be there. But this helps in printing arrays and objects properly and also adding the line numbers and source files.
Moreover you can add identifiers also to add any labels if you wish too.
Allows to add different types of logs like error messages, or warning messages too.
Can be very useful in tracing and making logs for MVC pattern where Model Errors cannot be viewed easily (as far as I know)

Following is the method to use it.


Firstly include the PHPConsole class and then create an object of PHPConsole as shown:

	<?php
			require_once('phpconsole.php');
			$consolePHP = new PHPConsole.php
	?>



Following are the two functions supported by the class:

	1. console($contents, [$type = 'log', $identifier = null,$line = false])
		Add logs to the browser console using by php calls, which is something not supported directly.
	 Parameter description is :
	 	Mandatory:
	 	$contents  -->  the actual content, variable, array or object you want to trace using the console

	 	Optional:
	 	$type --> type of log -- takes string parameters as log, warning and error. Default value is log
	 	$identifier --> If you wish to give any identifier to the log. Its again optional parameter.
	 	$line --> If you wish to show the filename, and line number from which the console is called(log is added).

	2. clear([$line = false])
		Function to clear the console.

		Parameter description:
		Optional:
	 	$line --> If you wish to show the filename, and line number from which the console is cleared.



Note: Ignore the line numbers showed in the console default by the browser. I am using script inserts so the line numbers differ. 
Use the last parameter of the both the functions.


Sample Usage:
	<?php
		require_once('phpconsole.php');
	
		$consolePHP = new PHPConsole();
	
		$consolePHP->console("hel\"lo","log","hello");   	// content, type and idenifier 
		$consolePHP->console("nothing here","log");			// content and type only
				
		$consolePHP->clear();								// clear the console
		
	
		$consolePHP->console($stringinput,"warning");		// warning type message using a string variable dump
		$consolePHP->console("hel\"lo","log","hello",true);	// log with content, type identifier and also show the line number
	?>