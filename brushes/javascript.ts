/**
 * javascript.js
 *
 * sobird<i@sobird.me> at 2020/09/11 13:53:10 created.
 */

import Highlighter from "../index";

export default class Javascript extends Highlighter {
  static aliases: string[] = ['js', 'jscript', 'javascript'];
  keywords: string = `async await abstract arguments boolean break byte case catch char class const continue debugger default delete do double else enum export extends false final finally float for function goto if implements import in instanceof int interface long native new null package private protected public return short static super switch synchronized this throw throws transient true try typeof var void volatile while with yield`;
  regexList: object[] = [
    { 
      regexp: new RegExp(this.getKeywords(this.keywords), 'gm'),
      css: 'keyword'
    }
  ]
  constructor(code: string) {
    super(code);
  }
}


let j = new Javascript('');

console.log(Javascript);