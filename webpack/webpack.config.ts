import { resolve } from 'path';

import MiniCssExtractPlugin from 'mini-css-extract-plugin';
import SpritesConstantsGeneratorPlugin from '@wavevision/sprites-constants-generator-plugin';
import StyleLintPlugin from 'stylelint-webpack-plugin';
import SVGSpriteLoaderPlugin from 'svg-sprite-loader/plugin';
import merge from 'deepmerge';
import { Configuration } from 'webpack';

import makeLoaders from './loaders';
import { DEV, helper, makeEntry, ROOT } from './utils';

const baseConfig: Configuration = {
  entry: makeEntry(),
  module: {
    rules: makeLoaders(DEV),
  },
  target: 'web',
  plugins: [
    new MiniCssExtractPlugin({
      filename: DEV ? '[name].css' : '[name].[hash].css',
    }),
    new SpritesConstantsGeneratorPlugin({
      namespace: 'Wavevision\\PosobotaExamples\\UI\\Sprites',
      output: resolve(ROOT, 'app', 'PosobotaExamples', 'UI', 'Sprites'),
      sprites: ['flags.svg'],
    }),
    new SVGSpriteLoaderPlugin({ plainSprite: true }),
    new StyleLintPlugin({
      configFile: resolve(__dirname, '..', 'stylelint.config.js'),
      emitErrors: !DEV,
      files: ['app/**/*.scss'],
    }),
    helper.createManifestPlugin(),
  ],
  resolve: {
    extensions: ['.ts', '.js'],
  },
};

const makeConfig = (config: Configuration): Configuration =>
  merge(baseConfig, config, {
    arrayMerge: (target, source) => [...source, ...target],
  });

export default makeConfig;
