


23.
/*
 * Напишите пример с тернарным оператором, который проверяет что ключ массива
 * сущетсвует.
 *
 */
$input = array("a" => "green", "red", "b" => "green", "blue", "red");
$key_name = 'a';
echo (array_key_exists($key_name, $input)) ? $key_name : 'Такого ключа нет!';


22.
/*
 * Напишите свою функцию my_array_unique которая будет принмать один параметр -
 * массив и выдавать результат идентичный встроенной функции array_unique().
 * Использовать любые встроенные в PHP функции запрещено.
 * Написать функцию необходимо наиболее оптимальным способом.
 *
 */
$input = array("a" => "green", "red", "b" => "green", "blue", "red");
function my_array_unique($arr) {
    $temp_arr = array();
    foreach($arr as $key => $value) {
        $flag = true;
        foreach($temp_arr as $unique_value) {
            if ($value == $unique_value) {
                $flag = false;
                break;
            }
        }
        if ($flag)
            $temp_arr[$key] = $value;
    }
    return $temp_arr;
}
$res = my_array_unique($input);
var_dump($res);

19.
/*
 * Наришите функцию, которая выводит свое название, название файла и номер строчки
 * в файле, на которой она определна. Использовать жестко внесенные значения в теле фнкции запрещено
 * Тело функции должно быть независмым от ее названия и положения в файле.
 */
/*
 * Простой вывод:
 * function some_func() {
 *     echo __LINE__ -1, __FILE__, __FUNCTION__;
 * }
 *
 */
function some_func() {
    echo 'Номер строки где функция определна: ' .  (__LINE__ -1)  . ' | Имя файла: ' . substr(strrchr(__FILE__, '\\'), 1) . ' | Имя функции: ' . __FUNCTION__;
}
some_func();

18.
/*
 * Вызовите функцию которая содержится внутри переменной func_name
 */
function some_func() {
    echo 'Hello, I am some function';
}
$func_name = 'some_func';
$func_name();

17.
/*
 * Напишите функцию которая принимает в качестве параметра
 * целочисленную переменную $var и увеличивает ее значение на 10.
 * Если в функцию передается перемнная другого типа (не int)
 * то функция выводит сообщение "Вы передали не int" и завершает свою работу.
 * Использовать return внутри функции запрещено.
 */
function num_increase(&$var) {
    (is_int($var)) ? $var += 10 : print 'Вы передали не int';
}
$a = 10;
num_increase($a);
echo $a;

24.
<?php
/*
 * Написать рекурсивную функцию, которая пнринимает на вход масиив и выводит на экран дерево категорий
 * таким образом, чтобы вложенные категории отделялись от предыдущих на 2 тире слева.
 *
 */
function print_cat ($arr) {
    static $delimiter = '';
    foreach ($arr as $key => $value) {
        if (is_array($value)) {
            $delimiter .= '--';
            print_cat($value);
        } else {
            echo $delimiter . ' ' . $value . "\n";
        }
    }
    $delimiter = substr($delimiter, 0, -2);
}
/*function print_cat ($arr) {
    static $delimiter = '';
    foreach ($arr as $key => $value) {
        if (is_array($value)) {
            if ($key == 'title') $delimiter = substr($delimiter, 0, -2);
            $delimiter .= '--';
            print_cat($value);
        } else {
            echo substr($delimiter, 0, -2) . ' ' . $value . "\n";
        }
    }
    $delimiter = substr($delimiter, 0, -2);
}*/
$arr_var_1 = array(
    'first array_item',
    1 => array(12, 33, 14, 99),
    'countries' => array(
        'Ukraine',
        array(1,2,3),
        'Usa',
        'Uganda'
    ),
    '199' => array(
        'colors' => array(
            1 => 'white',
            22 => 'black',
            '0' => 'red',
            5 => array(1, 2, 'str' => 3, 3, 4, 6 => 5, 7 => array(
                999,
                1000,
                true
            ))
        ),
        'apple',
        'asus',
        'acer'
    ),
    12,
    'last array item'
);
$arr_var_2 =  [
    [
        'title' => 'Компьютеры',
        'children' => [
            [
                'title' => 'Ноутбуки',
            ],
            [
                'title' => 'Моноблоки',
            ],
            [
                'title' => 'Системные блоки',
                'children' => [
                    [
                        'title' => 'Tower',
                    ],
                    [
                        'title' => 'Mini Tower',
                    ]
                ]
            ]
        ]
    ],
    [
        'title' => 'Бытовая техника',
        'children' => [
            [
                'title' => 'Пылесосы',
            ],
            [
                'title' => 'Холодильники',
            ]
        ]
    ]
];
echo '<pre>';
print_r($arr_var_2);
print_cat($arr_var_2);


30.
/*
 * Написать функцию которая принимает в качестве аргумента строку, и форматирует
 * ее таким образом, чтобы каждое новое предложение начиналось с большой буквы.
 *
 */
function sentenceUpperCase($str) {
    $temp_arr = explode(' ', $str);
    $temp_arr[0] = mb_convert_case($temp_arr[0], MB_CASE_TITLE, 'utf-8');
    foreach ($temp_arr as $key => $value) {
        if (preg_match('/[.!?]/', $value)) {
            $temp_arr[$key + 1] = mb_convert_case($temp_arr[$key + 1], MB_CASE_TITLE, 'utf-8');
        }
    }
    $str = implode(' ', $temp_arr);
    echo $str;
}


Сохранить в файл массив:
function array_to_file(array $arr)
{
    file_put_contents(
        'array.txt',
        serialize($arr) . PHP_EOL,
        FILE_APPEND
    );
}


Достать из массива данные:
function arrayFromFile($filename = 'array.txt')
{
    $lines = file($filename);
    $res = [];
    foreach ($lines as $item) {
        $res[] = unserialize($item);
    }
    return $res;
}


Форма отправки данных на сервер save.php, uploads:

<form action='save.php' method='post' enctype='multipart/form-data'>
    <input type='file' name='attachment'>
    <button>Go</button>
</form>

if (!file_exists('uploads')) {
mkdir('uploads');
}
function requestIsPost ()
{
    return strtolower($_SERVER['REQUEST_METHOD'])=='post';
}
if (requestIsPost() && isset($_FILES['attachment'])) {

$attachment = $_FILES['attachment'];
file_put_contents('dump.txt', print_r($_FILES, true));

$result = move_uploaded_file(
$attachment['tmp_name'],
'uploads/' . $attachment['name']
);
}
?>

