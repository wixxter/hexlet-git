<?php

$data = [
    'user' => 'ubuntu',
    'hosts' => [
        ['name' => 'web1'],
        ['name' => 'web2', null => 3, 'active' => false]
    ]
];

function getIn($data, $items)
{
    $temp = $data;
    foreach ($items as $item) {
        print_r($temp);
        if (!is_array($temp) || !array_key_exists($item, $temp)) {
            return null;
        }

        $temp = $temp[$item];
    }

    return $temp;
}

getIn($data, ['hosts', 1, 'active']);