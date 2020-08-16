<?php
include 'include.php';
if ($_POST['pita']!=='hummus') exit;
$opt = $_POST;
$result = $db->query("SELECT * FROM data");
$array = [];
if ($opt['filter-type'])
	$filter_types = array_keys($opt['filter-type']);
while ($row = $result->fetchArray(SQLITE3_ASSOC))
{
	if (!$row['answers'])
		continue; // skip people that did not do the test

	$out = [];
	$settings = jsonDe($row['settings']);
	if ($opt['settings_timing'])
		$out['timing'] = "מיסוך-לפני=".$settings['load_time']." מילה=".$settings['word_time']." מיסוך-אחרי=".$settings['mask_time']." אפשרות-דילוג=".$settings['skip_time']."";
	if ($opt['settings_mobile'])
		$out['device'] = $settings['mobile'] == 'true' ? 'mobile' : 'desktop';
	if ($opt['settings_words'])
		$out['words'] = implode(' ',$settings['words']);
	if ($opt['settings_words_practice'])
		$out['words_practice'] = implode(' ',$settings['words_practice']);
	if ($opt['row_id'])
		$out['id'] = $row['id'];
	if ($opt['created'])
		$out['date'] = date('c', $row['created']);
	if ($opt['meta'])
		$out += [
			'age' => $row['age'],
			'sex' => $row['sex'],
			'school_years' => $row['school_years'],
			'native_lang' => $row['native_lang'],
			'hebrew_level' => $row['hebrew_level'],
		];

	$summary = [
		'total' => 0,
		'correct' => 0,
		'wrong' => 0,
		'skip' => 0,
	];


	$count = 0;
	// go over answers	
	$answers = [];
	if ($opt['practice'])
		$answers = jsonDe($row['practice']);
	if ($opt['actual'])
		$answers = array_merge($answers, jsonDe($row['answers']));

	foreach ($answers as $answer)
	{
		$count++;
		if ($answer['key'] === '0')
			$answer['correctness']	= 'skip';
		if ($answer['key'] === '1')
			$answer['correctness']	= $answer['type'] == 1 ? 'correct' : 'wrong';
		if ($answer['key'] === '3')
			$answer['correctness']	= $answer['type'] != 1 ? 'correct' : 'wrong';

		if (!$filter_types || in_array($answer['type'], $filter_types))
		{
			// filter applied
			$summary['total']++;
			$summary[$answer['correctness']]++;

			if ($opt['answer-count'])
				$out["number$count"] = $answer['count'];
			if ($opt['answer-key'])
				$out["key$count"] = $answer['key'];
			if ($opt['answer-type'])
				$out["type$count"] = $answer['type'];
			if ($opt['answer-text'])
				$out["text$count"] = $answer['text'];
			if ($opt['answer-correctness'])
				$out["correctness$count"] = $answer['correctness'];
			if ($opt['answer-time'])
				$out["time$count"] = $answer['time'];
			if ($opt['answer-is_practice'])
				$out["is_practice$count"] = $answer['is_practice'] ? 'practice' : 'actual';
		}
	}

	if ($opt['summary'])
		$out += [
			'summary_total' => $summary['total'],
			'summary_correct' => $summary['correct'],
			'summary_wrong' => $summary['wrong'],
			'summary_skip' => $summary['skip'],
		];

	$array[]=$out;
}

array_to_csv_download($array,'table_of_data.csv',",");
