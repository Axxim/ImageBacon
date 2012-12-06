@layout('master')

@section('content')



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
            <fieldset>
                <div id="legend">
                    <legend class="">Register</legend>
                </div>
                <p>Creating an account at ImageBacon is completely optional, but will allow you to better use our site. We'll automatically attach images you upload to your account so you can find them later.</p>

                <div class="control-group">
                    <!-- Username -->
                    <label class="control-label" for="username">Username</label>

                    <div class="controls">
                        <input type="text" id="username" name="username" placeholder="" class="input-xlarge" tabindex="1">

                        <p class="help-block">Username can contain any letters or numbers, without spaces</p>
                    </div>
                </div>

                <div class="control-group">
                    <!-- E-mail -->
                    <label class="control-label" for="email">E-mail</label>

                    <div class="controls">
                        <input type="text" id="email" name="email" placeholder="" class="input-xlarge" tabindex="2">

                        <p class="help-block">We won't spam, this if for resetting your password and stuff.</p>
                    </div>
                </div>

                <div class="control-group">
                    <!-- Password-->
                    <label class="control-label" for="password">Password</label>

                    <div class="controls">
                        <input type="password" id="password" name="password" placeholder="" class="input-xlarge" tabindex="3">

                        <p class="help-block">Password should be at least 6 characters</p>
                    </div>
                </div>

                <div class="control-group">
                    <!-- Password -->
                    <label class="control-label" for="password_confirm">Password (Confirm)</label>

                    <div class="controls">
                        <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge" tabindex="4">

                        <p class="help-block">Please confirm your password</p>
                    </div>
                </div>

                <div class="control-group">
                    <!-- Button -->
                    <div class="controls">
                        <button class="btn btn-success">Register</button>
                    </div>
                </div>
            </fieldset>
        </form>

    @endsection
