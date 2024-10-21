<!-- 1 Dynamic Type Conversion: Write a program that accepts two inputs from a user. If both are
numeric, multiply them; if one is a string, concatenate the values; if both are strings, sort them
alphabetically. Handle type conversion dynamically. -->

<?php

function dynamicTypeConversion($input1 , $input2) {

    if(is_numeric($input1) && is_numeric($input2)):

        return $input1 * $input2;

    elseif(is_string($input1) && is_string($input2)):

        $input1 .= $input2;
        $alphabetArray = str_split($input1);
        sort($alphabetArray);
        return implode(' ',$alphabetArray);

    else:
        return $input1.$input2;

    endif;
}

// echo dynamicTypeConversion('jan','bcdi');



// 2 Constant Functionality: Create a constant EXCHANGE_RATE for converting between USD and EUR.
// Write a function that dynamically converts an array of amounts from USD to EUR and vice versa,
// based on user input.


define("EXCHANGE_RATE",0.85);

function convertCurrency($amounts , $toEUR = true){

    $converted = '';
        if($toEUR):
            $converted = $amounts * EXCHANGE_RATE;
        else:
            $converted = $amounts / EXCHANGE_RATE;
        endif;
    return $converted;
} 


// echo convertCurrency(100,false);


// 3 String Manipulation: Write a PHP program that accepts a multi-sentence paragraph as input, splits
// the sentences into an array, and then reverses the order of the words in each sentence, printing
// the result in one string


function reverseWordsInSentences($paragraph){
    $sentences = explode('. ',$paragraph);
    foreach ($sentences as &$sentence) {
        $words = explode(' ', $sentence);
        $sentence = implode(' ',array_reverse($words));
    }
    return implode(". ",$sentences);
}

// $paragraph = "PHP is a scripting lanuage It is widely used.";
// echo reverseWordsInSentences($paragraph);


// 4 Data Types and Error Handling: Write a program that dynamically detects and outputs the data
// types of different variables passed to it. If an invalid type (like resource) is encountered, throw an
// exception


function detectDataType($var) {
    if(is_resource($var)):
        throw new Exception("Resource type is not allowed");
    else:
        return gettype($var);
    endif;
}

// echo detectDataType(123);


// 5 Complex Conditional Operations: Write a PHP script that accepts a number. If the number is
// divisible by 3 and 5, print "FizzBuzz". If divisible by 3, print "Fizz". If divisible by 5, print "Buzz".
// However, if the number is prime, print "Prime" regardless of its divisibility


function isPrime($num) {
    if ($num < 2) return false;
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) return false;
    }
    return true;
}

function fizzBuzz($num) {
    if (isPrime($num)) {
        return "Prime";
    } elseif ($num % 3 == 0 && $num % 5 == 0) {
        return "FizzBuzz";
    } elseif ($num % 3 == 0) {
        return "Fizz";
    } elseif ($num % 5 == 0) {
        return "Buzz";
    } else {
        return $num;
    }
}

// echo fizzBuzz(15);
// echo fizzBuzz(7);





// 6 Bitwise Operators and Puzzles: Write a PHP program that uses bitwise operators to determine if
// two integers are equal or not without using comparison operators (== or ===).

function areEqual($input1,$input2) {
    return !($input1 ^ $input2);
}

// echo areEqual(5,4);



// 7 Logical Operators in Complex Conditions: Create a function that accepts a series of boolean
// conditions and performs multiple logical operations (AND, OR, NOT) on them to evaluate a
// complex decision tree, returning the final result.


function complexLogic($conditions) {
    return ($conditions[0] && !$conditions[1]) || $conditions[2];
}

// $conditions = [true , false , false];
// echo complexLogic($conditions);


// 8 Nested Conditional Logic: Create a dynamic discount calculator where the discount depends on
// user loyalty (if-else tree). If the user has been a member for over 5 years, they get a 30% discount;
// for 3-5 years, they get 20%; less than 3 years, they get 10%. Additional conditions include whether
// they are premium members, which increases their discount by 10%


function discountCulator($yearsMember , $isPremium = false) {
    
    switch ($yearsMember){
        case ($yearsMember >5):
            $discount = 30;
            break;
        case ($yearsMember >= 3):
            $discount = 20;
            break;
        default:
            $discount = 10;
    }
    if($isPremium):
        $discount += 10;
    endif;

    return $discount;
}

// echo discountCulator(10,true);


// 9 Ternary Challenges: Write a program that uses multiple nested ternary operators to evaluate a
// series of complex conditions based on user input (like age, membership status, and amount of
// purchase) and returns a personalized message based on the results


function ternaryChallenge($age, $isMember, $purchaseAmount) {
    return ($age >= 18) ? ($isMember ? ($purchaseAmount > 100 ? 'Gold Member' : 'Silver Member') : 'Gest') : 'Underage';
}

// echo ternaryChallenge(18,true ,150);



// 10 Switch Statement Puzzle: Using a switch statement, create a simple calculator that takes a string
// input (like "5 + 2" or "8 * 3") and calculates the result. Handle errors for unsupported operations
// or invalid input formats


function calculates($input)
{
    list($num1, $operator, $num2) = explode(' ', $input);
    $num1 = (float) $num1;
    $num2 = (float) $num2;
    switch ($operator) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        case '/':
            return ($num2 != 0) ? $num1 / $num2 : "Division by zero error";
        default:
            return "Invalid operater";
    }
}


// echo calculates("3 / 4");// between numbers and operator space is included = 3 space + space 4



// 11 Nested Loops and Patterns: Write a PHP script that prints the following pattern using nested loops
// for any user-defined size:
// Copy code
// 1
// 1 2
// 1 2 3
// 1 2 3 4
// The size of the pyramid should be dynamically provided by the user.


function printLoops(int $input){

    for($i = 1; $i <= $input; $i++):
        for($j = 1; $j <= $i; $j++){
            echo $j." ";
        }
        echo '<br>';
    endfor;
}

// printLoops(4);




// 12 Dynamic Loop Generation: Write a program that accepts an integer from the user, then generates
// an array of random integers between 1 and 100. Calculate the sum of the integers using a for loop,
// but skip every second number in the array using the continue statement


class Loop {

    public function generateRandomArray($size) {
        $array = [];
        for ($i = 0; $i < $size; $i++) {
            $array[] = rand(1, 100);
        }
        $calculate = $this->calculateSum($array);
        return [$array ,$calculate];
    }
    public function calculateSum($array) {
        $sum = 0;
        for ($i = 0; $i < count($array); $i++) {
            if ($i % 2 == 0) {  
               $totle = 'Totle array value = ' .$sum += $array[$i];
            }
        }
        return $totle;
    }
}

// $loop = new Loop();

// print_r($loop->generateRandomArray(10));


// 13 Fibonacci Sequence with Loops: Write a PHP function that generates and returns the Fibonacci
// sequence up to a user-specified number using a while loop


function fibonacci($n) {
    $sequence = [0, 1];
    $i = 2;
    while ($i < $n) {
        $sequence[] = $sequence[$i - 1] + $sequence[$i - 2];
        $i++;
    }
    return $sequence;
}

// print_r(fibonacci(20));


// 14 Prime Number Finder (Optimized Loop): Write a PHP function that takes a number as input and
// returns an array of all prime numbers between 1 and the given number. Optimize the loop to
// minimize the number of iterations (hint: loop only until the square root of the number)


function findPrimes($limit) {
    $primes = [];
    for ($num = 2; $num <= $limit; $num++) {
        $isPrime = true;
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) {
                $isPrime = false;
                break;
            }
        }
        if ($isPrime) {
            $primes[] = $num;
        }
    }
    return $primes;
}

// print_r(findPrimes(50));


// 15 Array Sorting: Write a PHP program that takes an associative array of product names and their
// prices, then sorts the array by price (highest to lowest) while maintaining the key-value
// associations


function sortByPrice($products) {
    uasort($products, function($a, $b) {
        return $b - $a;  
    });
    return $products;
}

// $products = ["Apple" => 100, "Banana" => 50, "Orange" => 75];
// print_r(sortByPrice($products));


// 16 Multi-Dimensional Array Manipulation: Given a multi-dimensional array that represents students
// and their exam scores across subjects, write a function that finds the student with the highest
// average score and prints their name and average

function findTopStudent($students) {
    $topStudent = "";
    $highestAverage = 0;

    foreach ($students as $student => $scores) {
        $average = array_sum($scores) / count($scores);
        if ($average > $highestAverage) {
            $highestAverage = $average;
            $topStudent = $student;
        }
    }

    return [$topStudent, $highestAverage];
}

$students = [
    "Ahamd" => [90, 85, 88],
    "Ali" => [92, 78, 84],
    "Amir" => [85, 90, 93]
];

// list($topStudent, $average) = findTopStudent($students);
// echo "Top student: $topStudent with an average score of $average\n"; 



// 17 Array Search with Conditions: Create a function that accepts an array of numbers and a threshold.
// The function should search the array and return all numbers greater than the threshold. Use array
// functions and loops in combination


function searchAboveThreshold($array, $threshold) {
    $result = array_filter($array, function($number) use ($threshold) {
        return $number > $threshold;
    });
    return $result;
}

// $array = [10, 25, 50, 75, 100];
// $threshold = 50;
// print_r(searchAboveThreshold($array, $threshold)); 



// 18 Array Mapping and Filter Challenge: Write a program that takes an array of words and filters out
// all words that contain vowels. Then, apply a function to the resulting array to reverse each word,
// and print the modified array.


function filterAndReverseWords($words) {
    $vowels = ['a', 'e', 'i', 'o', 'u'];
    $filtered = array_filter($words, function($word) use ($vowels) {
        return !preg_match('/[aeiou]/i', $word);
    });

    $reversed = array_map(function($word) {
        return strrev($word);
    }, $filtered);

    return $reversed;
}

// $words = ["apple", "sky", "cloud", "php", "code"];
// print_r(filterAndReverseWords($words));



// 19 Associative Array Merge: Given two associative arrays of student names and their scores, merge
// the two arrays into one while keeping the higher score for students who appear in both arrays.


function mergeScores($array1, $array2) {
    foreach ($array2 as $student => $score) {
        if (isset($array1[$student])) {
            $array1[$student] = max($array1[$student], $score);
        } else {
            $array1[$student] = $score;
        }
    }
    return $array1;
}

$scores1 = ["Ahmad" => 85, "Ali" => 90, "Amir" => 75];
$scores2 = ["Ahmad" => 95, "Ali" => 88, "Amir" => 80];

// print_r(mergeScores($scores1, $scores2));


// 20 Recursive Function for Palindrome: Write a recursive function to check if a given string is a
// palindrome. The function should only use recursion (no loops) and return true if the string is a
// palindrome, false otherwise



function isPalindrome($str) {
    $str = strtolower(preg_replace("/[^A-Za-z0-9]/", "", $str));
    if (strlen($str) <= 1) {
        return true;
    }
    if ($str[0] !== $str[strlen($str) - 1]) {
        return false;
    }
    return isPalindrome(substr($str, 1, -1));
}

// echo isPalindrome("A man a plan a canal Panama");
// echo isPalindrome("Hello");


// 21 Anonymous Function with Array Processing: Write an anonymous function that is passed to the
// array_filter() function to filter an array of numbers. The anonymous function should only return
// numbers that are divisible by both 3 and 7.

$array = [21, 42, 63, 84, 100, 105];

$filtered = array_filter($array, function($number) {
    return $number % 3 == 0 && $number % 7 == 0;
});

// print_r($filtered);


// 22 Closure and Callback Functions: Write a function that accepts an array of numbers and a callback
// function as parameters. The function should apply the callback to each element of the array and
// return the transformed array. Use a closure to define the callback.


function processArrayWithCallback($array, $callback) {
    return array_map($callback, $array);
}

$callback = function($num) {
    return $num * 2;
};

$array = [1, 2, 3, 4, 5];
// print_r(processArrayWithCallback($array, $callback));



// 23 Function Chaining: Implement a class with methods that manipulate strings (e.g., uppercase,
// reverse, add prefix/suffix). The methods should be chainable, allowing multiple operations on a
// string in a single statement


class StringManipulator {
    private $str;

    public function __construct($str) {
        $this->str = $str;
    }

    public function toUpperCase() {
        $this->str = strtoupper($this->str);
        return $this;
    }

    public function reverse() {
        $this->str = strrev($this->str);
        return $this;
    }

    public function addPrefix($prefix) {
        $this->str = $prefix . $this->str;
        return $this;
    }

    public function getResult() {
        return $this->str;
    }
}

// $manipulator = new StringManipulator("hello");
// echo $manipulator->toUpperCase()->reverse()->addPrefix("Say: ")->getResult();



// 24 Dynamic Function Creation: Write a function that accepts the name of a mathematical operation
// (like add, subtract, multiply, or divide) and dynamically creates a function that performs the
// corresponding operation on two numbers. Invoke this dynamic function.



function createOperation($operation)
{
    // return $operation;
    switch ($operation) {
        case 'add':
            return function (float $num1 ,float $num2){ return $num1 + $num2; };
        case 'subtract':
            return function (float $num1 ,float $num2){ return $num1 - $num2; };
        case 'multiply':
            return function (float $num1 ,float $num2){ return $num1 * $num2; };
        case 'divide':
            return function (float $num1 ,float $num2){ return ($num2 != 0) ? $num1 / $num2 : "Divide by zero error"; };
    }
}
// $operation = createOperation('add');
// echo $operation(4,5);


// 25 Higher-Order Functions: Write a PHP function that takes another function as an argument and
// applies it to every element in a 2D array of numbers. The higher-order function should return a
// transformed 2D array.


function applyTo2DArray($array, $func) {
    return array_map(function($row) use ($func) {
        return array_map($func, $row);
    }, $array);
}

$array2D = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];
$func = function($num) { return $num * 10; };

// print_r(applyTo2DArray($array2D, $func));




// 26 Memoization with Recursive Functions: Write a recursive PHP function that computes the nth
// Fibonacci number. Use memoization to store intermediate results and improve performance for
// large n


function fibonacciMemo($n, &$memo = []) {
    if ($n <= 1) return $n;
    if (isset($memo[$n])) return $memo[$n];

    $memo[$n] = fibonacciMemo($n - 1, $memo) + fibonacciMemo($n - 2, $memo);
    return $memo[$n];
}

// echo fibonacciMemo(30);