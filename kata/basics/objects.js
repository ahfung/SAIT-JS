// object literal notation

var o = {
  name: "Jack",
  favColour: "red",
  describe: function()
  {
    console.log(this.name);
  }
};

console.log(o.describe());

// constructor notation

function Person() {
  this.name = "Jack";
  this.favColour = "red";
}

var person = new Person();
