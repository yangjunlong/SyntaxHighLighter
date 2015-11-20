<?php
/*
 * css syntax regex
 * 
 * @author  Yang,junlong at 2015-11-18 23:56:47 build.
 * @version $Id$
 */

class Css extends SyntaxHighLighter{
	// 正则表达式列表
	public function __construct () {
		$keywords =	'ascent azimuth background-attachment background-color background-image background-position 
					background-repeat background baseline bbox border-collapse border-color border-spacing border-style border-top 
					border-right border-bottom border-left border-top-color border-right-color border-bottom-color border-left-color 
					border-top-style border-right-style border-bottom-style border-left-style border-top-width border-right-width 
					border-bottom-width border-left-width border-width border bottom cap-height caption-side centerline clear clip color 
					content counter-increment counter-reset cue-after cue-before cue cursor definition-src descent direction display 
					elevation empty-cells float font-size-adjust font-family font-size font-stretch font-style font-variant font-weight font 
					height letter-spacing line-height list-style-image list-style-position list-style-type list-style margin-top 
					margin-right margin-bottom margin-left margin marker-offset marks mathline max-height max-width min-height min-width orphans 
					outline-color outline-style outline-width outline overflow padding-top padding-right padding-bottom padding-left padding page 
					page-break-after page-break-before page-break-inside pause pause-after pause-before pitch pitch-range play-during position 
					quotes richness right size slope src speak-header speak-numeral speak-punctuation speak speech-rate stemh stemv stress 
					table-layout text-align text-decoration text-indent text-shadow text-transform unicode-bidi unicode-range units-per-em 
					vertical-align visibility voice-family volume white-space widows width widths word-spacing x-height z-index important';

		$values =	'above absolute all always aqua armenian attr aural auto avoid baseline behind below bidi-override black blink block blue bold bolder 
					both bottom braille capitalize caption center center-left center-right circle close-quote code collapse compact condensed 
					continuous counter counters crop cross crosshair cursive dashed decimal decimal-leading-zero default digits disc dotted double 
					embed embossed e-resize expanded extra-condensed extra-expanded fantasy far-left far-right fast faster fixed format fuchsia 
					gray green groove handheld hebrew help hidden hide high higher icon inline-table inline inset inside invert italic 
					justify landscape large larger left-side left leftwards level lighter lime line-through list-item local loud lower-alpha 
					lowercase lower-greek lower-latin lower-roman lower low ltr marker maroon medium message-box middle mix move narrower 
					navy ne-resize no-close-quote none no-open-quote no-repeat normal nowrap n-resize nw-resize oblique olive once open-quote outset 
					outside overline pointer portrait pre print projection purple red relative repeat repeat-x repeat-y rgb ridge right right-side 
					rightwards rtl run-in screen scroll semi-condensed semi-expanded separate se-resize show silent silver slower slow 
					small small-caps small-caption smaller soft solid speech spell-out square s-resize static status-bar sub super sw-resize 
					table-caption table-cell table-column table-column-group table-footer-group table-header-group table-row table-row-group teal 
					text-bottom text-top thick thin top transparent tty tv ultra-condensed ultra-expanded underline upper-alpha uppercase upper-latin 
					upper-roman url visible wait white wider w-resize x-fast x-high x-large x-loud x-low x-slow x-small x-soft xx-large xx-small yellow';

		$fonts =	'[mM]onospace [tT]ahoma [vV]erdana [aA]rial [hH]elvetica [sS]ans-serif [sS]erif';

		$htmls = 	'html head meta title link style body h1 h2 h3 h4 h5 h6 b strong i em u del center ul ol li a font sub sup br hr p img 
					table thead tbody tfoot tr th td form frame pre code fieldset lengend button textarea input dl dt dd blockquote select 
					address cite dfn var kbd samp small embed caption';

		$colors    = "/\\#[a-zA-Z0-9]{3,6}/";

		$units     = "/(\\d+)(px|pt|em)/";

		$idname = "/(\#.*)[ ]*{/m";

		$classname = "/(\..*)[ ]*{/m";


		$this->regexList = array(
			array(
				'regex' => $colors,
				'css' => 'comment'
			),
			array(
				'regex' => $units,
				'css' => 'unit'
			),
			array(
				'regex' => $idname,
				'css' => 'idname'
			),
			array(
				'regex' => $classname,
				'css' => 'classname'
			),
			array(
				'regex' => $this->genRegex($keywords),
				'css' => 'keyword'
			),
			array(
				'regex' => $this->genRegex($values),
				'css' => 'values'
			),
			array(
				'regex' => $this->genRegex($fonts),
				'css' => 'fonts'
			),
			array(
				'regex' => $this->genRegex($htmls),
				'css' => 'tag'
			)
		);
	}

	// 对正则特殊处理
	public function fixMatchs($matchs){
		if($this->css == 'classname'){
			return array($matchs[1]);
		}
		return array($matchs[0]);
	}
}
