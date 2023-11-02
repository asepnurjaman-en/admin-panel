<?php

use Carbon\Carbon;

function date_id(?string $params = null): string
{
	$value = Carbon::parse($params)->diffForHumans();
	return $value;
}

function dated_id(?string $params = null): string
{
	$value = Carbon::parse($params);
	$value = $value->isoFormat('dddd, D MMMM Y');
	return $value;
}
