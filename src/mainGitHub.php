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

//====================================================
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

//====================================================
// The function doesn't need to be assigned to a variable. This is valid too:
$output = array_filter(array(1, 2, 3, 4, 5, 6), function($item) {
    return ($item % 2) == 0;
});

//print_r([...$output]);
//print_r($output);

//====================================================
function call(string $fn, $argument)
{
    return $fn($argument);
}

//$result = call('strlen', 'haskell is power!');
//print_r($result); // => 17
//====================================================

$usersAge = [
    ['name' => 'Igor', 'age' => 19],
    ['name' => 'Danil', 'age' => 1],
    ['name' => 'Vovan', 'age' => 4],
    ['name' => 'Matvey', 'age' => 4],
];

//$cmp = fn($a, $b) => $a['age'] <=> $b['age'];

//usort($usersAge, $cmp);

//print_r([...$usersAge]);

//====================================================
$usersBirthday = [
    ['name' => 'Bronn', 'gender' => 'male', 'birthday' => '1973-03-23'],
    ['name' => 'Reigar', 'gender' => 'male', 'birthday' => '1973-11-03'],
    ['name' => 'Eiegon',  'gender' => 'male', 'birthday' => '1963-11-03'],
    ['name' => 'Sansa', 'gender' => 'female', 'birthday' => '2012-11-03'],
    ['name' => 'Jon', 'gender' => 'male', 'birthday' => '1980-11-03'],
    ['name' => 'Robb','gender' => 'male', 'birthday' => '1980-05-14'],
    ['name' => 'Tisha', 'gender' => 'female', 'birthday' => '2012-11-03'],
    ['name' => 'Rick', 'gender' => 'male', 'birthday' => '2012-11-03'],
    ['name' => 'Joffrey', 'gender' => 'male', 'birthday' => '1999-11-03'],
    ['name' => 'Edd', 'gender' => 'male', 'birthday' => '1973-11-03']
];

function takeOldest($arr, $val = 1)
{
    usort($arr, fn($a, $b) => $a['birthday'] <=> $b['birthday']);

    return (FC\firstN($arr, $val));
}

//print_r(takeOldest($usersBirthday, 5));
//====================================================

//$users = array_reduce($usersAge, function ($acc, $user) {
//    $acc[$user['age']][] = $user['name'];
//    return $acc;
//}, []);
//print_r($users);

//====================================================

//print_r(date("Y", strtotime($usersBirthday[0]['birthday'])));

function getMenCountByYear(array $users)
{
    $menfolk = array_filter($users, fn($user) => $user['gender'] === 'male');

    $years = array_map(fn($user) => date('Y', strtotime($user['birthday'])), $menfolk);

    return array_reduce($years, function ($acc, $year) {
        $acc[$year] = ($acc[$year] ?? 0) + 1;

        return $acc;
    }, []);
}

//====================================================


const FREE_EMAIL_DOMAINS = [
    'gmail.com',
    'yandex.ru',
    'hotmail.com'
];

$emails = [
    'info@gmail.com',
    'info@yandex.ru',
    'info@hotmail.com',
    'mk@host.com',
    'support@hexlet.io',
    'key@yandex.ru',
    'sergey@gmail.com',
    'vovan@gmail.com',
    'vovan@hotmail.com'
];
//function getFreeDomainsCount($emails, $countEmails = [])
//{
//    foreach ($emails as $email) {
//        $end = explode("@", $email);
//        if (in_array($end[1], FREE_EMAIL_DOMAINS)) {
//            $countEmails[$end[1]] = ($countEmails[$end[1]] ?? 0) + 1;
//        }
//    }
//    return $countEmails;
//}

//function getFreeDomainsCount($emails)
//{
//    $countEmails = array_reduce($emails, function ($acc, $email) {
//        $acc[explode("@", $email)[1]] = ($acc[explode("@", $email)[1]] ?? 0) + 1;
//        return $acc;
//    }, []);
//    print_r($countEmails);
//    return $countEmails;
//}
//
//getFreeDomainsCount($emails);

$users23 = [
    ['name' => 'Tirion', 'friends' => [
        ['name' => 'Mira', 'gender' => 'female'],
        ['name' => 'Ramsey', 'gender' => 'male']
    ]],
    ['name' => 'Bronn', 'friends' => []],
    ['name' => 'Sam', 'friends' => [
        ['name' => 'Aria', 'gender' => 'female'],
        ['name' => 'Keit', 'gender' => 'female']
    ]],
    ['name' => 'Keit', 'friends' => []],
    ['name' => 'Rob', 'friends' => [
        ['name' => 'Taywin', 'gender' => 'male']
    ]],
];

function getManWithLeastFriends($xxx)
{
    $users23 = [
        ['name' => 'Tirion', 'friends' => [
            ['name' => 'Mira', 'gender' => 'female'],
            ['name' => 'Ramsey', 'gender' => 'male']
        ]],
        ['name' => 'Bronn', 'friends' => []],
        ['name' => 'Sam', 'friends' => [
            ['name' => 'Aria', 'gender' => 'female'],
            ['name' => 'Keit', 'gender' => 'female']
        ]],
        ['name' => 'Keit', 'friends' => []],
        ['name' => 'Rob', 'friends' => [
            ['name' => 'Taywin', 'gender' => 'male']
        ]],
    ];

    print_r(FC\minValue($users23, fn($item) => count($item['friends'])));
}

//getManWithLeastFriends($users23);


//print_r(Funct\Collection\without([3, 4, 10, 4, 'true'], 4));

//$x = 5;
//$y = 10;
//
//$generate = fn($x) => $x + $y;
//
//print_r($generate(1));
//
//print_r(Funct\Collection\without([3, 4, 10, 4, 'true'], [3,4]));

function makeUser($name, $birthday)
{
    return [
        'name' => $name,
        'birthday' => $birthday
    ];
}


print_r(makeUser('max', 11)['name']);