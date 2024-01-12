@section('title')
    {{trans('admin.edit')}} - {{ $role->name }}
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
            <form method="POST" action="{{ route('roles.update', $role) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">{{trans('admin.name')}}</label>
                    <input type="text" class="form-control" name="name" id="name"
                        placeholder="Enter Role name" required value="{{ $role->name }}">
                </div>

                <div class="form-group">
                    <label for="slug">{{trans('admin.slug')}}</label>
                    <input type="text" class="form-control" id="slug" name="slug"
                        placeholder="Enter Role Slug" required value="{{ $role->slug }}">
                </div>

                <button type="submit" class="btn btn-primary">{{trans('admin.submit')}}</button>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('admin.layouts.footer')
