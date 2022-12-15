
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
                          <h3 class="font-weight-bold capitalize">Project {{ $project->id }} Detail</h3>
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
                                    <td>{{ $project->id }}</td>
                                </tr>
                                <tr>
                                    <th>Student</th>
                                    <td class="capitalize">{{ dbControl::getStudent($project->studentId)  }}</td>
                                </tr>
                                <tr>
                                    <th>Supervisor</th>
                                    <td>{{ dbControl::getLect($project->supervisorId) }}</td>
                                </tr>
                                <tr>
                                    <th>Examiner 1</th>
                                    <td>{{ dbControl::getLect($project->examiner1Id) }}</td>
                                </tr>
                                <tr>
                                    <th>Examiner 2</th>
                                    <td>{{ dbControl::getLect($project->examiner2Id) }}</td>
                                </tr>
                                <tr>
                                    <th>Title</th>
                                    <td>{{ $project->title }}</td>
                                </tr>
                                <tr>
                                    <th>Start Date</th>
                                    <td>{{ $project->startDate }}</td>
                                </tr>
                                <tr>
                                    <th>End Date</th>
                                    <td>{{ $project->endDate }}</td>
                                </tr>
                                <tr>
                                    <th>Duration</th>
                                    <td>{{ $project->duration }} Months</td>
                                </tr>
                                <tr>
                                    <th>Progress</th>
                                    <td>{{ $project->progress }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $project->status }}</td>
                                </tr>
                                
                            </table>
        
                          
        
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