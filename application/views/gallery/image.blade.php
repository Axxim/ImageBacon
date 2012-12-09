@layout('master')

@section('content')

<div class="well center">
	<a href="https://i.mgba.co/{{$image->file_name}}"><img src="https://i.mgba.co/{{$image->file_name}}" alt="{{ $image->file_name }}"></a>

	@if($image->user_id != null)
	<h2>Uploaded by: <a href="/user/{{User::where_id($image->user_id)->first()->username}}">{{User::where_id($image->user_id)->first()->username}}</a></h2>
	@endif
</div>

@endsection