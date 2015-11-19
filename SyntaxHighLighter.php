<?php
/*
 * main file
 * 
 * @author  Yang,junlong at 2015-11-19 0:18:22 build.
 * @version $Id$
 */

class SyntaxHighLighter {
	private static $regexList = array(
		// 单行注释
		array(
			'regex' => "/\/\/.*$/", 
			'css' => 'comment'
		),
		// 多行注释
		array(
			'regex' => "/\/\\*[\\s\\S]*?\\*\//m",
			'css' => 'comment'
		),
		// 单行#注释
		array(
			'regex' => '/#.*$/m',
			'css' => 'comment'
		),

		// 双引号字符串
		array(
			'regex' => '/"(?:\\.|(\\\\\\")|[^\\""])*"/',
			'css' => 'string'
		),

		// 单引号字符串
		array(
			'regex' => "/'(?:\\.|(\\\\\\')|[^\\''])*'/m",
			'css' => 'string'
		)
	);
	public static function parse($code, $lang) {
		$lang = self::fixLang($lang);
		$regexList = self::importRegex($lang);

		$regexList = array_merge(self::$regexList, $regexList);

		$matchs = self::processRegexList($code, $regexList);

		$result = self::processMatchs($code, $matchs);

		$html = self::syntaxPackage($result);

		return $html;
	}

	private static function fixLang($lang) {
		$langList = array(
			'javascript' => array('js', 'jscript', 'javascript'),
			'cpp' => array('cpp', 'c', 'c++'),
			'csharp'=> array('c#', 'c-sharp', 'csharp'),
			'css' => array('css', 'less'),
			'delphi'=>array('delphi', 'pascal'),
			'java'=>array('java'),
			'php'=>array('php'),
			'python'=>array('python', 'py'),
			'ruby'=>array('ruby', 'rails', 'ror'),
			'sql'=>array('sql'),
			'vb'=>array('vb','vb.net'),
			'xml'=>array('xml', 'xhtml', 'xslt', 'html', 'xhtml'),
		);

		foreach ($langList as $k => $v){
			if(in_array($lang, $v)){
				return $k;
			}
		}

		return 'javascript';
	}

	private static function importRegex($lang) {
		$file = $lang . '.php';

		if(!file_exists($file)) {
	        return false;
	    }

		static $includedRegex = array();

		if(!isset($includedRegex[$lang])){
			$genRegex = function($str){
				return '/\\b' . preg_replace("/ /", '\\b|\\b', $str) . '\\b/';
			};
	        $langFun = include $file;
	        $includedRegex[$lang] = $langFun($genRegex);
	    }

	    return $includedRegex[$lang];
	}

	private static function processRegexList($code, $regexList) {
		foreach ($regexList as $key => $regex) {
			$_code = $code;
			$_index = 0;
			$_length = 0;

			while ( preg_match($regex['regex'], $_code, $matchs)) {
				//echo $code ."\n\n";

				$mtc = $matchs[0];
				

				$pos = stripos($_code, $mtc );

				$_index =  $pos+$_index+$_length;

				$_length = strlen($mtc);

				$_code = substr($_code, $pos+$_length);

				$_matchs[] = array(
					'value' => $mtc,
					'index' =>$_index,
					'length' => $_length,
					'css' => $regex['css']
				);

				//print_r($matchs);
			}
		}

		return $_matchs;
	}

	private static function processMatchs($code, $matchs) {
		// 根据index为$matchs排序
		usort($matchs, function($a, $b){
			if($a['index'] < $b['index']){
				return -1;
			} else if($a['index'] > $b['index']){
				return 1;
			} else {
				// if index is the same, sort by length
				if($a['length'] < $b['length'])
					return -1;
				else if($a['length'] > $b['length'])
					return 1;
			}
			return 0;
		});

		$lastIndex = 0;

		$result = array();
		foreach ($matchs as $key => $value) {
			if($value['index'] > $lastIndex){
				$start = $lastIndex;
				$end = $value['index'];

				$result[] = array(
					'value' => substr($code, $start, $end-$start),
					'index' =>$start,
					'length' => $end-$start,
					'css' => 'text'
				);

			}

			$result[] = $value;
			
			$lastIndex = $value['index'] + $value['length'];
		}

		return $result;
	}

	private static function syntaxPackage($result){
		$html = '';

		foreach ($result as $key => $snippet) {
			$html .= '<span class="'.$snippet['css'].'">'.$snippet['value'].'</span>';
		}

		return $html;
	}
}