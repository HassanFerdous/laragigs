<x-layout>
	@include('partials._hero')
	<div class="container px-5 mx-auto">
		@include('partials._search')
		<div class="grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0">
			@foreach ($listings as $listing)
			<x-listing-card :listing="$listing" />
			@endforeach
		</div>

		<div class="mt-10">
			{{$listings->links()}}
		</div>
	</div>
</x-layout>