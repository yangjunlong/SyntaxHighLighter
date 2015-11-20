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

		$this->getMatchs("/([:\\w-\.]+)\\s*=\\s*(\".*?\"|\'.*?\'|\\w+)*|(\\w+)/m", 'mixed');

		// $this->getMatchs("/(\&lt;|<)\\*\\?*(?!\\!)|\\*\\?*(\&gt;|>)/m", 'tag');
	}

	public function fixMatchs($matchs, $css){
		$out = array();

		switch ($css) {
			case 'cdata':

				break;
			case 'mixed':
				
				if($matchs[2]){
					$out = array_merge($out, array($matchs[1]=>'attr', $matchs[2]=>'attr-val'));
				}

				if($matchs[0]){
					$out = array_merge($out, array($matchs[0]=>'html'));
				}
				return $out;
				break;
			case 'tag':

				break;
			default:
				
				break;
		}

		return array($matchs[0]=> $css);
	}
}