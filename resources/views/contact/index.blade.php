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
              <table id="data-table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>First Nmae</th>
                  <th>Last Name</th>
                  {{-- <th>Number</th> --}}
                  <th>Created At</th>
                  <th>Send Message</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               @foreach($contacts as $contact)
                <tr>
                  <td>{{ $contact->first_name }}</td>
                  <td>{{ $contact->last_name }}</td>
                  {{-- <td>{{ $contact }}</td> --}}
                  <td>{{ $contact->created_at->format('Y-m-d') }}</td>
                  <td>
                    <a href="" class="btn btn-sm"> <i class="fas fa-sms"></i></a>
                  </td>
                  <td>
                    <a href="" class="btn btn-sm"> <i class="fas fa-plus"></i></a>
                      <a href="" class="btn btn-sm"> <i class="fas fa-edit"></i></a>
                      <a href="" class="btn btn-sm"> <i class="fas fa-trash"></i></a>
                  </td>
                 
                 
                </tr>
                @endforeach
          
               
                
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
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
