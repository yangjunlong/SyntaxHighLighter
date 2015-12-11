<?php
/*
 * just test example
 * 
 * @author  Yang,junlong at 2015-11-19 0:16:01 build.
 * @version $Id$
 */

require 'SyntaxHighLighter.php';

$css_code = 'html, body {
    margin: 0;
    height: 100%;
}
.main {
    height: 100%;
    margin: 0 210px;
    background: #ccc;
}
.left, .right {
    width: 200px;
    height: 100%;
    background: #fefefe;
}
.left {
    float: left;
}
.right {
    float:right
}';

echo SyntaxHighLighterFactory::parse($css_code, 'css');
