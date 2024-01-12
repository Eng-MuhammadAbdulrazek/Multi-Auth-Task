@section('title')
    {{ $user->name }}
@endsection
@include('admin.layouts.head')
@include('admin.layouts.nav')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('title')</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{trans('admin.home')}}</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if ($user->photo)
            <img src="{{ asset('storage/' . $user->photo) }}" alt="User Avatar"
                style="width: 100px; height: 100px; border-radius: 50%;">
            @else
                <img src="{{ asset('avatar.png') }}" alt="Default Avatar"
                    style="width: 50px; height: 50px; border-radius: 50%;">
            @endif
           <br>
           {{trans('admin.username')}} : {{ $user->name }}
           <br>
           {{trans('admin.email')}} : {{ $user->email }}
           <br>
           {{trans('admin.phone')}} : {{ $user->phone }}
           <br>
           {{trans('admin.photo')}} : @if (!empty($user->photo)){
            <a href="{{ asset('storage/'.$user->photo) }}" target="_blank">{{trans('admin.click')}}</a>
            } @else 
               NULL
           @endif
           <br>
           {{trans('admin.created')}} : {{ $user->created_at->diffForHumans()}}

        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('admin.layouts.footer')
