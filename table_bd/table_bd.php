<?php

	list($count_questions, $table_data) = explode("\t", file_get_contents(__DIR__.'/../files/table_data_kr'));

	$table_data = json_decode($table_data, true);

	$question_alt = array(1=>'A','B','C','D','E','F','J');

	$table = '<table>';
	for ($i=1; $i <= $count_questions; $i++) { 
		foreach ($table_data as $key => $value) {
			$table .= "<tr><td align='left'>Вопрос № {$key}</td></tr>";

			foreach ($table_data[$i]['answers'] as $key => $value) {
				$table .= "<tr><td align='left'>{$question_alt[$key]}</td>";
				$x = ($value['right']) ? '<input type="checkbox" checked="checked">' : '<input type="checkbox">' ;
				$table .= "<td align='left'>{$x}</td>";
				$table .= "<td align='left'></td>";
				$table .= "<td align='left'><input type='text' value='{$value['ball']}' size=\"2\" style='text-align:center;'> балл</td>";
				$table .= '</tr>';
			}
			$table .= "<tr><td align='left'>Общий балл </td></tr>";
			$table .= "<tr><td align='left'>Видео <link></td></tr>";
		}
	}
	$table .= '</table>';

	echo $table;