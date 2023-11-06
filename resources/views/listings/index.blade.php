<x-layout>
	@include('partials._hero')
	@include('partials._search')
	<div class="container grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-auto px-5">
		@foreach ($listings as $listing)
		<x-listing-card :listing="$listing" />
		@endforeach
	</div>

	<div class="mt-10">
		{{$listings->links()}}
	</div>
</x-layout>