<?php

//$name = "getUser";
//echo $name;

//preg_match_all("#^get([a-zA-Z0-9]+)$#", $name, $matches, PREG_PATTERN_ORDER);

//print_r($matches);

$pattern = preg_replace("#(:[a-zA-Z0-9]+)#", "([a-zA-Z0-9-_]+)", "users/edit/:id/:test");
echo $pattern;

preg_match_all("#^{$pattern}$#", "users/edit/1/2", $values);
print_r($values);

