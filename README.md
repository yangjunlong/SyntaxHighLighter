# 代码语法高亮

> 使用PHP实现的语法高亮库，代码简单，接口易用。

本类库是根据JavaScript版的语法高亮插件的核心代码移植过来，JavaScript版语法高亮插件见如下地址：

## 使用方法
```php
SyntaxHighLighterFactory::parse($code, $lang);
```
`SyntaxHighLighterFactory::parse($code, $lang)`接受两个参数`$code`,`$lang`；`$code`为所要高亮的代码片段，`$lang`为高亮代码的语言类型(比如：css，php，js等)

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

$result = SyntaxHighLighterFactory::parse($css_code, 'less');
```
## 支持的语言类型

```php
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
```
## 参考

[JavaScript版的语法高亮插件](http://www.dreamprojections.com/syntaxhighlighter/)