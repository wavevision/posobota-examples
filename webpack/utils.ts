import { resolve } from 'path';

import WebpackHelper from '@wavevision/nette-webpack/dist/WebpackHelper';
import { Entry } from 'webpack';

export const DEV = process.env.NODE_ENV !== 'production';
export const ROOT = resolve(__dirname, '..');

export const helper = new WebpackHelper({
  neonPath: resolve(ROOT, 'app', 'config', 'webpack.neon'),
  wwwDir: resolve(ROOT, 'www'),
});

export const makeEntry = (): Entry => {
  const entries: Entry = {};
  const devServerUrl = helper.getDevServerUrl();
  for (const entry of helper.getEnabledEntries()) {
    const base = [resolve(ROOT, 'app', 'assets', `${entry}.ts`)];
    entries[entry] = DEV
      ? [`webpack-dev-server/client?${devServerUrl.href}`, ...base]
      : base;
  }
  return entries;
};
