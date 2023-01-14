<?php 
/**
 * Правильная скобочная последовательность
 */

 /**
  * Правила оценки сложности алгоримтов 
  * 1) В Асимптоике участвуют только данные которые передают на вход
  * 2) Оценивается только худшее слагаемое в выражении остальные отбрасываются
  */

function isOpen(string $s) { // O (1)
    return $s == '(' || $s == '{' || $s == '[';
}

function isPair(string $open, string $close) { // O(1)
    return 
    $open == '{' && $close == '}' ||
    $open == '(' && $close == ')' ||
    $open == '[' && $close == ']';
}

function isEmpty(array $stack) { // O(1)
    return count($stack) === 0;
}

function pairBracket (string $s) { // O(n+1+1+1+1) = O(n)
    $stack = [];

    for ( $i = 0; $i < strlen($s); $i++) { // O(n)
        if (isOpen($s[$i])) {
            array_push($stack, $s[$i]); // O(1)
        } else {
            if (! isEmpty($stack) && isPair(array_pop($stack), $s[$i])) {
                return true; // O(1)
            } else {
                return false; // O(1)
            }
        }
    }
    return count($stack) === 0; // O(1)
}

var_dump(pairBracket('(({}[]))'));