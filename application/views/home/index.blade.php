@layout('master')

@section('content')


<div class="jumbotron center">
	<h1>Stupid Simple Image Hosting</h1>
	<p class="lead">{{ Lang::line('imagebacon.bullshit')->get(); }}</p>
	
	<div class="row-fluid ">
		<div class="span4 offset4">
			<div class="container-upload">
				<ul id="queue" class="nav nav-list"></ul>

				<div class="btn-group">
					<input id="upload" name="images[]" type="file" multiple="true">
					<a class="btn btn-primary upload" href="#">Upload Files</a>
				</div>
			</div>
		</div>
		<!--<div class="span4">
			<h3>Create an Album</h3>
			<div class="albums"><span class="label label-success">Success</span></div><br>
			<p>Drag and drop some images here to create an album.</p>
		</div>-->
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
		<h4>Images Are King</h4>
		<p>Images are the most important thing to a site like ours, so we make sure they get the treatment they deserve.</p>

		<h4>Subheading</h4>
		<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

		<h4>Subheading</h4>
		<p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
	</div>
</div>

@endsection