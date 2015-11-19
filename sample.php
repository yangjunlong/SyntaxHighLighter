<?php
/*
 * just test example
 * 
 * @author  Yang,junlong at 2015-11-19 0:16:01 build.
 * @version $Id$
 */

require 'SyntaxHighLighter.php';


$css_code = '/*
 * 站点通用基础css样式
 * 
 * @author  Yang,junlong at 2015-3-10 19:32:37 build.
 * @version $Id$
 */

// global stylesheet
body {
    padding: 0;
    margin: 0;
    font-size: 12px;
    font-family: \'Microsoft Yahei\',"微软雅黑",arial,"宋体",sans-serif;
}
#test{
    color: #ccc;
}
// layout
.page {
    width: 780px;
    margin: 0 auto;
    background: #ddd;
    border: 1px solid #ccc;
}';

echo SyntaxHighLighter::parse($css_code, 'css');
