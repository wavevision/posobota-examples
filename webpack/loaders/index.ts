import { RuleSetRule } from 'webpack';

import images from './images';
import scripts from './scripts';
import styles from './styles';

export default (dev: boolean): RuleSetRule[] => [
  ...images(),
  ...scripts(dev),
  ...styles(dev),
];
