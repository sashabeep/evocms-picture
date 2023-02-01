<?php

namespace EvolutionCMS\Sashabeep;
use Illuminate\Support\Facades\Cache;
use EvolutionCMS\Helpers\Phphthumb;

class Picture{
	
	public function output($data){
		return("<hr>".$data."<hr>");
	}

	public function parseDirectiveData(string $data): array
	{
		$out = $data;
		return $out;
	}

}
?>