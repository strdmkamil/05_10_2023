<?php

$lines = preg_split('~\s*[\r\n]+\s*~', file_get_contents('prod.txt'));

foreach($lines as $i => $line) {
    $pairs = explode(';', $line);
    foreach($pairs as $pair) {
        list($column, $value) = explode('=', $pair, 2);
        $columns[$column] = true;
        $rows[$i][$column] = $value;
    }
}

$columns = array_keys($columns);


echo '<table><thead><tr>';

foreach($columns as $column) {
    echo '<th>'.$column.'</th>';
}

echo '</tr></thead><tbody>';

foreach($rows as $row) {
    echo '<tr>';
    foreach($columns as $column) {
        echo '<td>'.$row[$column].'</td>';
    }
    echo '</tr>';
}
echo '</tbody></table>';

?>