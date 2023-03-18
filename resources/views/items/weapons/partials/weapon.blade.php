<div class="weapon">
	<h2>{{$weapon->name}}</h2>
	{{--<p>{{$weapon->}}</p>--}}

	@if($weapon->image_source)
		<img src="{{$weapon->image_source}}" title="{{$weapon->name}}">
	@endif

	<p>{{$weapon->description}}</p>

	@if($weapon->mastery_rank_requirement)
		<p>Mastery Rank Requirement: {{$weapon->mastery_rank_requirement}}</p>
	@endif
</div>
