@layout('master')

@section('content')


<ul class="thumbnails">
@foreach ($images as $image)
	<li class="span2" style='width: 170px; height: 130px'>
		<a href="/n/{{$image->id}}" class="thumbnail">
			<img src="https://i.mgba.co/thumb/{{$image->file_name}}" alt="">
		</a>
	</li>
@endforeach
</ul>

@endsection