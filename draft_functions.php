<?php

$index = 0;
echo (1 + $index)%2;

$index = 1;
echo '<pre>';
echo (1 + $index)%2;

echo '<pre>';

$index = 2;

echo '<pre>';
echo 'INDEX   ', $index;
echo '<pre>';
echo ($index + 1)%3;
echo '<pre>';
echo ($index + 2)%3;

$index = 1;

echo '<pre>';
echo 'index   ', $index;
echo '<pre>';
echo $index%3 + 1;
echo '<pre>';
echo (1 + $index)%3 + 1;

$index = 2;

echo '<pre>';
echo 'index   ', $index;
echo '<pre>';
echo $index%3 + 1;
echo '<pre>';
echo (1 + $index)%3 + 1;