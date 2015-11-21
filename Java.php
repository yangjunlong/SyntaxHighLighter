<?php
/**
 * java syntax regex
 * 
 * @author  Yang,junlong at 2015-11-21 11:23:40 build.
 * @version $Id$
 */

class Java extends SyntaxHighLighter{
	
	public function __construct () {
		$keywords =	'abstract assert boolean break byte case catch char class const 
			continue default do double else enum extends 
			false final finally float for goto if implements import 
			instanceof int interface long native new null 
			package private protected public return 
			short static strictfp super switch synchronized this throw throws true 
			transient try void volatile while';

		$this->regexList = array(
			// array(
			// 	'regex' => '/\\b([\\d]+(\\.[\\d]+)?|0x[a-f0-9]+)\\b/i',
			// 	'css' => 'number'
			// ),
			array(
				'regex' => '/(?!\\@interface\\b)\\@[\\$\\w]+\\b/',
				'css' => 'annotation'
			),
			array(
				'regex' => '/\\@interface\\b/',
				'css' => 'keyword'
			),
			array(
				'regex' => $this->genRegex($keywords),
				'css' => 'keyword'
			)
		);
	}
}
