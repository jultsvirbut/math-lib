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





/* Генерирует латинские буквы, возвращает массив из 26 элементов. 
    $a = GenerationLetters::getEnLetters(true) - возвращает массив всех латинских букв, в нижнем регистре
    $a = GenerationLetters::getEnLetters(false) - возвращает массив всех латинских букв, в верхнем регистре */
class GenerationLetters {

    public static function getRusLetters(){

        $classesLetters = array();
        foreach (range(chr(0xC0), chr(0xDF)) as $letter)
        $classesLetters[] = iconv('CP1251', 'UTF-8', $letter);
        return $classesLetters;
    }
    public static function getEnLetters($lowerCase = false){

        $classesLetters = array();
        foreach (range(chr(0x41), chr(0x5A)) as $letter) {
            if($lowerCase) $letter = strtolower($letter);
            $classesLetters[] = $letter;
        }
        return $classesLetters;
    }
}







$start = microtime(true);

#sleep(2);


$a = 200;
$b = 10;

$statement = "$a%10 != 0";
$blockIf = "if({$statement}){ echo 123232; }";

echo eval($blockIf);


ob_start();
printf('<div class="execute-script">Скрипт выполнился за <b>%.4f</b></div>', microtime(true) - $start);
$execute_script = ob_get_clean();

?>

<style type="text/css">
    .execute-script {
        font-family: Arial;
        width : 100%;
        height:  40px;
        line-height: 40px;
        position: fixed;
        bottom: 0px;
        left : 0px;
        background: #444;
        color : #fff;
        text-align: center;
        font-size : 16px;
        box-shadow: 0px -5px 10px rgba(0,0,0,.1);
    }
</style>

<?=$execute_script?>








