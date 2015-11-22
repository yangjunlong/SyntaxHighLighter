<?php
/*
 * just test example
 * 
 * @author  Yang,junlong at 2015-11-19 0:16:01 build.
 * @version $Id$
 */

require 'SyntaxHighLighter.php';

$css_code = '
&lt;!-- sdfdsf --&gt;
<body&gt;
    &lt;div class="left" &gt;
    &lt;div class="right" &gt;
    &lt;div class="main" &gt;
&lt;/body&gt;';

echo SyntaxHighLighterFactory::parse($css_code, 'html');
