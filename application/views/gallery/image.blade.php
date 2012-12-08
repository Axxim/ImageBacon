@layout('master')

@section('content')

<div class="well center">
	<a href="https://i.mgba.co/{{$image->file_name}}"><img src="https://i.mgba.co/{{$image->file_name}}" alt="{{ $image->file_name }}"></a>
</div>

@endsection