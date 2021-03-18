@extends('layout.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        {{-- <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col --> --}}
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Contact List</h3>

              <a href="{{ route('contact.create') }}" style="float: right" class="btn btn-success"> Add Contact</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-6">
                    <div class="card card-danger">
                        <div class="card-header">
                          <h3 class="card-title">Contact Form</h3>
                        </div>
                        <form action="{{ route('contact.store') }}" method="post">
                            {{ csrf_field() }}
                            @foreach($errors->all(':message') as $message)
                            <div id="form-messages" class="alert alert-danger" role="alert">
                              {{ $message }}
                            </div>
                          @endforeach()
                        <div class="card-body">
                          <!-- Date dd/mm/yyyy -->
                          <div class="form-group">
                            <label>First Name:</label>
          
                            <div class="input-group">
                             
                              <input type="text" class="form-control" name="first_name">
                            </div>
                            <!-- /.input group -->
                          </div>
                          <div class="form-group">
                            <label>Last Name:</label>
          
                            <div class="input-group">
                              
                              <input type="text" class="form-control" name="last_name">
                            </div>
                            <!-- /.input group -->
                          </div>
                          <!-- /.form group -->
          
                          <!-- Date mm/dd/yyyy -->
                         
                          <!-- /.form group -->
          
                          <!-- phone mask -->
                          <div class="form-group">
                            <label>Phone No:</label>
          
                            <div class="input-group">
                              
                              <input type="text" name="phone" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" inputmode="text">
                            </div>
                            <!-- /.input group -->
                          </div>
                          <div class="form-group">
                            <label>Email:</label>
          
                            <div class="input-group">
                             
                              <input type="text" name="address" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" inputmode="text">
                            </div>
                            <!-- /.input group -->
                          </div>
                          <div class="form-group">
                            <label>Receive Text:</label>
          
                            <div class="input-group">
                              
                              <input type="checkbox" name="can_receive_text" >
                            </div>
                            <!-- /.input group -->
                          </div>
                          <div class="form-group">
                            <label>Whatapps:</label>
          
                            <div class="input-group">
                             
                              <input type="checkbox" name="has_whatsapp" >
                            </div>
                            <!-- /.input group -->
                          </div>
                          
                          <!-- /.form group -->

                          <button type="`submit" class="btn btn-primary">Submit </button>
                        </form>
                          <!-- phone mask -->
                          
                        <!-- /.card-body -->
                      </div>
                  </div>
                  <div class="col-md-3"></div>
                  
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

      <!-- /.row -->
      <!-- Main row -->
     
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
@endsection
