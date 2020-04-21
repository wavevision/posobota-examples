import { resolve } from 'path';

import { RuleSetRule } from 'webpack';

export default (dev: boolean): RuleSetRule[] => [
  {
    test: /\.ts$/,
    exclude: /node_modules/,
    enforce: 'pre',
    loader: 'eslint-loader',
    options: {
      configFile: resolve(__dirname, '..', '..', '..', '.eslintrc.js'),
      emitError: !dev,
      emitWarning: dev,
    },
  },
  {
    test: /\.ts$/,
    exclude: /node_modules/,
    use: ['cache-loader', 'ts-loader'],
  },
];
