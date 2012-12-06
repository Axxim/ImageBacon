@layout('master')

@section('content')
<div class="row">
    <div class="span9">

    </div>
    <div class="span3">
        <div class="sidebar-nav">
            <div class="well" style="width:100%; padding: 8px 0;">
                <ul class="nav nav-list">
                    <li class="nav-header">Admin Menu</li>
                    <li class="active"><a href="index"><i class="icon-home"></i> Dashboard</a></li>
                    <li><a href="#"><i class="icon-envelope"></i> Messages <span class="badge badge-info">4</span></a></li>
                    <li><a href="#"><i class="icon-comment"></i> Comments <span class="badge badge-info">10</span></a></li>
                    <li><a href="#"><i class="icon-user"></i> Members</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-comment"></i> Settings</a></li>
                    <li><a href="#"><i class="icon-share"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
