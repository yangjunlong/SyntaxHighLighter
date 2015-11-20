<?php
/*
 * just test example
 * 
 * @author  Yang,junlong at 2015-11-19 0:16:01 build.
 * @version $Id$
 */

require 'SyntaxHighLighter.php';

$css_code = "/**
 * DOMUtil 实现了一些 简单的dom操作
 * 
 * 简单的链式调用
 * 
 * @author junlong.yang
 * @version \$Id: dom.js 12 2015-03-05 04:06:48Z sobird \$
 */
(function(){
	Jaring.dom = {
		get: function(){
			var el = (typeof  === 'string' ? document.getElementById() : );
			//el.__jaring_property_ = el.__jaring_property_ || {};
			Jaring.util.extendIf(el, this,'__jaring_property_');
			return el;
		},

		create: function(tagName){
			var el = document.createElement(tagName);
			//el.__jaring_property_ = el.__jaring_property_ || {};
			Jaring.util.extendIf(el, this,'__jaring_property_');
			return el;
		}
	}
})();";

echo SyntaxHighLighterFactory::parse($css_code, 'js');
