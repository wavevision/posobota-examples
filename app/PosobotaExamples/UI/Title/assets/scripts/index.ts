import getElementByClassName from '@wavevision/ts-utils/dom/getElementByClassName';

const TITLE = 'title';
const VISIBLE = `${TITLE}--visible`;

const init = (): void => {
  const title = getElementByClassName(TITLE);
  if (title) title.classList.add(VISIBLE);
};

export default { init };
