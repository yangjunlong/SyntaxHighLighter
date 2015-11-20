<?php
/**
 * csharp syntax regex
 * 
 * @author  Yang,junlong at 2015-11-21 0:26:19 build.
 * @version $Id$
 */

class Csharp extends SyntaxHighLighter{
	
	public function __construct () {
		$keywords =	'abstract as base bool break byte case catch char checked class const 
					continue decimal default delegate do double else enum event explicit 
					extern false finally fixed float for foreach get goto if implicit in int 
					interface internal is lock long namespace new null object operator out 
					override params private protected public readonly ref return sbyte sealed set 
					short sizeof stackalloc static string struct switch this throw true try 
					typeof uint ulong unchecked unsafe ushort using virtual void while';

		$this->regexList = array(
			// There's a slight problem with matching single line comments and figuring out
			// a difference between // and ///. Using lookahead and lookbehind solves the
			// problem, unfortunately JavaScript doesn't support lookbehind. So I'm at a 
			// loss how to translate that regular expression to JavaScript compatible one.
			array(
				'regex' => "/(?<!/)//(?!/).*$|(?<!/)////(?!/).*$|/\\*[^\\*]*(.)*?\\*//m", // one line comments starting with anything BUT '///' and multiline comments
				'css' => 'comment'
			),
			array(
				'regex' => "/(?<!/)///(?!/).*$/",
				'css' => 'comments' // XML comments starting with ///
			),
			array(
				'regex' => "/\\s*#.*/m",
				'css' => 'preprocessor'
			),
			array(
				'regex' => $this->genRegex($keywords),
				'css' => 'builtin'
			)
		);
	}
}
