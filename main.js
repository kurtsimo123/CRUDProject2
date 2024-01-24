function getAll() {
    $.ajax({
        url: "getAll.php",
        type: 'POST',
        dataType: 'json',
        success: function(result) {
            var data = result['data'];
            for (var i = 0; i < data.length; i++) {
                let staffID = data[i]['id'];
                let firstName = data[i]['firstName'];
                let lastName = data[i]['lastName'];
                let jobTitle = data[i]['jobTitle'];
                let email = data[i]['email'];
                let location = data[i]['location'];
                let department = data[i]['department'];
                
                $('#personnelBody').append(`<tr data-bs-id="${staffID}" class="showStaff" data-toggle="modal" data-target="#myModal"><td>${lastName}, ${firstName}</td><td>${department}</td><td colspan="2">${location}</td></tr>`);
            }          
        },
        error: function(err) {
            console.log('Error getting all data:', err);
        }
    });
}

$(document).ready(function() {
    getAll();

    $(document).on('click', '#refreshSearch', function() {
        $('#personnelBody').empty();
        $('#staffSearch').val('');
        getAll();
    })


$(document).on('click', '.showStaff', function(event) {
    let clickedRow = event.currentTarget;
    let staffID = clickedRow.getAttribute('data-bs-id');
    $('#showStaffModal').modal("show");

    $.ajax({
        url: "getPersonnelModal.php",
        type: 'POST',
        dataType: 'json',
        data: {
            staffID: staffID
        },
        success: function(result) {
            var data = result['data'];
            for (var i = 0; i < data.length; i++) {
                let staffID = data[i]['id'];
                let firstName = data[i]['firstName'];
                let lastName = data[i]['lastName'];
                let jobTitle = data[i]['jobTitle'];
                let email = data[i]['email'];
                let location = data[i]['location'];
                let department = data[i]['department']; 
                let departmentID = data[i]['departmentID'];               
                
                $('#personnelID').attr('value', staffID);
                $('#editStaffID').attr('value', staffID); 
                $('#staffTitle').html(`${firstName} ${lastName}`);
                $('#staffFirstName').html(`${firstName}`);
                $('#staffLastName').html(`${lastName}`);
                $('#staffName').html(`Name: ${firstName} ${lastName}`);                
                $('#workTitle').html(`Job Title: ${jobTitle}`); 
                $('#staffDepartment').html(`Department: ${department}`);
                $('#staffEmail').html(`Email: ${email}`);
                $('#staffLocation').html(`Location: ${location}`);

                // set edit modal values//
                $('#editFirstName').val(firstName);
                $('#editLastName').val(lastName);
                $('#editName').val('Name: ' + firstName + ' ' + lastName);
                $('#editworkTitle').val(jobTitle);
                $('#editDepartment').val(departmentID);
                $('#editEmail').val(email);              
            }          
        },
        error: function(err) {
            console.log('Error getting all data:', err);
        }
    });
});

let addStaffButton = document.getElementById('addStaff');
let showStaffDetails = document.getElementById('showStaff');
let addDepartmentButton = document.getElementById('addDepartment');
let addLocationButton = document.getElementById('addLocation');
let editStaffButton = document.getElementById('editButton');
let showDepartmentDetails = document.getElementById('editButton');

//SHOW MODALS FUNCTIONS//
addStaffButton.addEventListener('click', function() {
    $('#myModal').modal("show");
});

addDepartmentButton.addEventListener('click', function() {
    $('#departmentModal').modal("show");
});

addLocationButton.addEventListener('click', function() {
    $('#locationModal').modal("show");
});

function editStaff() {
    $('#editModal').modal("show");
}

/////////////////////////////////////////////GET DEPARTMENTS//////////////////////////////////////////

$.ajax({
    url: "getDepartments.php",
    type: 'POST',
    dataType: 'json',
    success: function(result) {
        var data = result['data'];
        for (var i = 0; i < data.length; i++) {
            let departmentID = data[i]['department_id'];
            let departmentName = data[i]['department_name'];
            let departmentLocation = data[i]['location_name'];
            $('#departmentBody').append(`<tr class="departmentRow" data-bs-id="${departmentID}"><td>${departmentName}</td><td>${departmentLocation}</td></tr>`);
            $('#selectDepartment').append(`<option value="${departmentID}">${departmentName}</option>`);
            $('#editDepartment').append(`<option value="${departmentID}">${departmentName}</option>`);
        }          
    },
    error: function(err) {
        console.log('Error getting all data:', err);
    }
});

$(document).on('click', '.departmentRow', function(event) {
    let clickedRow = event.currentTarget;
    let departmentID = clickedRow.getAttribute('data-bs-id');
    $('#showDepartmentModal').modal("show");
    

    $.ajax({
        url: "getDepartmentModal.php",
        type: 'POST',
        dataType: 'json',
        data : {
            departmentID:departmentID
        },
        success: function(result) {
            var data = result['data'];
            for (var i = 0; i < data.length; i++) {
                let departmentID = data[i]['id'];
                let departmentName = data[i]['department'];
                let departmentLocation = data[i]['location'];
                let locationID = data[i]['locationID'];

                $('#departmentID').attr('value', departmentID);
                $('#editDepartmentID').attr('value', departmentID);
                $('#editDepartmentName').val(departmentName);
                $('#editDepartmentLocation').val(locationID);
                $('#departmentTitle').html(departmentName);    
                $('#departmentName').html(`Department: ${departmentName}`);               
                $('#departmentLocation').html(`Location: ${departmentLocation}`);
            }          
        },
        error: function(err) {
            console.log('Error getting showDepartmentModal data:', err);
        }
    });

});

/////////////////////////////////////////////GET LOCATIONS//////////////////////////////////////////



$.ajax({
    url: "getLocations.php",
    type: 'POST',
    dataType: 'json',
    success: function(result) {
        var data = result['data'];
        for (var i = 0; i < data.length; i++) {
            let locationID = data[i]['id'];
            let locationName = data[i]['name'];           
            $('#locationBody').append(`<tr class="locationRow" data-bs-id="${locationID}"><td>${locationName}</td></tr>`);
            $('#selectLocation').append(`<option value="${locationID}">${locationName}</option>`);
            $('#editDepartmentLocation').append(`<option value="${locationID}">${locationName}</option>`);
        }          
    },
    error: function(err) {
        console.log('Error getting all data:', err);
    }
});

$(document).on('click', '.locationRow', function(event) {
    let clickedRow = event.currentTarget;
    let locationID = clickedRow.getAttribute('data-bs-id');
    $('#showLocationModal').modal("show");

    $.ajax({
        url: "getLocationModal.php",
        type: 'POST',
        dataType: 'json',
        data: {
            locationID:locationID
        },
        success: function(result) {
            var data = result['data'];            
            for (var i = 0; i < data.length; i++) {
                let locationID = data[i]['id'];
                let locationName = data[i]['name'];  
                $('#locationName').html(`${locationName}`);
                $('#locationID').attr('value',locationID);                
            }          
        },
        error: function(err) {
            console.log('Error getting showLocationModal data:', err);
        }
    });
});

$('#searchStaff').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
        url: "searchData.php",
        type: 'POST',
        dataType: 'json',
        data: {
            searchQuery: $('#staffSearch').val()
        },
        success: function(result) {        
            let data = result['data'];
            if (data.length > 0) {
                $('#personnelBody').empty();
                for (var i = 0; i < data.length; i++) {
                let person = data[i];
                let tableRow = `<tr class="showStaff" data-bs-toggle="modal" data-bs-id=${person.personID} data-bs-target="#showStaffModal">
                                    <td>${person.lastName}, ${person.firstName}</td>
                                    <td>${person.departmentName}</td>
                                    <td>${person.locationName}</td>
                                </tr>`;
                $('#personnelBody').append(tableRow);                           
                }          
            } else {
                $('#personnelBody').empty().append('<tr><td colspan="3">Sorry! No entries found.</td></tr>');
            }
        },
        error: function(err) {
            console.log('Error getting search data:', err);
        }
    });

});

});