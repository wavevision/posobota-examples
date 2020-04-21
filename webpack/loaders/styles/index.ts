import { resolve } from 'path';

import MiniCssExtractPlugin from 'mini-css-extract-plugin';
import { RuleSetRule } from 'webpack';

export default (dev: boolean): RuleSetRule[] => [
  {
    test: /\.scss$/,
    use: [
      {
        loader: MiniCssExtractPlugin.loader,
        options: {
          hmr: dev,
        },
      },
      'css-loader',
      {
        loader: 'postcss-loader',
        options: {
          config: {
            path: resolve(__dirname, 'postcss.config.js'),
          },
        },
      },
      'sass-loader',
    ],
  },
];
