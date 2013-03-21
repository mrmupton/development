<?php
include_once('dataGridOutput.class.php');
$dg = new dataGridOutput();
$class_vars = get_class_vars(get_class($dg));
foreach ($class_vars as $name => $value) {
    echo "$name : $value\n";
}
?>