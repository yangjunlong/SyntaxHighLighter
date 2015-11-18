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

/*@require common:widget/ui/css/reset.less*/

/*@require common:widget/ui/css/markdown.less*/
/*清除浮动*/
.clearfix:after {
    content: ".";
    visibility: hidden;
    display: block;
    height: 0;
    overflow: hidden;
    clear: both;
}

/* no ie mac \*/
* html .clearfix {
    height: 1%;
}
/* end */
* + html .clearfix {
    height: 1%;
}

body{
	color: #333;
	font-size: 14px;
}

/* End of file: base.less */
/* Location: ./common/widget/ui/css/base.less */';

echo SyntaxHighLighter::parse($css_code, 'less');