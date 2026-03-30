
var fizzBuzz = function (n) {
    var i;

    for (i = 1; i <= n; i++) {
        if (i % 3 === 0 && i % 5 === 0) {
            console.log("FizzBuzz");
        } else if (i % 3 === 0) {
            console.log("Fizz");
        } else if (i % 5 === 0) {
            console.log("Buzz");
        } else {
            console.log(i);
        }
    }
};

console.log("Test 1 :");
fizzBuzz(15);

console.log("Test 2 :");
fizzBuzz(3);

console.log("Test 3 :");
fizzBuzz(5);
