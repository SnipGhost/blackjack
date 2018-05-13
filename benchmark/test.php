<?php

//=============================================================================
include '../etc/passwords.php';
ini_set('display_errors', 1);
set_time_limit(360);
error_reporting(E_ALL);
$mysqli = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
if ($mysqli->connect_errno) {
    throw new Exception('Could not connect: '.$mysqli->connect_error);
}
if (!$mysqli->set_charset('utf8')) {
    throw new Exception('Error loading character set utf8: '.$mysqli->error);
}
//=============================================================================
function escape(string $str)
{
    global $mysqli;
    return mysqli_real_escape_string($mysqli, $str);
}
function concat(string $k, string $v)
{
    global $mysqli;
    return mysqli_real_escape_string($mysqli, $k)." = '"
            .mysqli_real_escape_string($mysqli, $v)."'";
}
//=============================================================================
$global_count = 4; // Количество запусков бенчмарков
$size1 = 1000;     // Количество полей (столбцов) в записях
$count1 = 10000;   // Количество прогонов 1-го варианта
$sizex = 400;      // Количество полей (столбцов) в записях
$sizey = 100;      // Количество "вставляемых" записей
$count2 = 1000;    // Количество прогонов 2-го варианта
//=============================================================================
echo '<h2>Benchmark: map vs foreach execution time</h2>';
for ($iter = 0; $iter < $global_count; ++$iter) {
    //=========================================================================
    echo '<h3>Run #'.$iter.'</h3>';
    echo '<table border="1" style="text-align: center;">';
    //=========================================================================
    echo '<tr><th>Insert</th><th>Time</th></tr>';
    //=========================================================================
    // map version
    $data = range(0, $size1);
    $avg = 0;
    for ($i = 0; $i < $count1; ++$i) {
        $start = microtime(true);
        //-----------------------------------------------------
        $query = 'QUERY: ';
        $fields = array_map('concat', array_keys($data), array_values($data));
        $query .= implode(', ', $fields);
        //-----------------------------------------------------
        $avg += microtime(true) - $start;
    }
    echo '<tr><td>map</td><td>'.round($avg / $count1, 10).'</td></tr>';
    //=========================================================================
    // foreach version
    $data = range(0, $size1);
    $avg = 0;
    for ($i = 0; $i < $count1; ++$i) {
        $start = microtime(true);
        //-----------------------------------------------------
        $query = 'QUERY: ';
        foreach ($data as $key => $value) {
            $key = escape($key);
            $value = escape($value);
            $query .= $key." = '".$value."', ";
        }
        $query = substr($query, 0, -2);
        //-----------------------------------------------------
        $avg += microtime(true) - $start;
    }
    echo '<tr><td>foreach</td><td>'.round($avg / $count1, 10).'</td></tr>';
    //=========================================================================
    echo '<tr><th>InsertMany</th><th>Time</th></tr>';
    //=========================================================================
    // map version 2
    $new_data = [];
    for ($i = 0; $i < $sizey; ++$i) {
        $new_data[$i] = range(0, $sizex);
    }
    $keys = range(0, $sizex);
    $avg = 0;
    for ($i = 0; $i < $count2; ++$i) {
        $data = $new_data;
        $start = microtime(true);
        //-----------------------------------------------------
        $query = 'INSERT INTO ';
        if (0 != count($keys)) {
            $keys = array_map('escape', $keys);
            $query .= '('.implode(', ', $keys).') ';
        }
        $query .= ' VALUES ';
        foreach ($data as &$row) {
            $row = "'".implode("', '", array_map('escape', $row))."'";
        }
        $query .= '('.implode('), (', $data).')';
        //-----------------------------------------------------
        $avg += microtime(true) - $start;
    }
    echo '<tr><td>map</td><td>'.round($avg / $count2, 10).'<br>';
    //=========================================================================
    // foreach version 2
    $new_data = [];
    for ($i = 0; $i < $sizey; ++$i) {
        $new_data[$i] = range(0, $sizex);
    }
    $keys = range(0, $sizex);
    $avg = 0;
    for ($i = 0; $i < $count2; ++$i) {
        $data = $new_data;
        $start = microtime(true);
        //-----------------------------------------------------
        $query = 'INSERT INTO ';
        if (0 != count($keys)) {
            $query .= '(';
            foreach ($keys as $key) {
                $query .= escape($key).', ';
            }
            $query = substr($query, 0, -2).') ';
        }
        $query .= ' VALUES ';
        foreach ($data as &$row) {
            $query .= '(';
            foreach ($row as &$value) {
                $query .= "'".escape($value)."', ";
            }
            $query = substr($query, 0, -2).'), ';
        }
        $query = substr($query, 0, -2);
        //-----------------------------------------------------
        $avg += microtime(true) - $start;
    }
    echo '<tr><td>foreach</td><td>'.round($avg / $count2, 10).'<br>';
    //=========================================================================
    echo '</table><br><br>';
    //=========================================================================
}
