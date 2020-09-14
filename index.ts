/**
 * JavaScript语法高亮插件
 * 
 * sobird<i@sobird.me> at 2020/09/11 11:21:58 created.
 */

export default class Highlighter {
  constructor(public code: string) {
    this.code = code;
  }

  getKeywords(keywords: string): string {
    return '\\b' + keywords.replace(/ /g, '\\b|\\b') + '\\b';
  }

  /**
   *  高亮代码
   * 
   */
  highlight() {

  }
}