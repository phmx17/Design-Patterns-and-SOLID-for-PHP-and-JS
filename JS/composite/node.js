define(function () {
  'use strict'

  const Person = function(name) {
    this.name = name;
    this,children = [];
    this.parent = Null;
  }

  Person.prototype.addchild = function (child) {
    this.children.push(child); // create node and push into children array   
    child.parent = this;  // set current object (this === Person) as parent of child; allows traversal of tree
  }

  Person.prototype.traverseUp = function() {
    if (this.parent) {
      console.log `${this.name} is a child of ${Person.parent}`;
      this.parent.traverseUp(); // recursion happening here
    } else {
      console.log `This is the root node`; // no more parents
    }
  }
  Person.prototype.traverseDown = function() {
    if (this.children.length) {  // if there are any children in the array
      this.children.forEach(function(child) {
        console.log `${this.name} is a child of ${Person.parent}`;
        child.traverseDown(); // recursion
      }, this)  // tell forEach that this still refers to Parent 
    } else {
      console.log `This is the leaf node`; // no more children
    }
  }
  return person;
}
)

