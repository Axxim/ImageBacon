@layout('master')

@section('content')


<div class="row">
    <div class="span6 offset3">
        <?php if ($errors->has()): ?>
        <div class="alert alert-error">
            <strong>Oops!</strong> There was an problem registering you. This is what we've gathered.
            <ul>
                <?php foreach ($errors->all() as $error): ?>
                <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        {{ Form::horizontal_open() }}
        <form class="form-horizontal" action='' method="POST">
            <fieldset>
                <div id="legend">
                    <legend class="">Login</legend>
                </div>
                <div class="control-group">
                    <!-- Username -->
                    <label class="control-label"  for="username">Username</label>
                    <div class="controls">
                        <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
                    </div>
                </div>

                <div class="control-group">
                    <!-- Password-->
                    <label class="control-label" for="password">Password</label>
                    <div class="controls">
                        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                    </div>
                </div>


                <div class="control-group">
                    <!-- Button -->
                    <div class="controls">
                        <button class="btn btn-success">Login</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection
