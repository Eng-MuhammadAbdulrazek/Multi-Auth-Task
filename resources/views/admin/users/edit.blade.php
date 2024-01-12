@section('title')
    {{trans('admin.edit')}} - {{ $user->name }}
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
            <form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">{{trans('admin.username')}}:</label>
                    <input type="text" class="form-control" name="name" id="name"
                        placeholder="Enter your name" required value="{{ $user->name }}">
                </div>

                <div class="form-group">
                    <label for="phone">{{trans('admin.phone')}}:</label>
                    <input type="tel" class="form-control" id="phone" name="phone"
                        placeholder="Enter your phone number" required value="{{ $user->phone }}">
                </div>

                <div class="form-group">
                    <label for="email">{{trans('admin.email')}}:</label>
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="Enter your email" required value="{{ $user->email }}">
                </div>

                <div class="form-group">
                    <label for="password">{{trans('admin.pass')}}:</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Enter your password">
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="photo">{{trans('admin.photo')}}:</label>
                            <input type="file" class="form-control-file" id="photo" name="photo"
                                accept="image/*">
                        </div>
                        <div class="col">
                            @if ($user->photo)
                                <img src="{{ asset('storage/' . $user->photo) }}" alt="User Avatar"
                                    style="width: 100px; height: 100px; border-radius: 50%;">
                            @else
                                <img src="{{ asset('avatar.png') }}" alt="Default Avatar"
                                    style="width: 50px; height: 50px; border-radius: 50%;">
                            @endif
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">{{trans('admin.submit')}}</button>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('admin.layouts.footer')
