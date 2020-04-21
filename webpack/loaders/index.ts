import { RuleSetRule } from 'webpack';

import scripts from './scripts';
import styles from './styles';

export default (dev: boolean): RuleSetRule[] => [
  ...scripts(dev),
  ...styles(dev),
];
