<?php
/*
 * just test example
 * 
 * @author  Yang,junlong at 2015-11-19 0:16:01 build.
 * @version $Id$
 */

require 'SyntaxHighLighter.php';

$css_code = 'import datetime
import sublime_plugin
class AddCurrentTimeCommand(sublime_plugin.TextCommand):
    def run(self, edit):
        self.view.run_command("insert_snippet", 
            {
               "contents": "/**""\n"
                " * ${1:Description}""\n"
                " * ""\n"
                " * @author  Yang,junlong at " "%s" " build." %datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S") +"\n"
                " * @version \$Id\$""\n"
                " */"                
            }
        )';

echo SyntaxHighLighterFactory::parse($css_code, 'py');
