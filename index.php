<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <meta name="theme-color" content="#ffffff">
    <title>companydirectory</title>
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <!--Fontawesome CSS-->
    <link rel="stylesheet" href="fontawesome-free-6.2.1-web/css/all.css">
    <!-- MY CSS -->
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="./">
                <img src="img/companydirectory.jpg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top me-2">
                <span>companydirectory</span>                
            </a>
        </div>
    </nav>

    <div class="page-content">
      <div class="row d-flex justify-content-center mt-5 mb-5">
        <div class="form-floating col-6 col-xs-6 col-sm-6 col-md-6">
          <form id="searchStaff">
            <div class="input-group">
              <input type="text" minlength="3" id="staffSearch" class="form-control" placeholder="Search...">
              <button type="submit" class="btn btn-rounded btn-primary"><i class="fa-solid fa-magnifying-glass fa-lg"></i></button>
              <button type="button" id="refreshSearch" class="btn btn-rounded btn-secondary"><i class="fa-solid fa-rotate-left"></i></button>
            </div>
          </form>
        </div>
      </div>
      <div class="d-flex justify-content-center row">
        <div class='col-10'>
          <ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="personnel-tab" data-bs-toggle="tab" data-bs-target="#personnel" type="button" role="tab" aria-controls="personnel" aria-selected="true">Personnel</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="department-tab" data-bs-toggle="tab" data-bs-target="#department" type="button" role="tab" aria-controls="department" aria-selected="false">Departments</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="location-tab" data-bs-toggle="tab" data-bs-target="#location" type="button" role="tab" aria-controls="location" aria-selected="false">Locations</button>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active table-responsive" id="personnel" role="tabpanel" aria-labelledby="personnel-tab">
              <table class="table table-striped table-hover">
                <thead>
                  <tr class="text-end text-primary">
                    <th colspan="3">Add New Staff Member<button type="button" id="addStaff" data-toggle="modal" data-target="#myModal" class="btn"><i class="fa-solid fa-plus"></i></button></th>
                  </tr>
                  <tr>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Location</th>
                  </tr>
                </thead>
                <tbody id="personnelBody">              
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade table-responsive" id="department" role="tabpanel" aria-labelledby="department-tab">
              <table class="table table-striped table-hover">
                <thead>
                  <tr class="text-end text-primary">
                    <th colspan="3">Add New Department<button type="button" id="addDepartment" data-toggle="modal" data-target="#departmentModal" class="btn"><i class="fa-solid fa-plus"></i></button></th>
                  </tr>
                  <tr>
                    <th>Department Name</th>
                    <th>Location</th>
                  </tr>
                </thead>
                <tbody id="departmentBody">                                                        
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade table-responsive" id="location" role="tabpanel" aria-labelledby="location-tab">
              <table class="table table-striped table-hover">
                <thead>
                  <tr class="text-end text-primary">
                    <th colspan="3">Add New Location<button type="button" id="addLocation" data-toggle="modal" data-target="#locationModal" class="btn"><i class="fa-solid fa-plus"></i></button></th>
                  </tr>
                  <tr>
                    <th>Location</th>
                  </tr>
                </thead>
                <tbody id="locationBody">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Create Staff Modal -->
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create a Staff Member</h4>
            </div>
            <form action="createStaff.php" method="post">
              <div class="modal-body">
                <div class="mb-3">
                  <label for="firstName" class="form-label">First Name:</label>
                  <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter First Name">
                </div>
                <div class="mb-3">
                  <label for="lastName" class="form-label">Last Name:</label>
                  <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter Last Name">
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email:</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                </div>
                <div class="mb-3">
                  <label for="jobTitle" class="form-label">Job Title:</label>
                  <input type="text" class="form-control" id="jobTitle" name="jobTitle" placeholder="Enter Job Title">
                </div>
                <div class="mb-3">
                  <label for="department" class="form-label">Department:</label>
                  <select class="form-control" id="selectDepartment" name="department">
                    <option value="" disabled selected>Select Department</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Create</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Create Department Modal -->
      <div id="departmentModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create a New Department</h4>
            </div>
            <form action="createDepartment.php" method="post">
              <div class="modal-body">
                <div class="mb-3">
                  <label for="name" class="form-label">Department Name:</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Department Name">
                </div>
                <div class="mb-3">
                  <label for="department" class="form-label">Location:</label>
                  <select class="form-control" id="selectLocation" name="locationID">
                    <option value="" disabled selected>Select Location</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Create</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Create Location Modal -->
      <div id="locationModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create a New Location</h4>
            </div>
            <form action="createLocation.php" method="post">
              <div class="modal-body">
                <div class="mb-3">
                  <label for="name" class="form-label">Location Name:</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Location Name">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Create</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Show Staff Modal -->
      <div id="showStaffModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="staffTitle"></h4>
            </div>
            <form action="deletePersonnel.php" method="post">
              <div class="modal-body">
                <div class="mb-3">
                  <input type="hidden" id="personnelID" name="personnelID">                
                  <p id="staffName"></p>
                </div>
                <div class="mb-3">
                  <p id="staffLocation"></p>
                </div>
                <div class="mb-3">
                  <p id="staffDepartment"></p>
                </div>
                <div class="mb-3">
                  <p id="workTitle"></p>
                </div>
                <div class="mb-3">
                  <p id="staffEmail"></p>
                </div>
              </div>
              <div class="modal-footer">
                <!-- Edit button triggers myModal -->
                <button type="button" class="btn btn-secondary d-flex justify-content-start" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="editModalID" data-bs-toggle="modal" data-bs-target="#editStaffModal">Edit</button>
                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Show Department Modal -->
      <div id="showDepartmentModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="departmentTitle"></h4>
            </div>
            <form action="deleteDepartment.php" method="post">
              <div class="modal-body">
                <div class="mb-3">
                  <input type="hidden" id="departmentID" name="departmentID">                
                  <p id="departmentName"></p>
                </div>
                <div>
                  <p id="departmentLocation"></p>
                </div>
              </div>
              <div class="modal-footer">
                <!-- Edit button triggers myModal -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="editModalID" data-bs-toggle="modal" data-bs-target="#editDepartmentModal">Edit</button>
                <button type="submit" class="btn btn-danger" data-toggle="modal">Delete</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Show Location Modal -->
      <div id="showLocationModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Location</h4>
            </div>
            <form action="deleteLocation.php" method="post">
              <div class="modal-body">
                <div class="mb-3">
                  <input type="hidden" id="locationID" name="locationID">                
                  <p id="locationName"></p>
                </div>
              </div>
              <div class="modal-footer">
                <!-- Edit button triggers myModal -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="editModalID" data-bs-toggle="modal" data-bs-target="#editDepartmentModal">Edit</button>
                <button type="submit" class="btn btn-danger" data-toggle="modal">Delete</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!--EDIT PERSON MODAL-->
      <div id="editStaffModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Staff Member</h4>
            </div>
            <form action="editStaff.php" method="post">
              <div class="modal-body">
                <div class="mb-3"> 
                  <input type="hidden" name="editStaffID" id="editStaffID">                       
                  <label for="firstName" class="form-label">First Name:</label>
                  <input type="text" class="form-control" id="editFirstName" name="firstName" placeholder="Enter First Name">
                  <p></p>
                </div>
                <div class="mb-3">
                  <label for="lastName" class="form-label">Last Name:</label>
                  <input type="text" class="form-control" id="editLastName" name="lastName" placeholder="Enter Last Name">
                </div>
                <div class="mb-3">
                  <label for="department" class="form-label">Department:</label>
                  <select class="form-control" id="editDepartment" name="department">
                    <option id="staffDepartmentID" selected></option>
                  </select>
                </div>
                <div class="mb-3">                        
                  <label for="jobTitle" class="form-label">Job Title:</label>
                  <input type="text" class="form-control" id="editworkTitle" name="jobTitle" placeholder="Enter Job Title">
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email:</label>
                  <input type="email" class="form-control" id="editEmail" name="email" placeholder="Enter Email">
                </div>               
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Discard Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!--EDIT Department MODAL-->
      <div id="editDepartmentModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Department</h4>
            </div>
            <form action="editDepartment.php" method="post">
              <div class="modal-body">
                <div class="mb-3"> 
                  <input type="hidden" name="editDepartmentID" id="editDepartmentID">                       
                  <label for="firstName" class="form-label">Department Name:</label>
                  <input type="text" class="form-control" id="editDepartmentName" name="editDepartmentName" placeholder="Enter Department Name">
                </div>
                <div class="mb-3">
                  <label for="department" class="form-label">Location:</label>
                  <select class="form-control" id="editDepartmentLocation" name="editDepartmentLocation">
                    <option value="" disabled selected>Select Location</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Discard Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>      
    </div>
    <!--Jquery-->
    <script src="jquery-3.7.0.js"></script>
    <!--Bootstrap JS-->
    <script src="bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
    <!--Fontawesome JS-->
    <script src="fontawesome-free-6.2.1-web/js/all.js"></script>
    <!--Main JS-->
    <script src="main.js"></script>    
  </body>
</html>