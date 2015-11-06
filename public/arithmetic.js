var x = 2;
var y = 15;

function add(a, b)
{
    return a + b;
}

function subtract(a, b)
{
    return add(a, -b);
}

function multiply(a, b)
{
    if (b == 0) {
        return 0;
    }
    if (b == 1) {
        return a;
    }
    return add(a, multiply(a, subtract(b, 1) ) );
    // a + multiply(a, b - 1)
}

function divide(a, b)
{
    if (b === 1) {
        return a;
    }
    if (a === b) {
        return 1;
    }
    if (a < b) {
        return 0;
    }
    return add(1, divide(subtract(a, b), b) );
    // 1 + divide(a - b, b)
}

function power(a, b)
{
    if (b == 0) {
        return 1;
    }
    return multiply(a, power(a, subtract(b, 1) ) );
    // a * power(a, b-1)
}

console.log(x+" to the power of "+y+" equals " + power(x,y));