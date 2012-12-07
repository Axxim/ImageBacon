@layout('master')

@section('content')


<div class="jumbotron center">
	<h1>Stupid Simple Image Hosting</h1>
	<p class="lead">{{ Lang::line('imagebacon.bullshit')->get(); }}</p>


	
	<div class="row-fluid ">
		<div class="span4 offset4">
			<!--{{ Form::open_for_files('api/upload', 'post'); }}
				{{ Form::token(); }}
				<input type="hidden" name="{{ ini_get("session.upload_progress.name"); }}" value="upload">

				<div class="btn-group">
					<button class="btn btn-large btn-success upload">{{ Lang::line('imagebacon.upload')->get(); }}</button>
					<button class="btn btn-large btn-success submit">
						<i class="icon-upload icon-white"></i>
					</button>
				</div>

				<input type="file" id="files" class="upload-hidden" name="images[]" accept="image/*" value="" multiple>
			{{ Form::close() }}


			<div id="uploaded">
				<ul class="nav nav-list">
					<li class="nav-header">Completed Images</li>
				</ul>
				<div class="progress progress-striped active">
					<div class="bar" style="width: 0%;"></div>
				</div>
			</div>
		-->
			<ul id="queue" class="nav nav-list"></ul>

			<div class="btn-group">
			<input id="upload" name="images[]" type="file" multiple="true">
			<a class="btn btn-success" href="javascript:$('#upload').uploadifive('upload')">Upload Files</a>
			</div>
		</div>
	</div>

	


</div>

<hr>

<div class="row-fluid marketing">
	<div class="span6">
		<h4>You Make It, We Take It</h4>
		<p>Our image size limit is 50MB, so go ahead, show us what you got. Oh and store as many images as you'd like!</p>

		<h4>Subheading</h4>
		<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

		<h4>Subheading</h4>
		<p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
	</div>

	<div class="span6">
		<h4>Subheading</h4>
		<p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

		<h4>Subheading</h4>
		<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

		<h4>Subheading</h4>
		<p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
	</div>
</div>

@endsection