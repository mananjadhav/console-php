
<?php
	
	class PHPConsole {

		function _construct() {

		}

		function console($contents, $type = 'log', $identifier = null,$line = false) {

			/** Get the back trace into a json string and get the line number and the file name */
			$bt = debug_backtrace();
  			$caller = array_shift($bt);
  			$str = json_encode($caller);
  			$myObject = json_decode($str);
  			$lineNo =  $myObject->line;

  			$fileInfo  =  pathinfo($myObject->file);
  			$file = $fileInfo['basename'] ;

  			// convert the type of log to lowercase
			strtolower($type);

			//if the contents is an array then we encode into a json string and log it to print as an array. It can be an indexed array.
			// or an associative array
			if(is_array($contents)) {
				$array = json_encode($contents);
				echo "<script type='text/javascript'>\n";
				if($identifier == null) {
					if($line == false ) {
						echo "console.log('Array : ' );\n";
					} else {
						echo "console.log('Array :  (file:" .  $file . ", line: " . $lineNo . ")' );\n";	
					}
				}
					
				else {
					if($line == false) {
						echo "console.log('Array : $identifier ')  ;\n";
					}
					else {
						echo "console.log('Array : $identifier  (file:" .  $file . ", line: " . $lineNo . ")'  )  ;\n";	
					}
				}
					
				echo "console.dir($array);\n";
				echo "</script>\n";
			}
			elseif (is_object($contents)) {    // If the content is an object then accordingly the object is printed. 
				$array = json_encode($contents);
				echo "<script type='text/javascript'>\n";
				if($identifier == null) {
					if($line == false ) {
						echo "console.log('Object : ' );\n";
					} else {
						echo "console.log('Object :  (file:" .  $file . ", line: " . $lineNo . ")' );\n";	
					}
				}
					
				else {
					if($line == false) {
						echo "console.log('Object : $identifier ')  ;\n";
					}
					else {
						echo "console.log('Object : $identifier  (file:" .  $file . ", line: " . $lineNo . ")'  )  ;\n";	
					}
				}
				echo "console.dir($array);\n";
				echo "</script>\n";
			}
			else {  		// This is for the general variables

				$prepender = "";
				$data = "";
				if($identifier == null) {
					$prepender = "";
				}
				else {
					$prepender = "Variable $identifier : ";
				}

				if($line == true) {
					$data  = $prepender . $contents . "	 (file:" .  $file . ", line: " . $lineNo . ")"; 
				}
				else {
					$data = $prepender.$contents;
				}

				echo "<script type='text/javascript'>\n";
				switch($type) {
					case "log":
								echo "console.log('$data');\n";
									break;
					case "warning":
								echo "console.warn('$data');\n";
									break;
					case "error":
								echo "console.error('$data');\n";
									break;
					default:	echo "console.log('$data');\n";
									break;
				}
				echo "</script>\n";
			}
		}


		// to clear the console .
		function clear($line= false) {
			/** Get the back trace into a json string and get the line number and the file name */
			$bt = debug_backtrace();
  			$caller = array_shift($bt);
  			$str = json_encode($caller);
  			$myObject = json_decode($str);
  			$lineNo =  $myObject->line;

  			$fileInfo  =  pathinfo($myObject->file);
  			$file = $fileInfo['basename'] ;

  			echo "	<script type='text/javascript'>\n
						console.clear(); ";
			if($line == true) {
				echo "console.log('Console cleared. (file: $file , line: $lineNo');";
			}
			echo "</script>\n";
		}
	}