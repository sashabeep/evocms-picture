<?php

namespace EvolutionCMS\Sashabeep;

use EvolutionCMS\ServiceProvider;
use EvolutionCMS;
use EvolutionCMS\Sashabeep\Picture;
use Illuminate\Support\Facades\Blade;

	class PictureServiceProvider extends ServiceProvider
	{
	public $evo;
	public function register()
	{
		$this->evo = EvolutionCMS();
		//picture directive
		Blade::directive('picture', function($args){
			$picture = new Picture();
			return $picture->output($args);
		});
	}
}
