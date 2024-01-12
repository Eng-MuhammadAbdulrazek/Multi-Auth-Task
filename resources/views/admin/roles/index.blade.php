@section('title')
    {{trans('admin.roles')}}
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
            <div class="mb-4">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">
                    {{trans('admin.addnew')}}
                </button>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#AssignRole">
                    {{trans('admin.assignrole')}}
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="AssignRole" tabindex="-1" role="dialog" aria-labelledby="AssignRoleLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="AddModalLabel">{{trans('admin.assignrole')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('roles.give_role') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="role">{{trans('admin.roles')}}</label>
                                    <select class="custom-select" required name="role">
                                      <option selected disabled>{{trans('admin.selectRole')}}</option>
                                     @foreach ($roles as $role)
                                      <option value="{{ $role->id }}">{{ $role->name }}</option>
                                      @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="user">{{trans('admin.users')}}</label>
                                    <select class="custom-select" required name="user">
                                      <option selected disabled>{{trans('admin.selectUser')}}</option>
                                     @foreach ($users as $user)
                                      <option value="{{ $user->id }}">({{ $user->id }}) {{ $user->name }}</option>
                                      @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">{{trans('admin.submit')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end Modal --}}
            <!-- Modal -->
            <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="AddModalLabel">{{trans('admin.addnew')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('roles.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">{{trans('admin.name')}}</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Enter role name" required>
                                </div>

                                <div class="form-group">
                                    <label for="slug">{{trans('admin.slug')}}</label>
                                    <input type="tel" class="form-control" id="slug" name="slug"
                                        placeholder="Enter role slug" required>
                                </div>

                                <button type="submit" class="btn btn-primary">{{trans('admin.submit')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end Modal --}}


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{trans('admin.name')}}</th>
                        <th scope="col">{{trans('admin.slug')}}</th>
                        <th scope="col">{{trans('admin.actions')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <th scope="row">{{ $role->id }}</th>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->slug }}</td>
                            <td>
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm">{{trans('admin.edit')}}</a>
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm(\'Are you sure you want to delete this role?\')">{{trans('admin.delete')}}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('admin.layouts.footer')
