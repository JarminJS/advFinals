
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
                            <form action="/updated" method="post">
                                @csrf
                            <table class="table table-bordered table-striped pb-4">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $project->id }}</td>
                                    <input type="hidden" name="id" value= {{ $project->id }}>
                                </tr>
                                <tr>
                                    <th>Student</th>
                                    <td class="capitalize">{{ dbControl::getStudent($project->studentId)  }}</td>
                                    <input type="hidden" name="studentId" value= {{ $project->studentId }}>
                                </tr>
                                <tr>
                                    <th>Supervisor</th>
                                    <td>{{ dbControl::getLect($project->supervisorId) }}</td>
                                    <input type="hidden" name="supervisorId" value= {{ $project->supervisorId }}>
                                </tr>
                                <tr>
                                    <th>Examiner 1</th>
                                    <td>{{ dbControl::getLect($project->examiner1Id) }}</td>
                                    <input type="hidden" name="examiner1Id" value= {{ $project->examiner1Id }}>
                                </tr>
                                <tr>
                                    <th>Examiner 2</th>
                                    <td>{{ dbControl::getLect($project->examiner2Id) }}</td>
                                    <input type="hidden" name="examiner2Id" value= {{ $project->examiner2Id }}>
                                </tr>
                                <tr>
                                    <th>Title</th>
                                    <td><input class="form-control" type="text" name="title" value="{{ $project->title }}""></td>
                                </tr>
                                <tr>
                                    <th>Start Date</th>
                                    <td><input class="form-control" type="text" name="startDate" value={{ $project->startDate }}></td>
                                </tr>
                                <tr>
                                    <th>End Date</th>
                                    <td><input class="form-control" type="text" name="endDate" value={{ $project->endDate }}></td>
                                </tr>
                                <tr>
                                    <th>Duration</th>
                                    <td>{{ $project->duration }} Months *</td>
                                </tr>
                                <tr>
                                    <th>Progress</th>
                                    <td>
                                        <select class="form-control"  name="progress">
                                            <option {{old('progress',$project->progress)=="Milestone 1"? 'selected':''}} value="Milestone 1" >Milestone 1</option>
                                            <option {{old('progress',$project->progress)=="Milestone 2"? 'selected':''}} value="Milestone 2" >Milestone 2</option>
                                            <option {{old('progress',$project->progress)=="Final Report"? 'selected':''}} value="Final Report" >Final Report</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <select class="form-control"  name="status">
                                            <option {{old('status',$project->status)=="On Track"? 'selected':''}} value="On Track">On Track</option>
                                            <option {{old('status',$project->status)=="Delayed"? 'selected':''}} value="Delayed">Delayed</option>
                                            <option {{old('status',$project->status)=="Extended"? 'selected':''}} value="Extended">Extended</option>
                                            <option {{old('status',$project->status)=="Completed"? 'selected':''}} value="Completed">Completed</option>
                                        </select>
                                    </td>
                                </tr>
                                
                            </table>

                            <p>* Duration will automatically change after update.</p>
                            <button type="submit" class="btn btn-primary mt-6 float-right">Submit</button>

                            
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