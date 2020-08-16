<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>מעבדה ניסויית</title>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<script>
			var mobile = /Mobile/.test(navigator.userAgent);
			var cfg = {
				mask: '+++++++',
				first_load_time: 2000,
				load_time: 1000,
				word_time: mobile ? 85 : 75,
				mask_time: mobile ? 85 : 75,
				skip_time: 3000,
				highlight_time: 500,
				mobile: mobile,
			};
			// key for real word = "1"
			// key for fake word = "3"
		</script>
		<style>
			body, html
			{
				direction: rtl;
			}
			.buttons,.textpage,form
			{
				max-width: 780px;
				margin: 0 auto;
			}
			.textpage,.details
			{
				padding:0 5px;
				text-align: start;
			}
			.form-control[type="number"]
			{
				width: 100px;
				max-width: none;
				display: inline-block;
			}
			.play
			{
				text-align: center;
    			margin-top: 10vh;
			}
			.word
			{
				font-size: 60px;
				margin-bottom: 60px;
			}
			.playbut
			{
				font-size: 30px;
				display: inline-block;
				width: 40vw;
				max-width: 200px;
				text-align: center;
				margin: 10vh 0;
			}
			.playbut.right
			{
				float: right;
			}
			.playbut.left
			{
				float: left;
			}
			.playbut.skip
			{
				clear: both;
				margin: 0 auto;
				display: block;
				width: auto;
			}
			.buttons
			{
				margin-top: 20px;
			}
			.pressed
			{
				background-color: #59e;
			}
			error 
			{
				display: block;
				clear: both;
				white-space: pre;
				font-size: 8px;
				font-family: monospace;
				margin-top:5px;
			}
		</style>
	</head>
	<body>
		<div id="content"></div>
		<template id="page_welcome">
			<div class="textpage">
			שלום ותודה על נכונותך להשתתף במחקר זה.
			 
			ניסוי זה הינו חלק מפרוייקט מחקר המתבצע במסגרת לימודים לתואר ראשון בפסיכולוגיה במכללת תל חי, הבוחן את אפקט עליונות המילה.
			 
			משך הניסוי יהיה כ10 דקות והשתתפות במחקר היא בהתנדבות או במתן נקודות קרדיט לסטודנטים לפסיכולוגיה בתל חי. ניתן להפסיק את השתתפותך בכל שלב- אם את/ה מרגיש/ה שאינך רוצה להמשיך לא יהיו לכך השלכות שליליות לגבייך. 
			 
			הפרטים האישיים והמידע שיימסר על ידך יהיו חסויים ואנונימיים ולא יועברו לשום גורם מלבד עורכי המחקר והמנחה האחראי עליהם. לאחר ניתוח הנתונים לא ניתן יהיה לזהות משתתף זה או אחר.
			 
			 
			מנחה הפרויקט: ד"ר נעם קרש.
			 
			עורכי המחקר: תייסיר מרעי ובת-אל לרנר
			טלפון לבירורים- 0504464124
			 
			מעבר למסך הבא מהווה את הסכמתך לתנאי המחקר ולשימוש בנתונים.			
			</div>
			<div class="buttons">
				<button class="button btn btn-primary" onclick="step_agree()">אני מסכימ/ה</button>
			</div>
		</template>
		<template id="page_form">
			<form>
				<div class="details">
					<div class="form-inline">
						<div class="form-group">
							<label>גיל: </label>
							<input type="number" name="age" class="form-control col-sm-2">
						</div>
					</div>
					<div class="form-group">
						<label>מין</label>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="sex" id="sex1" value="זכר">
							<label class="form-check-label" for="sex1">זכר</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="sex" id="sex2" value="נקבה">
							<label class="form-check-label" for="sex2">נקבה</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="sex" id="sex3" value="אחר">
							<label class="form-check-label" for="sex3">אחר</label>
						</div>
					</div>
					<div class="form-inline">
						<div class="form-group">
							<label>שנות לימוד אחרי תיכון: </label>
							<input type="number" name="school_years" class="form-control col-sm-2">
						</div>
					</div>
					<div class="form-group">
						<label>שפת אם</label>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="native_lang" id="native_lang1" value="עברית">
							<label class="form-check-label" for="native_lang1">עברית</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="native_lang" id="native_lang2" value="ערבית">
							<label class="form-check-label" for="native_lang2">ערבית</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="native_lang" id="native_lang3" value="רוסית">
							<label class="form-check-label" for="native_lang3">רוסית</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="native_lang" id="native_lang4" value="אמהרית">
							<label class="form-check-label" for="native_lang4">אמהרית</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="native_lang" id="native_lang5" value="אחר">
							<label class="form-check-label" for="native_lang5">אחר</label>
						</div>
					</div>
					<div class="form-group">
						<label>רמת שליטה בשפה העברית</label>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="hebrew_level" id="hebrew_level1" value="חלש">
							<label class="form-check-label" for="hebrew_level1">חלש</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="hebrew_level" id="hebrew_level2" value="בינוני">
							<label class="form-check-label" for="hebrew_level2">בינוני</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="hebrew_level" id="hebrew_level3" value="מצוין">
							<label class="form-check-label" for="hebrew_level3">מצוין</label>
						</div>
					</div>
				</div>
				<div class="buttons">
					<span class="form_send_button btn" onclick="step_form()">שליחה</span>
				</div>
			</form>
		</template>
		<template id="page_pre_practice">
			<div class="textpage">
			הוראות:

			על המסך כל פעם תופיע מילה. עליך לציין כמה שיותר מהר אם המילה שקראת היא אכן מילה קיימת או לא.
			לחיצה במקלדת על המספר 3 = לא מילה. לחיצה במקלדת על המספר 1 = מילה.			
			</div>
			<div class="buttons">
				<button class="btn btn-primary" onclick="step_practice()">המשך לתרגול</button>
			</div>
		</template>
		<template id="page_pre_play">
			<div class="textpage">
			התרגול עבר בהצלחה
			</div>
			<div class="buttons">
				<button class="btn btn-primary" onclick="step_play()">המשך לניסוי</button>
			</div>
		</template>
		<template id="page_play">
			<div class="play">
				<span class="word"></span>
			</div>
			<div class="buttons">
				<span class="playbut right" value="3">לא מילה<br>(3)</span>
				<span class="playbut left" value="1">מילה<br>(1)</span>
				<span class="playbut skip" value="0">דילוג על המילה<br>(0)</span>
			</div>
		</template>
		<template id="page_done">
			<div class="textpage">
			הניסוי הסתיים

			תודה על ההשתתפות!
			</div>
		</template>
		<template id="words_practice">
1 ציפור
3 כצדוביה
1 שרשרת
2 דובן
3 מלפניסי
1 טלפון
		</template>
		<template id="words">
3 צרישכאה
2 חליקים
1 גרעינים
1 אשכולית
1 להתגעגע
2 אופימי
1 אופטימי
3 נישוגח
2 אופיים
2 רעינות
1 להסתובב
1 לימונדה
1 רעיונות
3 מסופלנה
3 צלימיני
2 גרענים
3 דיבושון
2 חייקים
2 לימנדה
3 דיגורב
2 להגעגע
3 נלדישה
3 גלוסמק
2 ריקדים
2 אשכלית
1 ריקודים
1 דיאגרמה
3 מוחתון
1 חלקיקים
2 דיגרמה
3 אמוקיש
1 חיידקים
2 להתובב
3 דובאורי
1 אופניים
3 צילוטון
		</template>
	</body>
	<script>
		var keepalive = setInterval(x=>$.post('ajax.php?a=keepalive'), 60000);

		//////////// process word list ////////////
		function getwords_array(selector)
		{
			return $(selector).html().split(/\n|\s/).map(x=>x.trim()).filter(x=>!!x);
		}
		function getwords(selector)
		{
			let lines = $(selector).html().split(/\n/).map(x=>x.trim()).filter(x=>!!x);
			let output = [];
			lines.forEach(line => {
				line = line.trim().split(/\s+/).map(x=>x.trim()).filter(x=>!!x);
				output.push({
					text: line[1],
					type: line[0]
				});
			});
			return output;
		}

		//////////// play flow ////////////
		function show_word(text, load_time, callback)
		{
			let word = $('#content .word');
			word.html(cfg.mask);
			setTimeout(x=>word.html(text), load_time);
			setTimeout(x=>word.html(cfg.mask), load_time+cfg.word_time);
			setTimeout(x=>word.html('&nbsp;'), load_time+cfg.mask_time+cfg.word_time);
			setTimeout(callback, load_time+cfg.mask_time+cfg.word_time);
		}

		let row_id;
		let current_word;
		let timeout;
		let timeout_skip;
		let skip_enabled;
		function play(words, is_practice, callback)
		{
			current_word = 0;
			content('#page_play');
			$('#content .buttons').hide();
			play_step(words, is_practice, callback);
		}

		function play_step(words, is_practice, callback)
		{
			$('html').off('keypress');
			clearTimeout(timeout);
			clearTimeout(timeout_skip);
			skip_enabled = false;
			$('#content .playbut').removeClass('pressed');
			$('#content .buttons').hide();
			current_word++;
			if (current_word > words.length)
				return callback();
			let current = words[current_word - 1];
			current.count = current_word;
			current.row_id = row_id;
			if (is_practice)
				current.is_practice = 1;
			show_word(current.text, current_word == 1 ? cfg.first_load_time : cfg.load_time, () => {
				current.time = Date.now();
				$('#content .buttons').show();
				$('#content .skip').hide();
				$('#content .buttons .playbut').off('touchend').on('touchend', ev => push_button($(ev.currentTarget).attr('value')));
				timeout_skip = setTimeout(function(){
					$('#content .skip').show();
					skip_enabled = true;
				}, cfg.skip_time);
				$('html').on('keypress', ev => {
					if (ev.key === "1" || ev.key === "3" || ev.key === "0")
						push_button(ev.key);
				});
			});

			push_button = key =>
			{
				if (key === "0" && !skip_enabled)
						return;
					$('html').off('keypress');
					current.key = key;
					current.time = Date.now() - current.time;
					$.post('ajax.php?a=answer', current, response => {
						if (response != '1'){
							console.error('ajax answer '+response+JSON.stringify(current));
							document.body.innerHTML += '<error>ajax answer '+response+JSON.stringify(current)+'</error>';
						}
					});
					$('#content .playbut[value="'+key+'"]').addClass('pressed');
					setTimeout(function() {
						play_step(words, is_practice, callback);
					}, cfg.highlight_time);
			}
		}

		//////////// main flow ////////////
		function content(selector)
		{
			$('#content').html($(selector).html());
			let textpage = $('#content .textpage');
			if (textpage.length)
				textpage.html(textpage.html().replace(/\n/g,"<br>")); // .nl2br()
		}
		function err(message)
		{
			alert('תקלה! נא לצלם את המסך וליצור איתנו קשר לעזרה. הנה עוד פרטים:\n' + message);
			console.error(message);
		}
		function step_welcome()
		{
			content('#page_welcome');
		}
		function step_agree()
		{
			content('#page_form');
			form_validate();
			$('#content form *').off('change').on('change', form_validate);
		}
		function form_data()
		{
			return $('#content form').serializeArray().reduce(function(a, x) { a[x.name] = x.value; return a; }, {});
		}
		function form_validate()
		{
			let data = form_data();
			let ok = data.age > 11 && data.sex && data.school_years !== '' && data.native_lang && data.hebrew_level;
			$('#content .form_send_button').attr('disabled', !ok).toggleClass('disabled btn-danger', !ok).toggleClass('btn-primary', !!ok);
			return ok;
		}
		function step_form()
		{
			if (!form_validate())
				return;
			let data = form_data();
			data.settings = cfg;
			data.settings.words = getwords_array('#words');
			data.settings.words_practice = getwords_array('#words_practice');
			$.post('ajax.php?a=form', data, response => {
				if (response && isFinite(response)){
					row_id = +response;
					content('#page_pre_practice');
				}
				else
					return err('ajax.php?a=form '+response+JSON.stringify(data));
			});
		}
		function step_practice()
		{
			play(getwords('#words_practice'), true, () => {
				step_pre_play();
			});
		}
		function step_pre_play()
		{
			content('#page_pre_play');
		}
		function step_play()
		{
			play(getwords('#words'), false, () => {
				step_done();
			});
		}
		function step_done()
		{
			clearInterval(keepalive);
			$.post('ajax.php?a=done');
			content('#page_done');
		}
		step_welcome();
	</script>
</html>