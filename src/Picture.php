<?php

namespace EvolutionCMS\Sashabeep;
use Illuminate\Support\Facades\Cache;
use EvolutionCMS\Helpers\Phphthumb;

class Picture{
	
	public function output(array $options){
		return("<hr>".var_dump($options)."<hr>");
	}

}
?>