@section('title')
    {{trans('admin.permissions')}}
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
                
            </div>
              <!-- Modal -->
              <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="AddModalLabel">{{trans('admin.addnew')}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="{{ route('permissions.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{trans('admin.name')}}</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter role name" required>
                          </div>
                      
                          <div class="form-group">
                            <label for="slug">{{trans('admin.slug')}}</label>
                            <input type="tel" class="form-control" id="slug" name="slug" placeholder="Enter role slug" required>
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
                    @foreach ($permissions as $permission)
                        <tr>
                            <th scope="row">{{ $permission->id }}</th>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->slug }}</td>
                            <td>
                                <a href="{{ route('permissions.edit',$permission->id) }}" class="btn btn-warning btn-sm">{{trans('admin.edit')}}</a>
                                <form action="{{ route('permissions.destroy',$permission->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm(\'Are you sure you want to delete this permission?\')">{{trans('admin.delete')}}</button>
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
