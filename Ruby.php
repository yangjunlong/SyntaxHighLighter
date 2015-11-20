<?php
/**
 * ruby syntax regex
 * 
 * @author  Yang,junlong at 2015-11-21 0:01:24 build.
 * @version $Id$
 */

class Ruby extends SyntaxHighLighter{
	
	public function __construct () {
		$keywords =	'alias and BEGIN begin break case class def define_method defined do each else elsif 
					END end ensure false for if in module new next nil not or raise redo rescue retry return 
					self super then throw true undef unless until when while yield';

		$builtins =	'Array Bignum Binding Class Continuation Dir Exception FalseClass File::Stat File Fixnum Fload 
					Hash Integer IO MatchData Method Module NilClass Numeric Object Proc Range Regexp String Struct::TMS Symbol 
					ThreadGroup Thread Time TrueClass'

		$preprocessor = "/^\\s*#.*/m";

		$this->regexList = array(
			array(
				'regex' => $this->genRegex($keywords),
				'css' => 'keyword'
			),
			array(
				'regex' => $this->genRegex($builtins),
				'css' => 'builtin'
			),
			array(
				'regex' => "/:[a-z][A-Za-z0-9_]*/",
				'css' => 'symbol'
			),
			array(
				'regex' => "(\\$|@@|@)\\w+",
				'css' => 'variable'
			)
		);
	}
}
