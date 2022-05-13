@extends('layouts.dashboard')

@section('content')
<div class="container">
<div class="pull-right">
            <input type="text" name="search" id="searchText" class="form-control" placeholder="Search Role...">
            <br>
        </div>
    <div class="col-md-12">
            <div class="pull-right">
                    <button type="button" class="btn btn-primary btn-sm" style="color:white; font-family: century gothic;" id="insertRole"><i class="fa fa-plus"></i> Add Role</button>
            </div>
            <h2>Role Types</h2>
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="role">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Role type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="res">
                        </tbody>
                    </table>
                </div>

        <!-- Add Modal -->
        <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content" style="background-color: #a5e6e6; color:black;">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Add Roles</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">Role Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="role_title">
                                        <span style="color:blue; font-style: italic;" id="validate_role_titleReq" class="validate_role_titleReq">This field is required</span>
                                        <span style="color:red; font-style: italic;" id="validate_role_titleErr" class="validate_role_titleErr"></span>
                                        <span class="validate_role_titleOk" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="validate_role_titleOk" class=""></span></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary btn-sm" id="save_role">Save</button>
                            </div>
                        </div>
                    </div>
                </div>


               <!-- Edit Modal -->
               <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content" style="background-color: #a5e6e6; color:black;">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Edit Role</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">ID</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="role_id" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">Role Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="role_name">
                                        <span style="color:blue; font-style: italic; display: none;" id="validate_role_name_Req" class="validate_role_name_Req">This field is required</span>
                                        <span style="color:red; font-style: italic;" id="validate_role_name_Err" class="validate_role_name_Err"></span>
                                        <span class="validate_role_name_Ok" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="validate_role_name_Ok" class=""></span></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary btn-sm" id="role_update">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
         
    </div>
</div>

<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('user.getAllRoles') }}",
            headers: {
                      'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            method:"post",
            dataType:"json",
            success:function(e){
                var html = '';
                $.each(e, function(key, value) {
                    html += '<tr>';
                    html += '<td>'+value.id+'</td>';
                    html += '<td>'+value.role+'</td>';
                    html += '<td> <button type="button" class="btn btn-primary btn-sm" style="color:white; font-family: century gothic;" id="role_edit" data-id="'+value.id+'"><i class="fa fa-pencil"></i> Edit</button> <button type="button" class="btn btn-danger btn-sm" style="color:white; font-family: century gothic;" id="role_delete" data-id="'+value.id+'"> <i class="fa fa-trash"></i> Remove</button></td>';
                    
                    html += '<tr>';
                })
                $('#role').append(html);
            }
        });
    });

            // add role  modal validation
            $('#role_title').keyup(function(e) {
            e.preventDefault();
            var role_title = $(this).val();
            var minLength = 3;
            if(e.keyCode == 27 || role_title == '') {
                //if esc is pressed we want to clear the value of search box
                $('.validate_role_titleOk').css('display', 'none');
                $('.validate_role_titleErr').css('display', 'none');
                $('.validate_role_titleReq').css('display', 'block');
            } else if($(this).val().length < minLength) {
                $('#validate_role_titleErr').css('display', 'block');
                $('#validate_role_titleErr').text('Please enter at least minimum of '+ minLength + ' characters')
                $('.validate_role_titleOk').css('display', 'none');
                $('.validate_role_titleReq').css('display', 'none');
            } else {
                $('.validate_role_titleOk').css('display', 'block');
                $('#validate_role_titleOk').text('Ok')
                $('#validate_role_titleErr').css('display', 'none');
                $('.validate_role_titleReq').css('display', 'none');
            }
        });

        // edit modal validation
        $('#role_name').keyup(function(e) {
            e.preventDefault();
            var role_name_title = $(this).val();
            var minLength = 3;
            if(e.keyCode == 27 || role_name == '') {
                //if esc is pressed we want to clear the value of search box
                $('.validate_role_name_Ok').css('display', 'none');
                $('.validate_role_name_Err').css('display', 'none');
                $('.validate_role_name_Req').css('display', 'block');
                
            } else if($(this).val().length < minLength) {
                $('#validate_role_name_Err').css('display', 'block');
                $('#validate_role_name_Err').text('Please enter at least minimum of '+ minLength + ' characters')
                $('.validate_role_name_Ok').css('display', 'none');
                $('.validate_role_name_Req').css('display', 'none');
            } else {
                $('.validate_role_name_Ok').css('display', 'block');
                $('#validate_role_name_Ok').text('Ok')
                $('#validate_role_name_Err').css('display', 'none');
                $('.validate_role_name_Req').css('display', 'none');
            }
        });
    


    $('#insertRole').on('click', function() {
        $('#insertModal').modal('show');
    });

    $('#save_role').on('click', function() {
        var role = $('#role_title').val();

        if(role == "")
        {
            alert("Role cannot be empty!");
            location.reload();
        }
      
        $.ajax({
            url: "{{ route('user.role_save') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                role:role
           
            },
            method:"post",
            dataType:"json",
            success:function(e){
                    $('#insertModal').modal('hide');
                    alert("Successfully added new role!");
                    var html = '';
                    html += '<tr>';
                    html += '<td>'+e.id+'</td>';
                    html += '<td>'+e.role+'</td>';
                    html += '<td> <button type="button" class="btn btn-primary btn-sm" style="color:white; font-family: century gothic;" id="role_edit" data-id="'+e.id+'"><i class="fa fa-pencil"></i> Edit</button> <button type="button" class="btn btn-danger btn-sm" style="color:white; font-family: century gothic;" id="role_delete" data-id="'+e.id+'"><i class="fa fa-trash"></i> Remove</button></td>'
                    html += '<tr>';
                    $('#role').prepend(html);
                    location.reload(); 
            },
            error:function(e){
                console.log(e);
            }
        });
    });

    $(document).on('click', '#role_edit[data-id]', function() {
        $('#editModal').modal('show');
        var id = $(this).data('id');

        $.ajax({
            url: "{{ route('user.role_edit') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                role_id:id
            },
            method:"post",
            dataType:"json",
            success:function(e){
                $('#role_id').val(e.id)
                $('#role_name').val(e.role);
            },
            error:function(e){
                console.log(e);
            }
        });
    });

    $('#role_update').on('click', function() {
        $.ajax({
            url: "{{ url('roletypes/update') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                Rid: $('#role_id').val(),
                Rname: $('#role_name').val()
            },
            method:"post",
            dataType:"json",
            success:function(e){
                alert("Successfully updated role!");
                location.reload();
            },
            error:function(e){
                console.log(e);
            }
        });
    });

    $(document).on('click', '#role_delete[data-id]', function() {
        $.ajax({
            url: "{{ url('roletypes/delete') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                role_id: $(this).data('id'),
            },
            method:"post",
            dataType:"json",
            success:function(e){
                alert("Successfully deleted role!");
                location.reload();
            },
            error:function(e){
                console.log(e);
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
            url: "{{ route('role.search') }}",
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
                    $.each(data, function(key, value) {
                        html += '<tr>';
                        html += '<td>'+value.id+'</td>';
                        html += '<td><span class="badge badge-success" style="font-size: 16px; font-family: century gothic; background-color: rgb(3, 165, 173);">'+value.role+'</span></td>';
                        html += '<td><button type="button" class="btn btn-primary btn-sm" style="color:white; font-family: century gothic;" id="role_edit" data-id="'+value.id+'"><i class="fa fa-pencil"></i> Edit</button> <button type="button" class="btn btn-danger btn-sm" style="color:white; font-family: century gothic;" id="role_delete" data-id="'+value.id+'"><i class="fa fa-trash"></i> Remove</button></td>'
                        html += '<tr>';
                    })
                }
                $('#res').append(html);
            },
            error:function(data){
                console.log(data);
            }
        });
    });

</script>
@endsection