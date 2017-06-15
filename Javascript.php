<?php
/**
 * javascript syntax regex
 * 
 * @author  Yang,junlong at 2015-11-20 17:36:12 build.
 * @version $Id$
 */

class Javascript extends SyntaxHighLighter{
    
    public function __construct () {
        $keywords = 'abstract boolean break byte case catch char class const continue debugger 
                    default delete do double else enum export extends false final finally float 
                    for function goto if implements import in instanceof int interface long native 
                    new null package private protected public return short static super switch 
                    synchronized this throw throws transient true try typeof var void volatile while with';

        $preprocessor = "/^\\s*#.*/m";

        $this->regexList = array(
            array(
                'regex' => $this->genRegex($keywords),
                'css' => 'keyword'
            ),
            array(
                'regex' => $preprocessor,
                'css' => 'preprocessor'
            )
        );
    }
}
