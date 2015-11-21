<?php
/*
 * just test example
 * 
 * @author  Yang,junlong at 2015-11-19 0:16:01 build.
 * @version $Id$
 */

require 'SyntaxHighLighter.php';

$css_code = "SELECT a.au_fname+a.au_lname
FROM authors a,titleauthor ta
(SELECT `title_id`,`title`
FROM `titles`
WHERE ` ytd_sales`>10000
) AS t
WHERE a.au_id=ta.au_id
AND ta.title_id=t.title_id";

echo SyntaxHighLighterFactory::parse($css_code, 'sql');
