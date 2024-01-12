@section('title')
    {{ trans('admin.users') }}
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
                        <li class="breadcrumb-item"><a href="#">{{ trans('admin.home') }}</a></li>
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
                   {{ trans('admin.addnew') }}
                  </button>
                
            </div>
              <!-- Modal -->
              <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="AddModalLabel">New User Registration</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required>
                          </div>
                      
                          <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
                          </div>
                      
                          <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                          </div>
                      
                          <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                          </div>
                      
                          <div class="form-group">
                            <label for="photo">Photo:</label>
                            <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*">
                          </div>
                      
            
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              {{-- end Modal --}}
            {!! $dataTable->table(['class' => 'table table-bordered']) !!}

        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@section('scripts')

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
{!! $dataTable->scripts() !!}

@endsection
@include('admin.layouts.footer')
