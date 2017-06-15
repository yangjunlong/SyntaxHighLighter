<?php
/**
 * delphi syntax regex
 * 
 * @author  Yang,junlong at 2015-11-21 11:16:13 build.
 * @version $Id$
 */

class Delphi extends SyntaxHighLighter{
    
    public function __construct () {
        $keywords = 'abs addr and ansichar ansistring array as asm begin boolean byte cardinal 
                    case char class comp const constructor currency destructor div do double 
                    downto else end except exports extended false file finalization finally 
                    for function goto if implementation in inherited int64 initialization 
                    integer interface is label library longint longword mod nil not object 
                    of on or packed pansichar pansistring pchar pcurrency pdatetime pextended 
                    pint64 pointer private procedure program property pshortstring pstring 
                    pvariant pwidechar pwidestring protected public published raise real real48 
                    record repeat set shl shortint shortstring shr single smallint string then 
                    threadvar to true try type unit until uses val var varirnt while widechar 
                    widestring with word write writeln xor';

        $this->regexList = array(
            array(
                'regex' => '/\\(\\*[\\s\\S]*?\\*\\)/m',
                'css' => 'comment'
            ),
            array(
                'regex' => '/{(?!\\$)[\\s\\S]*?}/m',
                'css' => 'comment'
            ),
            array(
                'regex' => $this->genRegex($keywords),
                'css' => 'keyword'
            ),
            array(
                'regex' => '/\\{\\$[a-zA-Z]+ .+\\}/',
                'css' => 'directive'
            ),
            array(
                'regex' => '/\\b[\\d\\.]+\\b/',
                'css' => 'number'
            ),
            array(
                'regex' => '/\\$[a-zA-Z0-9]+\\b/',
                'css' => 'number'
            )
        );
    }
}