<?php

// display variable information

function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

// list out an array 

function list_out_database_data($database_data) {
    echo "<ul>";

    foreach ($database_data as $data) {
        echo "<li>" . $data . "</li>";
    }

    echo "</ul>";
}

// convert items in array to htmlspecialchars

function convert_special($arr) {
    foreach ($arr as $input) {
        $input = htmlspecialchars($input);
    }

    return $arr;
}

// display array items as HTML td element

function display_as_td($arr) {
    foreach ($arr as $value) {
        echo "<tr>";
        foreach ($value as $data) {
            echo "<td>" . $data . "</td>"; 
        }
        echo "</tr>";
    }
}

// get certain array index's and display as str

function get($arr, $val, $str = True) {
    $new_arr = [];

    for ($i = 0; $i < $val; $i++) {
        $new_arr[] = $arr[$i];
    }

    if ($str) {
        return implode('', $new_arr);
    }
    
    return $new_arr;
}

function get_database_data($database, $query, $params = []) {
    return $database->query($query, $params)->fetch();
}
