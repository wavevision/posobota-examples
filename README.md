<p align="center"><a href="https://github.com/wavevision"><img alt="Wavevision s.r.o." src="https://wavevision.com/images/wavevision-logo.png" width="120" /></a></p>
<h1 align="center">Posobota Examples</h1>

Source codes for [Posobota live stream talk](https://www.youtube.com/watch?v=i7a_4wSacAQ).

💡&ensp;**Topic:** The [Wavevision](https//github.com/wavevision) ecosystem of [Nette](https://github.com/nette) libraries
<br>
👤&ensp;**Authors:** [Jakub Filla](https://github.com/jfilla), [Vít Rozsíval](https://github.com/rozsival)
<br>
🗓&ensp;**Date:** 2020/04/25

## Installation

```bash
git clone git@github.com:wavevision/posobota-examples.git
nvm install
make init
```

> **Note:** For ease of use the project contains lock files for both `npm` and `yarn`.<br>
> The `init` command will prefer `yarn`, but will use `npm` if `yarn` is not installed on your system.

## Development

Use `app/config/local.neon` to customize your setup. Then, start `webpack-dev-server`.

```bash
yarn dev
# or
npm run dev
```

## Libraries

The project shows example usage of:

✍&ensp;[wavevision/coding-standard](https://github.com/wavevision/coding-standard)
<br>
🔌&ensp;[wavevision/di-service-annotation](https://github.com/wavevision/di-service-annotation)
<br>
☕&ensp;[wavevision/latte-filters](https://github.com/wavevision/latte-filters)
<br>
📔&ensp;[wavevision/namespace-translator](https://github.com/wavevision/namespace-translator)
<br>
🧰&ensp;[wavevision/nette-tests](https://github.com/wavevision/nette-tests)
<br>
📦&ensp;[wavevision/nette-webpack](https://github.com/wavevision/nette-webpack)
<br>
🔩&ensp;[wavevision/props-control](https://github.com/wavevision/props-control)
<br>
🧩&ensp;[wavevision/sprites-constants-generator-plugin](https://github.com/wavevision/sprites-constants-generator-plugin)
<br>
🛠&ensp;[wavevision/ts-utils](https://github.com/wavevision/ts-utils)
<br>
🛠&ensp;[wavevision/utils](https://github.com/wavevision/utils)
