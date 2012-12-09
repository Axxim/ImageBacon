@layout('master')

@section('content')
{{ Form::open('/account/forgot', 'POST') }}

{{ Form::close() }}
@endsection