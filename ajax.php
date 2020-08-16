<?php
include 'include.php';
global $db;
session_start();
$output = '?';

switch ($_GET['a']) 
{
	case 'keepalive':
		$output = 1;
		break;
	case 'form':
		$stmt = $db->prepare("INSERT INTO data(created,age,sex,school_years,native_lang,hebrew_level,settings) VALUES(:created,:age,:sex,:school_years,:native_lang,:hebrew_level,:settings)");
		$stmt->bindValue(':created', time(), SQLITE3_INTEGER);
		$stmt->bindValue(':age', $_POST['age'], SQLITE3_INTEGER);
		$stmt->bindValue(':sex', $_POST['sex'], SQLITE3_TEXT);
		$stmt->bindValue(':school_years', $_POST['school_years'], SQLITE3_INTEGER);
		$stmt->bindValue(':native_lang', $_POST['native_lang'], SQLITE3_TEXT);
		$stmt->bindValue(':hebrew_level', $_POST['hebrew_level'], SQLITE3_TEXT);
		$stmt->bindValue(':settings', jsonEn($_POST['settings']), SQLITE3_TEXT);
		if ($stmt->execute())
			$output = $_SESSION['row_id'] = $db->lastInsertRowID();
		else
			$output = 'error: ' . $db->lastErrorMsg();
		break;
	case 'answer':
		$field = $_POST['is_practice'] ? 'practice' : 'answers';
		$row_id = $_POST['row_id'] ?: $_SESSION['row_id'];
		if (!$row_id)
			throw new Exception('no row_id');
		unset($_POST['row_id']);
		$res = $db->query("SELECT $field FROM data WHERE id=$row_id");
		$value = $res->fetchArray(SQLITE3_NUM)[0];
		$value = $value ? jsonDe($value) : [];
		$value[] = $_POST;
		$stmt = $db->prepare("UPDATE data SET $field=:value WHERE id=$row_id");
		$stmt->bindValue(':value', jsonEn($value, JSON_UNESCAPED_UNICODE));
		if ($stmt->execute())
			$output = 1;
		else
			$output = 'error: ' . $db->lastErrorMsg();
		break;
	case 'done':
		unset($_SESSION['row_id']);
		session_destroy();
		$output = 1;
		break;
}

if (is_bool($output))
	$output = $output ? 1 : 0;

echo $output;
