<?php
/**
 * html syntax regex
 * 
 * @author  Yang,junlong at 2015-11-19 13:43:50 build.
 * @version $Id$
 */

class Xml extends SyntaxHighLighter{
	// 正则表达式列表
	public function processRegexList() {
		
		// Match CDATA in the following format <![ ... [ ... ]]>
		// (\&lt;|<)\!\[[\w\s]*?\[(.|\s)*?\]\](\&gt;|>)
		$this->getMatchs("/(\&lt;|<)\\!\\[[\\w\\s]*?\\[(.|\\s)*?\\]\\](\&gt;|>)/", 'cdata');

		// Match comments
		// (\&lt;|<)!--\s*.*\s*?--(\&gt;|>)
		$this->getMatchs("/(\&lt;|<)!--\\s*.*\\s*?--(\&gt;|>)/m", 'comment');
	}
}