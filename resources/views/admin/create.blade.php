
<?php use App\Http\Controllers\dbControl; ?>

<x-app-layout></x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../db/vendors/feather/feather.css">
    <link rel="stylesheet" href="../db/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../db/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../db/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../db/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="../text/css" href="db/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../db/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../db/images/favicon.png" />
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
                          <h3 class="font-weight-bold capitalize">Creating New Project</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                      <div class="card position-relative">
                        <div class="card-body">
                            <form action="/created" method="post">
                                @csrf
                            <table class="table table-bordered table-striped pb-4">

                                <tr>
                                    <th>Student ID: </th>
                                    <td>
                                        <select class="form-control" name="studentId">
                                            @foreach ($students as $student)
                                                <option value="{{ $student->id }}">{{ $student->id}}. {{ $student->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Supervisor ID: </th>
                                    <td>
                                        <select class="form-control" name="supervisorId">
                                            @foreach ($lecturers as $lecturer)
                                                <option value="{{ $lecturer->id }}">{{ $lecturer->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Examiner 1 ID:</th>
                                    <td>
                                        <select class="form-control" name="examiner1Id">
                                            @foreach ($lecturers as $lecturer)
                                                <option value="{{ $lecturer->id }}">{{ $lecturer->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Examiner 2 ID: </th>
                                    <td>
                                        <select class="form-control" name="examiner2Id">
                                            @foreach ($lecturers as $lecturer)
                                                <option value="{{ $lecturer->id }}">{{ $lecturer->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            
                                <div class="mt-6 float-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            
                        </form>
                          
                        
        
                        </div>

                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>

        
    </div>
</body>
</html>