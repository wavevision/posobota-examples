import { basename, dirname } from 'path';

import SpritesConstantsGeneratorPlugin from '@wavevision/sprites-constants-generator-plugin';
import { RuleSetRule } from 'webpack';

export default (): RuleSetRule[] => [
  {
    test: /\.png$/,
    use: [
      {
        loader: 'file-loader',
        options: {
          esModule: false,
          name: '[name].[ext]?[hash]',
        },
      },
      {
        loader: 'image-webpack-loader',
      },
    ],
  },
  {
    test: /\.svg$/,
    use: [
      {
        loader: 'svg-sprite-loader',
        options: {
          extract: true,
          runtimeGenerator: SpritesConstantsGeneratorPlugin.runtimeGenerator,
          spriteFilename: (pathname: string): string =>
            `${basename(dirname(pathname))}.svg`,
          symbolId: '[name]',
        },
      },
      'image-webpack-loader',
    ],
  },
];
