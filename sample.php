<?php
/*
 * just test example
 * 
 * @author  Yang,junlong at 2015-11-19 0:16:01 build.
 * @version $Id$
 */

require 'SyntaxHighLighter.php';

$css_code = "fis.config.merge({
    ...
    // 插件配置 
    modules : {
        // 编译单文件
        parser : {
            less : 'less'
        },
        // 标准化预处理单文件
        preprocessor: {
            css: 'image-set'
        },
        // 处理单文件
        postprocessor: {
            js: 'jswrapper'
        },
        // 代码检查
        lint: {
            js : 'jshint'
        },
        // 自动测试
        test: {
            js : 'phantomjs'
        },
        // 优化单文件
        optimizer : {
            js : 'uglify-js',
            tpl : 'tpl-compress'
        },
        // 打包后处理csssprite
        spriter: 'your_spriter'
    }
});";

echo SyntaxHighLighterFactory::parse($css_code, 'javascript');

echo SyntaxHighLighterFactory::parse($css_code, 'javascript');
