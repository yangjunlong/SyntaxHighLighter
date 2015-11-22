<?php
/*
 * main file
 * 
 * @author  Yang,junlong at 2015-11-19 0:18:22 build.
 * @version $Id$
 */

class SyntaxHighLighter {
	/**
	 * code string
	 * 
	 * @var string
	 */
	protected $code = '';

	protected $size = 0;

	/**
	 * code language
	 * 
	 * @var string
	 */
	protected $lang = '';

	//protected $regexList = array();

	/**
	 * regex matchs
	 * 
	 * @var array
	 */
	protected $matchs = array();

	protected $regex = '';


	protected static $commonRegexList = array(
		// 多行注释
		array(
			'regex' => "/\/\\*[\\s\\S]*?\\*\//m",
			'css' => 'comment'
		),

		// 单行注释
		array(
			'regex' => "/\/\/.*$/m", 
			'css' => 'comment'
		),
		
		// 单行#注释
		array(
			'regex' => '/#.*$/m',
			'css' => 'comment'
		),

		// 双引号字符串
		array(
			'regex' => '/"(?:\\.|(\\\\\\")|[^\\""])*"/m',
			'css' => 'string'
		),

		// 单引号字符串
		array(
			'regex' => "/'(?:\\.|(\\\\\\')|[^\\''])*'/m",
			'css' => 'string'
		)
	);

	public function parse($code, $lang) {
		$this->code = $code;
		$this->lang = $lang;
		$this->matchs = array();

		$this->size = strlen($code);

		if(isset($this->regexList)){
			$this->regexList = array_merge($this->regexList, self::$commonRegexList);
		}
		

		$this->processRegexList();

		$result = $this->processMatchs();

		$html = $this->syntaxPackage($result);

		return $html;
	}

	public function processRegexList() {
		$regexList = $this->regexList;

		foreach ($regexList as $regex) {
			$this->getMatchs($regex['regex'], $regex['css']);
		}
	}

	public function getMatchs($regex, $css){

		$code   = $this->code;
		$index  = 0;
		$length = 0;

		while ( preg_match($regex, $code, $matchs)) {

			$matchs  = $this->fixMatchs($matchs, $css);

			if(count($matchs) == 0){
				return;
			}

			foreach ($matchs as  $match => $css2) {
				
				//die();
				$pos    = stripos($code, $match);
				$index  =  $pos + $index + $length;
				$length = strlen($match);
				$code   = substr($code, $pos + $length);

				$replace = $this->placeholder($length);

				$this->code = str_replace($match, $replace, $this->code);

				$this->matchs[] = array(
					'value' => $match,
					'index' => $index,
					'length' => $length,
					'css' => $css2
				);
			}
		}
	}

	public function fixMatchs($matchs, $css){
		return array($matchs[0]=>$css);
	}

	private function placeholder($length) {
		$out = '';
		for ($i=0; $i < $length; $i++) { 
			$out .= ' ';
		}
		return $out;
	}

	private function processMatchs() {
		$code = $this->code;
		$matchs = $this->matchs;

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

		if($this->size > $lastIndex) {
			$result[] = array(
				'value' => substr($code, $lastIndex),
				'index' =>$lastIndex,
				'length' => $this->size - $lastIndex,
				'css' => 'text'
			);
		}

		return $result;
	}

	private function syntaxPackage($result){
		$html = '';

		foreach ($result as $key => $snippet) {
			if($snippet['css'] == 'text'){
				$html .= $snippet['value'];
			} else {
				$html .= '<span class="'.$snippet['css'].'">'.$snippet['value'].'</span>';
			}
			
		}

		if($html == ''){
			return  $this->code;
		}

		return $html;
	}


	public function genRegex($str, $mod = ''){
		return '/\\b' . preg_replace("/ /", '\\b|\\b', $str) . '\\b/' . $mod;
	}
}

class SyntaxHighLighterFactory {

	private static $includedInstance = array();

	public static function parse($code, $lang) {
		$lang = self::fixLang($lang);
		$file = $lang . '.php';

		$cwd = dirname(__FILE__);
		
		$filename = $cwd . DIRECTORY_SEPARATOR . $file;

		if(!file_exists($filename)) {
	        return false;
	    }

		if(!isset(self::$includedInstance[$lang])){
	        include $filename;
	        self::$includedInstance[$lang] = new $lang();
	    }

	    return self::$includedInstance[$lang]->parse($code, $lang);
	}

	private static function fixLang($lang) {
		// 转小写
		$lang = strtolower($lang);

		$langList = array(
			'Javascript' => array('js', 'jscript', 'javascript'),
			'Cpp' => array('cpp', 'c', 'c++'),
			'Csharp'=> array('c#', 'c-sharp', 'csharp'),
			'Css' => array('css', 'less'),
			'Delphi'=> array('delphi', 'pascal'),
			'Java'=> array('java'),
			'Php'=> array('php'),
			'Python'=> array('python', 'py'),
			'Ruby'=> array('ruby', 'rails', 'ror'),
			'Sql'=> array('sql'),
			'Vb'=> array('vb','vb.net'),
			'Xml'=> array('xml', 'xhtml', 'xslt', 'html', 'xhtml'),
		);

		foreach ($langList as $k => $v){
			if(in_array($lang, $v)){
				return $k;
			}
		}

		return 'Javascript';
	}
}