<?php

namespace EvolutionCMS\Sashabeep;
use Illuminate\Support\Facades\View;

class Picture{
	
	public function output(array $options)
	{
		$optsArr = [
			'file'=>isset($options[0]) ? $options[0] : "",
			'phpthumb'=>isset($options[1]) ? $options[1] : "",
			'alt'=>isset($options[2]) ? $options[2] : "",
			'classes'=>isset($options[3]) ? $options[3] : "",
			'title'=>isset($options[4]) ? $options[4] : ""
		];

		if(!file_exists(MODX_BASE_PATH.$optsArr['file'])){
			return;
		}else{
			$image_1x = \Helper::phpThumb($optsArr['file'], $optsArr['phpthumb']);
			$optsArr['image_1x'] = $image_1x;
			$thumbArr = array_map('trim',explode(",",$optsArr['phpthumb']));

			$thumbOpts2x = [];
			foreach ($thumbArr as $k=>$row){
				$wrow = array_map('trim',explode("=",$row));
				if($wrow[0]=='w'||$wrow[0]=='h'){
					$thumbOpts2x[$wrow[0]]=$wrow[1]*2;
				}else{
					$thumbOpts2x[$wrow[0]]=$wrow[1];
				}
			}
			$thumbOpts2x['aoe']='1';
			$thumbOpts2x['far']='1';

			$thumbOpts2x_string = "";
			foreach($thumbOpts2x as $k=>$v){
				$thumbOpts2x_string.=$k."=".$v;
				if (next($thumbOpts2x)) {
					$thumbOpts2x_string.=",";
				}
			}
			$image_2x = \Helper::phpThumb($optsArr['file'], $thumbOpts2x_string);
			$optsArr['image_2x'] = $image_2x;

			return View::make('evopicture::picture', $optsArr)->render();

		}
	}

	public function parseProps(string $data):array
	{
		eval("\$arr = [$data];");
		return $arr;
	}

}
?>