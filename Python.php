<?php
/**
 * python syntax regex
 * 
 * @author  Yang,junlong at 2015-11-20 18:55:12 build.
 * @version $Id$
 */

class Python extends SyntaxHighLighter{
	
	public function __construct () {
		$keywords =	'and assert break class continue def del elif else 
					except exec finally for from global if import in is 
					lambda not or pass print raise return try yield while';

		$special =  'None True False self cls class_';

		$this->regexList = array(
			array(
				'regex' => "/^\\s*@\\w+/m",
				'css' => 'decorator'
			),
			array(
				'regex' => "/(['\"]{3})([^\\1])*?\\1/m",
				'css' => 'comment'
			),
			array(
				'regex' => '/"(?!")(?:\\.|\\\\\\"|[^\\""\\n\\r])*"/',
				'css' => 'string'
			),
			array(
				'regex' => "/'(?!').*(?:\\.|(\\\\\\')|[^\\''\\n\\r])*'/m",
				'css' => 'string'
			),
			array(
				'regex' => "/\\b\\d+\\.?\\w*'/",
				'css' => 'number'
			),
			array(
				'regex' => $this->genRegex($keywords),
				'css' => 'keyword'
			),
			array(
				'regex' => $this->genRegex($special),
				'css' => 'special'
			)
		);
	}
}