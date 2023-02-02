<?php

namespace EvolutionCMS\Sashabeep;

use EvolutionCMS\ServiceProvider;
use EvolutionCMS;
use EvolutionCMS\Sashabeep\Picture;
use Illuminate\Support\Facades\Blade;

class PictureServiceProvider extends ServiceProvider
{
	protected $namespace = 'evocms-picture';
	public $evo;
	public function register(){
		$this->evo = EvolutionCMS();
		//picture directive
		Blade::directive('picture', function($args){
			$picture = new Picture();
			$opts = $picture->parseProps($args);
			return $picture->output($opts);
		});
	}
	public function boot(){
		$this->loadViewsFrom(__DIR__ . '/../views', $this->namespace);
	}
}
