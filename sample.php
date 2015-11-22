<?php
/*
 * just test example
 * 
 * @author  Yang,junlong at 2015-11-19 0:16:01 build.
 * @version $Id$
 */

require 'SyntaxHighLighter.php';

$css_code = '.left, .right {
    width: 200px;
    height: 100%;
    background: #fefefe;
}';

echo SyntaxHighLighterFactory::parse($css_code, 'css');
