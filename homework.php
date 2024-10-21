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