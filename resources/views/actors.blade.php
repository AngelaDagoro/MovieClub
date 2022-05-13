@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="background:#6b1212; color:white;">
                <i class="fa fa-vcard"></i> List of Actors
                    <div class="pull-right">
                        <input type="text" name="search" id="searchText" class="form-control" placeholder="Search...">
                    </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="pull-right">
                        <button type="button" class="btn" style="background:lightgreen; color:black; font-family: century gothic;" id="addActor"><i class="fa fa-plus"></i> Create Actor</button>
                        <br>                   
                        <br>
                    </div>
                    <table class="table table-bordered table-striped" id="actor">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="res" class="res">
                            <!-- call data via ajax -->
                        </tbody>
                    </table>
                </div>
                <!-- Add Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Add Actor</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="fname">
                                        <span style="color:blue; font-style: italic;" id="validatefnameReq" class="validatefnameReq">This firstname is required</span>
                                        <span style="color:red; font-style: italic;" id="validatefnameErr" class="validatefnameErr"></span>
                                        <span class="validatefnameOk" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="validatefnameOk" class=""></span></i></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="lname">
                                        <span style="color:blue; font-style: italic;" id="validatelnameReq" class="validatelnameReq">This lastname is required</span>
                                        <span style="color:red; font-style: italic;" id="validatelnameErr" class="validatelnameErr"></span>
                                        <span class="validatelnameOk" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="validatelnameOk" class=""></span></i></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">Age</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="ages">
                                        <span style="color:blue; font-style: italic;" id="validateAgesReq" class="validateAgesReq">This age is required</span>
                                        <span style="color:red; font-style: italic;" id="validateAgesErr" class="validateAgesErr"></span>
                                        <span class="validateAgesOk" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="validateAgesOk" class=""></span></i></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">Gender</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="genders">
                                            <option value="">Select Gender...</option>
                                            <option value="0">Male</option>
                                            <option value="1">Female</option>
                                        </select>
                                        <span style="color:blue; font-style: italic;" id="validateGendersReq" class="validateGendersReq">This gender is required</span>
                                        <span style="color:red; font-style: italic;" id="validateGendersErr" class="validateGendersErr"></span>
                                        <span class="validateGendersOk" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="validateGendersOk" class=""></span></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary btn-sm" id="saveActor">Save</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Edit Actor</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">ID</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="Actorid" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="firstname">
                                        <span style="color:blue; font-style: italic; display: none;" id="validatefirstNameReq" class="validatefirstNameReq">This firstname is required</span>
                                        <span style="color:red; font-style: italic;" id="validatefirstNameErr" class="validatefirstNameErr"></span>
                                        <span class="validatefirstNameOk" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="validatefirstNameOk" class=""></span></i></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="lastname">
                                        <span style="color:blue; font-style: italic; display: none;" id="validatelastNameReq" class="validatelastNameReq">This lastname is required</span>
                                        <span style="color:red; font-style: italic;" id="validatelastNameErr" class="validatelastNameErr"></span>
                                        <span class="validatelastNameOk" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="validatelastNameOk" class=""></span></i></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">Age</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="age">
                                        <span style="color:blue; font-style: italic; display: none;" id="validateAgeReq" class="validateAgeReq">This age is required</span>
                                        <span style="color:red; font-style: italic;" id="validateAgeErr" class="validateAgeErr"></span>
                                        <span class="validateAgeOk" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="validateAgeOk" class=""></span></i></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">Gender</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="gender">
                                            <option value="">Select Gender...</option>
                                            <option value="0">Male</option>
                                            <option value="1">Female</option>
                                        </select>
                                        <span style="color:blue; font-style: italic; display: none;" id="validateGenderReq" class="validateGenderReq">This gender is required</span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary btn-sm" id="save">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // add modal validation for actors
        $('#fname').keyup(function(e) {
            e.preventDefault();
            var fname = $(this).val();
            var minLength = 3;
            if(e.keyCode == 27 || fname == '') {
               
                $('.validatefnameOk').css('display', 'none');
                $('.validatefnameErr').css('display', 'none');
                $('.validatefnameReq').css('display', 'block');
            } else if($(this).val().length < minLength) {
                $('#validatefnameErr').css('display', 'block');
                $('#validatefnameErr').text('Please enter at least minimum of '+ minLength + ' characters')
                $('.validatefnameOk').css('display', 'none');
                $('.validatefnameReq').css('display', 'none');
            } else {
                $('.validatefnameOk').css('display', 'block');
                $('#validatefnameOk').text('very well')
                $('#validatefnameErr').css('display', 'none');
                $('.validatefnameReq').css('display', 'none');
            }
        });

        $('#lname').keyup(function(e) {
            e.preventDefault();
            var lname = $(this).val();
            var minLength = 2;
            if(e.keyCode == 27 || lname == '') {
              
                $('.validatelnameOk').css('display', 'none');
                $('.validatelnameErr').css('display', 'none');
                $('.validatelnameReq').css('display', 'block');
            } else if($(this).val().length < minLength) {
                $('#validatelnameErr').css('display', 'block');
                $('#validatelnameErr').text('Please enter at least minimum of '+ minLength + ' characters')
                $('.validatelnameOk').css('display', 'none');
                $('.validatelnameReq').css('display', 'none');
            } else {
                $('.validatelnameOk').css('display', 'block');
                $('#validatelnameOk').text('very well')
                $('#validatelnameErr').css('display', 'none');
                $('.validatelnameReq').css('display', 'none');
            }
        });

        $('#ages').keyup(function(e) {
            e.preventDefault();
            var age = $(this).val();
            if(e.keyCode == 27 || age == '') {
              
                $('.validateAgesOk').css('display', 'none');
                $('.validateAgesErr').css('display', 'none');
                $('.validateAgesReq').css('display', 'block');
            } else if(!$.isNumeric(age)) {
                $('#validateAgesErr').css('display', 'block');
                $('#validateAgesErr').text('Please enter valid age')
                $('.validateAgesOk').css('display', 'none');
                $('.validateAgesReq').css('display', 'none');
            } else {
                $('.validateAgesOk').css('display', 'block');
                $('#validateAgesOk').text('very well')
                $('#validateAgesErr').css('display', 'none');
                $('.validateAgesReq').css('display', 'none');
            }
        });

        $('#genders').on('change', function(e) {
            // alert($(this).val())
            e.preventDefault();
            var gender = $(this).val();
            if(gender == '') {
                $('.validateGendersOk').css('display', 'none');
                $('.validateGendersErr').css('display', 'none');
                $('.validateGendersReq').css('display', 'block');
            } else {
                $('.validateGendersOk').css('display', 'block');
                $('#validateGendersOk').text('very well')
                $('#validateGendersErr').css('display', 'none');
                $('.validateGendersReq').css('display', 'none');
            }
        });

        // edit modal validation
        $('#firstname').keyup(function(e) {
            e.preventDefault();
            var firstname = $(this).val();
            var minLength = 3;
            if(e.keyCode == 27 || firstname == '') {
               
                $('.validatefirstNameOk').css('display', 'none');
                $('.validatefirstNameErr').css('display', 'none');
                $('.validatefirstNameReq').css('display', 'block');
            } else if($(this).val().length < minLength) {
                $('#validatefirstNameErr').css('display', 'block');
                $('#validatefirstNameErr').text('Please enter at least minimum of '+ minLength + ' characters')
                $('.validatefirstNameOk').css('display', 'none');
                $('.validatefirstNameReq').css('display', 'none');
            } else {
                $('.validatefirstNameOk').css('display', 'block');
                $('#validatefirstNameOk').text('very well')
                $('#validatefirstNameErr').css('display', 'none');
                $('.validatefirstNameReq').css('display', 'none');
            }
        });

        $('#lastname').keyup(function(e) {
            e.preventDefault();
            var lastname = $(this).val();
            var minLength = 2;
            if(e.keyCode == 27 || lastname == '') {
             
                $('.validatelastNameOk').css('display', 'none');
                $('.validatelastNameErr').css('display', 'none');
                $('.validatelastNameReq').css('display', 'block');
            } else if($(this).val().length < minLength) {
                $('#validatelastNameErr').css('display', 'block');
                $('#validatelastNameErr').text('Please enter at least minimum of '+ minLength + ' characters')
                $('.validatelastNameOk').css('display', 'none');
                $('.validatelastNameReq').css('display', 'none');
            } else {
                $('.validatelastNameOk').css('display', 'block');
                $('#validatelastNameOk').text('very well')
                $('#validatelastNameErr').css('display', 'none');
                $('.validatelastNameReq').css('display', 'none');
            }
        });

        $('#age').keyup(function(e) {
            e.preventDefault();
            var age = $(this).val();
            if(e.keyCode == 27 || age == '') {
              
                $('.validateAgeOk').css('display', 'none');
                $('.validateAgeErr').css('display', 'none');
                $('.validateAgeReq').css('display', 'block');
            } else if(!$.isNumeric(age)) {
                $('#validateAgeErr').css('display', 'block');
                $('#validateAgeErr').text('Please enter valid age')
                $('.validateAgeOk').css('display', 'none');
                $('.validateAgeReq').css('display', 'none');
            } else {
                $('.validateAgeOk').css('display', 'block');
                $('#validateAgeOk').text('very well')
                $('#validateAgeErr').css('display', 'none');
                $('.validateAgeReq').css('display', 'none');
            }
        });

        $('#gender').on('change', function(e) {
         
            e.preventDefault();
            var gender = $(this).val();
            if(gender == '') {
                $('.validateGenderOk').css('display', 'none');
                $('.validateGenderErr').css('display', 'none');
                $('.validateGenderReq').css('display', 'block');
            } else {
                $('.validateGenderOk').css('display', 'block');
                $('#validateGenderOk').text('very well')
                $('#validateGenderErr').css('display', 'none');
                $('.validateGenderReq').css('display', 'none');
            }
        });

        // genre table
        $.ajax({
            url: "{{ route('user.getActors') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            method:"post",
            dataType:"json",
            success:function(e){
                var html = '';
                var gender = '';
                $.each(e, function(key, value) {
                    if(value.gender == 0) {
                        gender = "Male";
                    } else {
                        gender = "Female";
                    }
                    html += '<tr>';
                    html += '<td>'+value.id+'</td>';
                    html += '<td><span style="font-size: 16px; font-family: century gothic;">'+value.firstname+'</span></td>';
                    html += '<td><span style="font-size: 16px; font-family: century gothic;">'+value.lastname+'</span></td>';
                    html += '<td><span style="font-size: 16px; font-family: century gothic;">'+value.age+' yrs old</span></td>';
                    html += '<td><span style="font-size: 16px; font-family: century gothic;">'+gender+'</span></td>';
                    html += '<td><button type="button" class="btn btn-primary btn-sm" style="color:white; font-family: century gothic;" id="editActor" data-id="'+value.id+'"><i class="fa fa-pencil"></i> Edit Actor</button> <button type="button" class="btn btn-danger btn-sm" style="color:white; font-family: century gothic;" id="deleteActor" data-id="'+value.id+'"><i class="fa fa-trash"></i> Delete</button></td>'
                    html += '<tr>';
                })
                $('#actor').append(html);
            },
            error:function(e){
                console.log(e);
            }
        });
    });
</script>
<script>
    $(document).on('click', '#editActor[data-id]', function() {
        var id = $(this).data('id');
        $('#editModal').modal('show');

        // get actor details
        $.ajax({
           url: "{{ route('user.getSpecificActor') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                id:id
            },
            method:"post",
            dataType:"json",
            success:function(data){
                $('#Actorid').val(data.id);
                $('#firstname').val(data.firstname);
                $('#lastname').val(data.lastname);
                $('#age').val(data.age);
                $('#gender').val(data.gender);
            },
            error:function(data){
                console.log(data);
            } 
        });
    });

    // save edit actor
    $('#save').on('click', function() {
        var id = $('#Actorid').val();
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var age = $('#age').val();
        var gender = $('#gender').val();

        if(firstname == "") {
            alert("First Name cannot be empty!");
            return;
        } else if(firstname.length < 3) {
            alert("Enter at least 3 characters, please,");
            return;
        }

        if(lastname == "") {
            alert("Last Name cannot be empty!");
            return;
        } else if(lastname.length < 2) {
            alert("Enter at least 3 characters, please,");
            return;
        }

        if(age == "") {
            alert("Age cannot be empty!");
            return;
        } else if(!$.isNumeric(age)) {
            alert('Please enter valid age');
            return;
        }

        if(gender == "") {
            alert("This field is required!");
            return;
        }

        $.ajax({
           url: "{{ route('user.saveSpecificActor') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                id:id,
                firstname:firstname,
                lastname:lastname,
                age:age,
                gender:gender
            },
            method:"post",
            dataType:"json",
            success:function(data){
                if(data.status == "OK")
                {
                    alert("Good Producer Update!");
                    location.reload();
                }
            },
            error:function(data){
                console.log(data);
            } 
        });
    });

    // add actor
    $('#addActor').on('click', function() {
        $('#addModal').modal('show');
    });

    // save add actor
    $('#saveActor').on('click', function(e) {
        e.preventDefault();
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var ages = $('#ages').val();
        var gender = $('#genders').val();

        if(fname == "") {
            alert("First Name cannot be empty!");
            location.reload();
        } else if(fname.length < 3) {
            alert("Enter at least 3 characters, please,");
            return;
        }

        if(lname == "") {
            alert("Last Name cannot be empty!");
            location.reload();
        } else if(lname.length < 2) {
            alert("Enter at least 3 characters, please,");
            return;
        }

        if(ages == "") {
            alert("Age cannot be empty!");
            location.reload();
        } else if(!$.isNumeric(ages)) {
            alert('Please enter valid age');
            return;
        }

        if(gender == "") {
            alert("This field is required!");
            return;
        }

        $.ajax({
            url: "{{ route('user.addActor') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                firstname:fname,
                lastname:lname,
                age:ages,
                gender:gender
            },
            method:"post",
            dataType:"json",
            success:function(data){
                console.log
                if(data.status == "OK")
                {
                    $('#addModal').modal('hide');
                    alert("A new Actor was successfully introduced!");
                    var html = '';
                    if(data.actor.gender == 0) {
                        gender = "Male";
                    } else {
                        gender = "Female";
                    }
                    html += '<tr>';
                    html += '<td>'+data.actor.id+'</td>';
                    html += '<td><span style="font-size: 16px; font-family: century gothic;">'+data.actor.firstname+'</span></td>';
                    html += '<td><span style="font-size: 16px; font-family: century gothic;">'+data.actor.lastname+'</span></td>';
                    html += '<td><span style="font-size: 16px; font-family: century gothic;">'+data.actor.age+' yrs old</span></td>';
                    html += '<td><span style="font-size: 16px; font-family: century gothic;">'+gender+'</span></td>';
                    html += '<td><button type="button" class="btn btn-primary btn-sm" style="color:white; font-family: century gothic;" id="editActor" data-id="'+data.actor.id+'"><i class="fa fa-pencil"></i> Edit Actor</button> <button type="button" class="btn btn-danger btn-sm" style="color:white; font-family: century gothic;" id="deleteActor" data-id="'+data.actor.id+'"><i class="fa fa-trash"></i> Delete</button></td>'
                    html += '<tr>';
                    $('#actor').prepend(html);
                }
            },
            error:function(data){
                console.log(data);
            } 
        });
    });

    $(document).on('click', '#deleteActor[data-id]', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var el = this;

        $.ajax({
           url: "{{ route('user.deleteActor') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                id:id
            },
            method:"post",
            dataType:"json",
            success:function(data){
               if(data.status == "OK")
               {
                    alert("Successfully deleted actor!");
                    $(el).closest("tr").remove();
               }
            },
            error:function(data){
                console.log(data);
            } 
        });
    });

    //search function
    $('#searchText').keyup(function(e) {
        e.preventDefault();
        var txt = $(this).val();
        
        if(e.keyCode === 27) {
            $(this).val('');
        }

        $.ajax({
            url: "{{ route('actor.search') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                search: txt,
            },
            method:"post",
            dataType:"json",
            success:function(data){
                $("#res").empty();
                var html = '';
                if(data == '') {
                    var count = 6;
                    html += '<tr>';
                    html += '<td colspan="'+count+'" style="text-align:center;">No record found!</td>';
                    html += '<tr>';
                } else {
                    var gender = '';
                    $.each(data, function(key, value) {
                        if(value.gender == 0) {
                            gender = "Male";
                        } else {
                            gender = "Female";
                        }
                        html += '<tr>';
                        html += '<td>'+value.id+'</td>';
                        html += '<td><span style="font-size: 16px; font-family: century gothic;">'+value.firstname+'</span></td>';
                        html += '<td><span style="font-size: 16px; font-family: century gothic;">'+value.lastname+'</span></td>';
                        html += '<td><span style="font-size: 16px; font-family: century gothic;">'+value.age+' yrs old</span></td>';
                        html += '<td><span style="font-size: 16px; font-family: century gothic;">'+gender+'</span></td>';
                        html += '<td><button type="button" class="btn btn-primary btn-sm" style="color:white; font-family: century gothic;" id="editActor" data-id="'+value.id+'"><i class="fa fa-pencil"></i> Edit Actor</button> <button type="button" class="btn btn-danger btn-sm" style="color:white; font-family: century gothic;" id="deleteActor" data-id="'+value.id+'"><i class="fa fa-trash"></i> Delete</button></td>'
                        html += '<tr>';
                    })
                }
                $('#res').append(html);
            },
            error:function(e){
                console.log(e);
            }
        });
    });
</script>
@endsection
