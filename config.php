<?php
require_once 'phplibs/autoload.php';
require_once 'phplibs/phpmailer/phpmailer/language/phpmailer.lang-ru.php';

// константы для хранения подключения к БД
define('HOST', 'localhost');
define('USER', 'root');
define('DBNAME', 'portfolio');
define('PASSWORD', '');

define('SECRET_KEY', '6LeUDggTAAAAAAoW5DMGFbCZCjdh8fgZS8PH0ttd');
define('PUBLIC_KEY', '6LeUDggTAAAAAN_g517BW-UfDpITb9b3lCjgk309');

// функция для получения объекта подключения к БД
//function connectToDB(){
//	setlocale(LC_CTYPE, array('ru-RU.utf8', 'ru-RU.utf8'));
//	setlocale(LC_ALL, array('ru-RU.utf8', 'ru-RU.utf8'));
//	$pdo = new PDO("mysql:dbname=".DBNAME.";host=".HOST.";", USER, PASSWORD);
//	return $pdo;
//}
//$data_sql = array(
//	'getPortfolio' => 'SELECT projects.id, projects.title, projects.thumb, projects.link, projects.description'
//);
//// универсальная функция для получения данных из БД
//function getDataAsArray(){
//	$result = $pdo->query(sql);
//	return $result->fetchAll(PDO::FETCH_ASSOC);
//}

// функциия для очистки данных формы
function clear_str($str){
	return htmlspecialchars(strip_tags(trim($str)), ENT_QUOTES);
}

// ФУНКЦИЯ ПРОВЕРКИ RECAPCHA
function check_captcha($key, $catpcha, $ip){
	$url_to_send = "https://www.google.com/recaptcha/api/siteverify?secret=".$key.'&response='.$catpcha.'&ip='.$ip;
	$data_request = file_get_contents($url_to_send);
	$data =  json_decode($data_request, true);
	if(isset($data['success']) && $data['success'] == 1){
		return true;
	} else {
		return false;
	}
}

/**
 *  Функция для транслитерации русского текста
 *
 * @param  string $string
 * @return string
 */
function rus2translit($string) {
	$converter = array(
		'а' => 'a',   'б' => 'b',   'в' => 'v',
		'г' => 'g',   'д' => 'd',   'е' => 'e',
		'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
		'и' => 'i',   'й' => 'y',   'к' => 'k',
		'л' => 'l',   'м' => 'm',   'н' => 'n',
		'о' => 'o',   'п' => 'p',   'р' => 'r',
		'с' => 's',   'т' => 't',   'у' => 'u',
		'ф' => 'f',   'х' => 'h',   'ц' => 'c',
		'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
		'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
		'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
		'А' => 'A',   'Б' => 'B',   'В' => 'V',
		'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
		'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
		'И' => 'I',   'Й' => 'Y',   'К' => 'K',
		'Л' => 'L',   'М' => 'M',   'Н' => 'N',
		'О' => 'O',   'П' => 'P',   'Р' => 'R',
		'С' => 'S',   'Т' => 'T',   'У' => 'U',
		'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
		'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
		'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
		'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
	);
	return strtr($string, $converter);
}
/**
 *  Функция, которая нормализует имена файлов для URL
 *
 * @param $str
 * @return mixed|string
 */
function str2url($str) {
	// переводим в транслит
	$str = rus2translit($str);
	// в нижний регистр
	$str = strtolower($str);
	// заменям все ненужное нам на "-"
	$str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
	// удаляем начальные и конечные '-'
	$str = trim($str, "-");
	return $str;
}

?>