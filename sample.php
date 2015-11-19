<?php
/*
 * just test example
 * 
 * @author  Yang,junlong at 2015-11-19 0:16:01 build.
 * @version $Id$
 */

require 'SyntaxHighLighter.php';


$css_code = '<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<!-- sdfaf -->

	<!-- fdsdgdsfdf -->
</body>
</html>';

echo SyntaxHighLighterFactory::parse($css_code, 'html');
