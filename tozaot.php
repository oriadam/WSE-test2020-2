<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>export test results</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" rel="stylesheet">	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<style>
		html{
			direction: rtl;
		}
		.form {
			margin:10px 20px;
		}
	</style>
</head>
<body>
	<form method="POST" class="form" action="download_csv_from_form.php" target="_blank">
		<h3>יש לסמן את השדות והפילטרים הרלוונטיים </h3>
		<input type="hidden" name="pita" value="hummus">
		<h4>להציג הגדרות של:</h4>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="settings_timing">תזמונים</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="settings_words">רשימת מילים</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="settings_words_practice">רשימת מילים בתרגול</label></div>

		<h4>מידע על הנבדק:</h4>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="settings_mobile">נכנס ממכשיר נייד?</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="row_id">מספר סידורי</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="created">תאריך מענה על השאלון</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="meta">גיל רמת שפה וכל זה</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="summary">שורת סיכום לפי correct/wrong/skip</label></div>
		<br>
		
		<h4>תשובה:</h4>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="answer-count">מספר סידורי</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="answer-type">סוג מילה</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="answer-key">על איזה מקש לחצו (1/3/0)</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="answer-correctness">נכון או לא (correct/wrong/skip)</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="answer-time">זמן שעבר מהחשיפה לתשובה (מילישניות)</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="answer-text">המילה שהוצגה על המסך</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="answer-is_practice">האם זה מילה משלב התרגול (practice/actual)</label></div>
		<br>
		
		<h4>פילטר:</h4>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="practice">שלב התרגול</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="actual" checked>שלב ניסוי אמיתי</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="filter-type[1]" checked>מילים מסוג 1</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="filter-type[2]" checked>מילים מסוג 2</label></div>
		<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="filter-type[3]" checked>מילים מסוג 3</label></div>
		<!--div class="form-line"><label class="form-label"><input class="form-input" type="text" name="filter-type" placeholder="1,2,3">סוגי מילים </label></div-->
		<br>
		<div class="form-group">
			<input type="submit" class="button button-primary" value="DOWNLOAD">
		</div>
	</form>

</body>
<html>
