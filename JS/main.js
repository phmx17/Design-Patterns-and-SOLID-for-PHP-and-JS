require(
  ['composite/init'],
  function(composite) {
    'use strict'
    const examples = {
      composite // ES6
    }

    window.runExample = function(example) {
      examples[example].init();
    }
  }
)