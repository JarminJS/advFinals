<?php use App\Http\Controllers\dbControl; ?>
<x-app-layout></x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    @include("admin.admincss") 
</head>
<body>
    <div class="container-scroller">
        
        <div class="container-fluid page-body-wrapper">
            @include("admin.adminnav") 

            <div class="main-panel">
                <div class="content-wrapper">
                  <div class="row">
                    <div class="col-md-12 grid-margin">
                      <div class="row">
                        <div class="col-12 col-xl-8 mb-0 mb-xl-0">
                          <h3 class="font-weight-bold capitalize">List of Students</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                      <div class="card position-relative">
                        <div class="card-body">
                          <table class="table table-bordered table-striped pb-4">
                            <tr>
                              <th>ID</th>
                              <th>Name</th>
                              
                            </tr>
                            @foreach ($students as $student)
                            <tr>
                              <td>{{ $student->id }}</td>
                              <td>{{ $student->name }}</td>
                            </tr>
                            @endforeach
                            
                          </table>
        
                          <div class="pt-6">
                            {{ $students->links() }}
                          </div>
        
                        </div>
                      </div>
                    </div>
                  </div>

                  @if (dbControl::getUsertype() == '1')
                  <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                      <div class="card position-relative">
                        <div class="card-body">
                          <div class="pb-4 text-xl">Add Students</div>
                          <form method="post" action="/addstudent">
                            @csrf

                            <table class="table table-bordered ">
                              <tr>
                                <th >Name:</th>
                                <td>
                                  <input class="form-control" type="text" name="name">
                                </td>
                              </tr>
                            </table>

                            <button class="btn btn-primary mt-4 float-right" type="submit">Add Student</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endif
                  
                </div>
            </div>
        </div>

        
    </div>
</body>
</html>