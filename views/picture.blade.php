<picture @if(!empty($title)) title="{{ $title }}" @endif>
	<source srcset="{{ $image_1x }},
	{{ $image_2x }} 2x">
	<img src="{{ $image_1x }}" alt="{{ $alt }}">
</picture>