/**
 * rollup.config.js
 * 
 * sobird<i@sobird.me> at 2020/09/14 14:27:43 created.
 */
import resolve from '@rollup/plugin-node-resolve';
import commonjs from '@rollup/plugin-commonjs';
import typescript from '@rollup/plugin-typescript';

export default {
  input: 'brushes/javascript.ts',
  output: {
    dir: 'output',
    format: 'cjs',
  },
  plugins: [
    resolve(),
    commonjs(),
    typescript(/*{ plugin options }*/),
  ]
}