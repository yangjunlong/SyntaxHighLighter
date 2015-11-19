# 代码语法高亮

> 使用PHP实现的语法高亮库，代码简单，接口易用。

本类库是根据JavaScript版的语法高亮插件的核心代码移植过来，JavaScript版语法高亮插件见如下地址：

http://www.dreamprojections.com/syntaxhighlighter/

## 使用方法
```php
SyntaxHighLighter::parse($code, $lang);
```
`SyntaxHighLighter::parse($code, $lang)`接受两个参数`$code`,`$lang`；`$code`为所要高亮的代码片段，`$lang`为高亮代码的语言类型(比如：css，php，js等)

## 代码示例

```php
require 'SyntaxHighLighter.php';

$css_code = '/*
 * 站点通用基础css样式
 * 
 * @author  Yang,junlong at 2015-3-10 19:32:37 build.
 * @version $Id$
 */

// global stylesheet
body {
    padding: 0;
    margin: 0;
    font-size: 12px;
    font-family: \'Microsoft Yahei\',"微软雅黑",arial,"宋体",sans-serif;
}
#test{
    color: #ccc;
}
// layout
.page {
    width: 780px;
    margin: 0 auto;
    background: #ddd;
    border: 1px solid #ccc;
}';

$result = SyntaxHighLighter::parse($css_code, 'less');
```
## 支持的语言类型

```php
$langList = array(
	'javascript' => array('js', 'jscript', 'javascript'),
	'cpp' => array('cpp', 'c', 'c++'),
	'csharp'=> array('c#', 'c-sharp', 'csharp'),
	'css' => array('css', 'less'),
	'delphi' => array('delphi', 'pascal'),
	'java' => array('java'),
	'php' => array('php'),
	'python'=> array('python', 'py'),
	'ruby' => array('ruby', 'rails', 'ror'),
	'sql'=> array('sql'),
	'vb' => array('vb','vb.net'),
	'xml' => array('xml', 'xhtml', 'xslt', 'html', 'xhtml'),
);
```
