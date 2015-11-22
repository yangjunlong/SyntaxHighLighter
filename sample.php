<?php
/*
 * just test example
 * 
 * @author  Yang,junlong at 2015-11-19 0:16:01 build.
 * @version $Id$
 */

require 'SyntaxHighLighter.php';

$css_code = ".test {
    display: block;
    display: none;
    visibility: visible;
    visibility: hidden;
}";

echo SyntaxHighLighterFactory::parse($css_code, 'css');

echo SyntaxHighLighterFactory::parse($css_code, 'css');
