<?php


require_once "../vendor/autoload.php";
use \Funct\Collection as FC;
use \Funct\Strings as FS;
use function Funct\Strings\latinize;


$x = [[0, 1, 2], [99]];

$xx = 'sum';

//print_r(Funct\Collection\last($x));
//print_r(FC\flattenAll($x));
//echo FS\camelize('data data')."\n";


function sum($a, $b)
{
    // Определяем анонимную функцию
    $sum = function ($y, $x) {
        return $x + $y;
    };
    // Вызываем анонимную функцию и возвращаем результат ее выполнения
    return $sum($a, $b);
}


//print_r($xx(1, 4)); // 5

$f1 = fn($v, $w) => $v + $w;

//print_r($f1(1, 4)); // 5


// The function doesn't need to be assigned to a variable. This is valid too:
$output = array_filter(array(1, 2, 3, 4, 5, 6), function($item) {
    return ($item % 2) == 0;
});

//print_r([...$output]);
//print_r($output);

function call(string $fn, $argument)
{
    return $fn($argument);
}

//$result = call('strlen', 'haskell is power!');
//print_r($result); // => 17


//$users1 = [
//    ['name' => 'Igor', 'age' => 19],
//    ['name' => 'Danil', 'age' => 1],
//    ['name' => 'Vovan', 'age' => 4],
//    ['name' => 'Matvey', 'age' => 16],
//];
//
//$cmp = fn($a, $b) => $a['age'] <=> $b['age'];
//
//usort($users1, $cmp);
//
//print_r([...$users1]);


$users = [
    ['name' => 'Rob', 'birthday' => '1975-01-11'],
    ['name' => 'Tirion', 'birthday' => '1988-11-19'],
    ['name' => 'Tisha', 'birthday' => '1992-02-27'],
    ['name' => 'Sam', 'birthday' => '1999-11-22'],
    ['name' => 'Sansa', 'birthday' => '2001-03-20']
];

function takeOldest($arr, $val = 1)
{
    usort($arr, fn($a, $b) => $a['birthday'] <=> $b['birthday']);

    return (FC\firstN($arr, $val));
}

print_r(takeOldest($users, 5));