
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
                          <h3 class="font-weight-bold capitalize">List of Projects</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                      <div class="card position-relative">
                        <div class="card-body">
                          <table class="table table-bordered table-striped pt-4 pb-4">
                            <tr>
                              <th>ID</th>
                              <th>Student</th>
                              <th>Supervisor</th>
                              <th>Examiner 1</th>
                              <th>Examiner 2</th>
                              <th>Detail</th>
                            </tr>
                            
                            @foreach ($projects as $project)
                            <tr>
                              <td>{{ $project->id }}</td>
                              <td class="capitalize">{{ dbControl::getStudent($project->studentId)  }} (ID: {{ $project->studentId }})</td>
                              <td>{{ dbControl::getLect($project->supervisorId) }}</td>
                              <td>{{ dbControl::getLect($project->examiner1Id) }}</td>
                              <td>{{ dbControl::getLect($project->examiner2Id) }}</td>
                              <td><a href="/details/{{ $project->id }}">Further Details</a></td>
                            </tr>
                            @endforeach
                            
                          </table>
        
                          <div class="pt-6">
                            {{ $projects->links() }}
                          </div>

                          <button class="btn btn-primary text-white font-bold mt-6 float-right"><a href="/create">Create New Project</a></button>
        
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