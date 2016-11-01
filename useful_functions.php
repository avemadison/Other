<?php

function getKey ($value, $key)
{
    return $value ($key);
}

/*
* array in <pre>
*/
function dd($a){
    echo "<pre>";
    print_r($a);
    echo "</pre>";
}
/*
* @return bool 
*/
function requestIsPost()
{
    return strtolower($_SERVER['REQUEST_METHOD']) == 'post';
}
/**
* @return string|null
*/
function post($key, $default = null)
{
    return isset($_POST[$key]) ? $_POST[$key] : $default;
}
/**
* @return string|null
*/
function get($key, $default = null)
{
    
    return isset($_GET[$key]) ? $_GET[$key] : $default;
}

function requestIsGet()
{
    return (bool)$_GET;
}

/**
* @return bool
*/
function formIsValid()
{
	return post('username') != '' 
		   && post('email') != '' 
		   && post('message') != '';
}
/*
* redirect
*/
function redirect($to)
{
    header('Location: ' . $to);
    die;
}

function saveInFile (array $arr, $filename)
{
    $comment = serialize($arr);
    $res = file_put_contents(
        $filename,
        $comment . PHP_EOL,
        FILE_APPEND
    );

    if (!$res) {
        die('Error');
    }
}
function setFlash($message)
{
	$_SESSION['flash_message'] = $message;
}

function getFlash()
{
	if (!isset($_SESSION['flash_message'])) {
		return null;
	}
	$message = $_SESSION['flash_message'];
	unset($_SESSION['flash_message']);
	return $message;
}

function loadComments($file = COMMENTS_FILE)
{
    $commentsRaw = file($file);
    $comments = [];
    foreach ($commentsRaw as $comment) {
        $comments[] = unserialize($comment);
    }
    return $comments;
}

/**
 * Возвращение значений из ф-и по ссылке
 * Форматирование текста:
 * 1) strtolower
 * 2) ucfirst
 */
function fix_name(&$n1, &$n2, &$n3)
{
    $n1 = ucfirst(strtolower($n1));
    $n2 = ucfirst(strtolower($n2));
    $n3 = ucfirst(strtolower($n3));
    return $n1. ' '. $n2. ' '. $n3.' ';
}
