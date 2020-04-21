import OptimizeCssAssetsPlugin from 'optimize-css-assets-webpack-plugin';
import TerserPlugin from 'terser-webpack-plugin';
import { CleanWebpackPlugin } from 'clean-webpack-plugin';
import { optimize } from 'webpack';

import makeConfig from './webpack.config';

export default makeConfig({
  mode: 'production',
  devtool: 'source-map',
  optimization: {
    minimizer: [
      new OptimizeCssAssetsPlugin({
        cssProcessorPluginOptions: {
          preset: ['default', { discardComments: { removeAll: true } }],
        },
      }),
      new TerserPlugin({
        extractComments: false,
        sourceMap: true,
        terserOptions: {
          mangle: true,
          output: {
            comments: false,
          },
        },
      }),
    ],
  },
  plugins: [new CleanWebpackPlugin(), new optimize.OccurrenceOrderPlugin(true)],
  stats: 'minimal',
});
