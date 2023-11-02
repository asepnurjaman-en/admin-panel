<?php
use Intervention\Image\Image;
use Illuminate\Support\Facades\Storage;

function image_size(string $file_name): string
{
	$size = Storage::size('public/'.$file_name);
	return round(($size / 1024), 2).'Kb';
}

function image_reducer($data, string $file_name): void
{
	$size = [
		'xs' => [
			'size'	=> 60,
			'folder'=> '/app/public/xs/'
		],
		'sm' => [
			'size'	=> 280,
			'folder'=> '/app/public/sm/'
		],
		'md' => [
			'size'	=> 650,
			'folder'=> '/app/public/md/'
		]
	];
	// xs start
	$size['xs']['image'] = \Image::make($data);
	$size['xs']['ratio'] = $size['xs']['image']->width() / $size['xs']['size'];
	$size['xs']['width'] = $size['xs']['image']->width() / $size['xs']['ratio'];
	$size['xs']['height'] = $size['xs']['image']->height() / $size['xs']['ratio'];
	$size['xs']['image']->resize($size['xs']['width'], $size['xs']['height'], function($prop) {
		$prop->aspectRatio();
		$prop->upsize();
	});
	$canvas = \Image::canvas($size['xs']['width'], $size['xs']['height']);
	$canvas->insert($size['xs']['image'], 'center');
	$canvas->save(storage_path().$size['xs']['folder'].$file_name);
	// sm start
	$size['sm']['image'] = \Image::make($data);
	$size['sm']['ratio'] = $size['sm']['image']->width() / $size['sm']['size'];
	$size['sm']['width'] = ($size['sm']['image']->width() >= $size['sm']['size']) ? ($size['sm']['image']->width() / $size['sm']['ratio']) : $size['sm']['image']->width();
	$size['sm']['height'] = ($size['sm']['image']->height() >= $size['sm']['size']) ? ($size['sm']['image']->height() / $size['sm']['ratio']) : $size['sm']['image']->height();
	$size['sm']['image']->resize($size['sm']['width'], $size['sm']['height'], function($prop) {
		$prop->aspectRatio();
		$prop->upsize();
	});
	$canvas = \Image::canvas($size['sm']['width'], $size['sm']['height']);
	$canvas->insert($size['sm']['image'], 'center');
	$canvas->save(storage_path().$size['sm']['folder'].$file_name);
	// md start
	$size['md']['image'] = \Image::make($data);
	$size['md']['ratio'] = $size['md']['image']->width() / $size['md']['size'];
	$size['md']['width'] = ($size['md']['image']->width() >= $size['md']['size']) ? ($size['md']['image']->width() / $size['md']['ratio']) : $size['md']['image']->width();
	$size['md']['height'] = ($size['md']['image']->height() >= $size['md']['size']) ? ($size['md']['image']->height() / $size['md']['ratio']) : $size['md']['image']->height();
	$size['md']['image']->resize($size['md']['width'], $size['md']['height'], function($prop) {
		$prop->aspectRatio();
		$prop->upsize();
	});
	$canvas = \Image::canvas($size['md']['width'], $size['md']['height']);
	$canvas->insert($size['md']['image'], 'center');
	$canvas->save(storage_path().$size['md']['folder'].$file_name);
}