@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="background:#6b1212; color:white;">
                <i class="	fa fa-desktop"></i> List of Genres
                <div class="pull-right">
                        <input type="text" name="search" id="searchText" class="form-control" placeholder="Search...">   
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="pull-right">
                        <button type="button" class="btn" style="background:lightgreen; color:black; font-family: century gothic;" id="addGenre"><i class="fa fa-plus"></i> Create Genre</button>
                        <br>
                        <br>                    
                    </div>
                    <table class="table table-bordered table-striped" id="genre">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Genre</th>
                                <!-- <th>Date</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="res">
                            <!-- call data via ajax -->
                        </tbody>
                    </table>
                </div>
                <!-- Add Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Add Genre</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">Genre Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="name">
                                        <span style="color:blue; font-style: italic;" id="valgenrename" class="valgenrename">This Genre name is required</span>
                                        <span style="color:red; font-style: italic;" id="validategenreNameErr" class="validategenreNameErr"></span>
                                        <span class="valgenrenameOK" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="valgenrenameOK" class=""></span></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary btn-sm" id="saveGenre">Save</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Edit Genre</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">ID</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="Genreid" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">Genre Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="names">
                                        <span style="color:blue; font-style: italic; display: none;" id="valgenrename" class="valgenrename">This Genre name is required</span>
                                        <span style="color:red; font-style: italic;" id="valgenrenameError" class="valgenrenameError"></span>
                                        <span class="validategenresNameOk" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="validategenresNameOk" class=""></span></i></span>
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
     // add modal validation for genres
    $(document).ready(function() {
        $('#name').keyup(function(e) {
            e.preventDefault();
            var name = $(this).val();
            var minLength = 3;
            if(e.keyCode == 27 || name == '') {
                $('.valgenrenameOK').css('display', 'none');
                $('.validategenreNameErr').css('display', 'none');
                $('.valgenrename').css('display', 'block');
            } else if($(this).val().length < minLength) {
                $('#validategenreNameErr').css('display', 'block');
                $('#validategenreNameErr').text('Please enter at least minimum of '+ minLength + ' characters')
                $('.valgenrenameOK').css('display', 'none');
                $('.valgenrename').css('display', 'none');
            } else {
                $('.valgenrenameOK').css('display', 'block');
                $('#valgenrenameOK').text('very well')
                $('#validategenreNameErr').css('display', 'none');
                $('.valgenrename').css('display', 'none');
            }
        });

        // edit modal validation for genres
        $('#names').keyup(function(e) {
            e.preventDefault();
            var names = $(this).val();
            var minLength = 3;
            if(e.keyCode == 27 || names == '') {
              
                $('.validategenresNameOk').css('display', 'none');
                $('.valgenrenameError').css('display', 'none');
                $('.valgenrename').css('display', 'block');
            } else if($(this).val().length < minLength) {
                $('#valgenrenameError').css('display', 'block');
                $('#valgenrenameError').text('Please enter at least minimum of '+ minLength + ' characters')
                $('.validategenresNameOk').css('display', 'none');
                $('.valgenrename').css('display', 'none');
            } else {
                $('.validategenresNameOk').css('display', 'block');
                $('#validategenresNameOk').text('very well')
                $('#valgenrenameError').css('display', 'none');
                $('.valgenrename').css('display', 'none');
            }
        });
    })

    $.ajax({
        url: "{{ route('user.getGenres') }}",
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
                html += '<td><span style="font-size: 16px; font-family: century gothic;">'+value.name+'</span></td>';
               
                html += '<td><button type="button" class="btn btn-primary btn-sm" style="color:white; font-family: century gothic;" id="editGenre" data-id="'+value.id+'"><i class="fa fa-pencil"></i> Edit Genre</button> <button type="button" class="btn btn-danger btn-sm" style="color:white; font-family: century gothic;" id="deleteGenre" data-id="'+value.id+'"><i class="fa fa-trash"></i> Delete</button></td>'
                html += '<tr>';
            })
            $('#genre').append(html);
        },
        error:function(e){
            console.log(e);
        }
    });

    $('#addGenre').on('click', function() {
        $('#addModal').modal('show');
    });

    // save add genre
    $('#saveGenre').on('click', function() {
        var name = $('#name').val();

        if(name == "") {
            alert("This field is required!");
            return;
        } else if(name.length < 3) {
            alert("Enter at least 3 characters, please,");
            return;
        }

        $.ajax({
            url: "{{ route('user.saveGenres') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                name:name
            },
            method:"post",
            dataType:"json",
            success:function(e){
                if(e.status == "OK")
                {
                    $('#addModal').modal('hide');
                    alert("A new Genre was successfully introduced!");
                    var html = '';
                    html += '<tr>';
                    html += '<td>'+e.genre.id+'</td>';
                    html += '<td><span style="font-size: 16px; font-family: century gothic;">'+e.genre.name+'</span></td>';
                  
                    html += '<td><button type="button" class="btn btn-primary btn-sm" style="color:white; font-family: century gothic;" id="editGenre" data-id="'+e.genre.id+'"><i class="fa fa-pencil"></i> Edit Genre</button> <button type="button" class="btn btn-danger btn-sm" style="color:white; font-family: century gothic;" id="deleteGenre" data-id="'+e.genre.id+'"><i class="fa fa-trash"></i> Delete</button></td>'
                    html += '<tr>';
                    $('#genre').prepend(html);
                }
            },
            error:function(e){
                console.log(e);
            }
        });
    });

    $(document).on('click', '#editGenre[data-id]', function() {
        $('#editModal').modal('show');
        var id = $(this).data('id');

        $.ajax({
            url: "{{ route('user.editGenres') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                id:id
            },
            method:"post",
            dataType:"json",
            success:function(e){
                if(e.status == "OK")
                {
                    $('#Genreid').val(e.genre.id)
                    $('#names').val(e.genre.name);
                }
            },
            error:function(e){
                console.log(e);
            }
        });
    });

    // save edit genre
    $('#save').on('click', function() {
        var id = $('#Genreid').val();
        var names = $('#names').val();

        if(names == "") {
            alert("This field is required!");
            return;
        } else if(names.length < 3) {
            alert("Enter at least 3 characters, please,");
            return;
        }

        $.ajax({
            url: "{{ route('user.updateGenres') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                id:id,
                names:names
            },
            method:"post",
            dataType:"json",
            success:function(e){
                if(e.status == "OK")
                {
                    alert("Good Producer Update!");
                    location.reload();
                }
            },
            error:function(e){
                console.log(e);
            }
        });
    });

    $(document).on('click', '#deleteGenre[data-id]', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var el = this;

        $.ajax({
            url: "{{ route('user.deleteGenres') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                id:id
            },
            method:"post",
            dataType:"json",
            success:function(e){
                if(e.status == "OK")
                {
                    alert("Successfully deleted genre ");
                    $(el).closest("tr").remove();
                }
            },
            error:function(e){
                console.log(e);
            }
        });
    })

    //search function
    $('#searchText').keyup(function(e) {
        e.preventDefault();
        var txt = $(this).val();
   
        if(e.keyCode === 27) {
            $(this).val('');
        }

        $.ajax({
            url: "{{ route('genre.search') }}",
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
                        html += '<td><span style="font-size: 16px; font-family: century gothic;">'+value.name+'</span></td>';
                     
                        html += '<td><button type="button" class="btn btn-primary btn-sm" style="color:white; font-family: century gothic;" id="editGenre" data-id="'+value.id+'"><i class="fa fa-pencil"></i> Edit Genre</button> <button type="button" class="btn btn-danger btn-sm" style="color:white; font-family: century gothic;" id="deleteGenre" data-id="'+value.id+'"><i class="fa fa-trash"></i> Delete</button></td>'
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
