# 代码语法高亮

> 使用PHP实现的语法高亮库，代码简单，接口易用。

本类库是根据JavaScript版的语法高亮插件的核心代码移植过来，JavaScript版语法高亮插件见如下地址：

http://www.dreamprojections.com/syntaxhighlighter/

## 使用方法

```php
require 'SyntaxHighLighter.php';


$result = SyntaxHighLighter::parse($css_code, 'less');
```
