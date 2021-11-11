define(function(require) {
  'use strict';

  return {
    init: function() {
      const Node = require('composite/node'),
        root = new Node('Connie Nielson'),
        child1 = new Node('Maximus'),
        child2 = new Node('Decimus'),
        child3 = new Node('Meridius'),
        child4 = new Node('Marcus'),
        child5 = new Node('Aurelius'),
        child6 = new Node('Commodus'),
        child7 = new Node('Graeccus');
        child8 = new Node('Gladiator');


      root.addChild(child1);  // becomes leaf node
      root.addChild(child2);
      // make child2 a container node
      child2.addChild(child3);
      child2.addChild(child4);
      // make child 4 a parent
      child4.addChild(child5);
      // make child 5 a parent too
      child5.addChild(child6);
      child5.addChild(child7);
      child5.addChild(child8);

      root.traverseDown()



    }
  }
})