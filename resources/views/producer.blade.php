@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="background:#6b1212; color:white;">
                <i class="fa fa-users"></i> List of Producers
                    <div class="pull-right">
                        <input type="text" name="search" id="searchText" class="form-control" placeholder="Search...">
                    </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    

                    <div class="pull-right">
                            <button type="button" class="btn" style="background:lightgreen; color:black; font-family: century gothic;" id="addProducer"><i class="fa fa-plus"></i> Create Producer</button>
                            <br>
                            <br>
                    </div>
                    <table class="table table-bordered table-striped" id="producer">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Age</th>
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
                                <h4 class="modal-title" id="myModalLabel">Add Producer</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">First Name:</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="ffname">
                                        <span style="color:blue; font-style: italic;" id="valffnamered" class="valffnamered">This First Name is required</span>
                                        <span style="color:red; font-style: italic;" id="valffnameError" class="valffnameError"></span>
                                        <span class="valffnameOK" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="valffnameOK" class=""></span></i></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">Last Name:</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="llname">
                                        <span style="color:blue; font-style: italic;" id="valllnamereq" class="valllnamereq">This Last Name is required</span>
                                        <span style="color:red; font-style: italic;" id="valllnameError" class="valllnameError"></span>
                                        <span class="valllnameOK" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="valllnameOK" class=""></span></i></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">Age:</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="age">
                                        <span style="color:blue; font-style: italic;" id="valagered" class="valagered">This Age is required</span>
                                        <span style="color:red; font-style: italic;" id="valageError" class="valageError"></span>
                                        <span class="valageOk" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="valageOk" class=""></span></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary btn-sm" id="saveProducer">Save</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Edit Producer</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">ID</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="Producerid" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="fname">
                                        <span style="color:blue; font-style: italic;" id="valfnamer" class="valfnamer">This firstname is required</span>
                                        <span style="color:red; font-style: italic;" id="valfnamee" class="validatefnameErr"></span>
                                        <span class="valfnameo" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="valfnameo" class=""></span></i></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="lname">
                                        <span style="color:blue; font-style: italic;" id="vallnamer" class="vallnamer">This lastname is required</span>
                                        <span style="color:red; font-style: italic;" id="vallnamee" class="vallnamee"></span>
                                        <span class="vallnameo" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="vallnameo" class=""></span></i></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">Age</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="ages">
                                        <span style="color:blue; font-style: italic;" id="valager" class="valager">This age is required</span>
                                        <span style="color:red; font-style: italic;" id="valagee" class="valagee"></span>
                                        <span class="valageo" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="valageo" class=""></span></i></span>
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
    $(document).ready(function () {
        // add modal validation
        $('#ffname').keyup(function(e) {
            e.preventDefault();
            var ffname = $(this).val();
            var minLength = 3;
            if(e.keyCode == 27 || ffname == '') {
              
                $('.valffnameOK').css('display', 'none');
                $('.valffnameError').css('display', 'none');
                $('.valffnamered').css('display', 'block');
            } else if($(this).val().length < minLength) {
                $('#valffnameError').css('display', 'block');
                $('#valffnameError').text('Please enter at least minimum of '+ minLength + ' characters')
                $('.valffnameOK').css('display', 'none');
                $('.valffnamered').css('display', 'none');
            } else {
                $('.valffnameOK').css('display', 'block');
                $('#valffnameOK').text('very well')
                $('#valffnameError').css('display', 'none');
                $('.valffnamered').css('display', 'none');
            }
        });

        $('#llname').keyup(function(e) {
            e.preventDefault();
            var llname = $(this).val();
            var minLength = 2;
            if(e.keyCode == 27 || llname == '') {
               
                $('.valllnameOK').css('display', 'none');
                $('.valllnameError').css('display', 'none');
                $('.valllnamereq').css('display', 'block');
            } else if($(this).val().length < minLength) {
                $('#valllnameError').css('display', 'block');
                $('#valllnameError').text('Please enter at least minimum of '+ minLength + ' characters')
                $('.valllnameOK').css('display', 'none');
                $('.valllnamereq').css('display', 'none');
            } else {
                $('.valllnameOK').css('display', 'block');
                $('#valllnameOK').text('very well')
                $('#valllnameError').css('display', 'none');
                $('.valllnamereq').css('display', 'none');
            }
        });

        $('#age').keyup(function(e) {
            e.preventDefault();
            var age = $(this).val();
            if(e.keyCode == 27 || age == '') {
              
                $('.valageOk').css('display', 'none');
                $('.valageError').css('display', 'none');
                $('.valagered').css('display', 'block');
            } else if(!$.isNumeric(age)) {
                $('#valageError').css('display', 'block');
                $('#valageError').text('Please enter valid age')
                $('.valageOk').css('display', 'none');
                $('.valagered').css('display', 'none');
            } else {
                $('.valageOk').css('display', 'block');
                $('#valageOk').text('very well')
                $('#valageError').css('display', 'none');
                $('.valagered').css('display', 'none');
            }
        });

        // edit modal validation for producer
        $('#fname').keyup(function(e) {
            e.preventDefault();
            var fname = $(this).val();
            var minLength = 3;
            if(e.keyCode == 27 || fname == '') {
                
                $('.valfnameo').css('display', 'none');
                $('.validatefnameErr').css('display', 'none');
                $('.valfnamer').css('display', 'block');
            } else if($(this).val().length < minLength) {
                $('#validatefnameErr').css('display', 'block');
                $('#validatefnameErr').text('Please enter at least minimum of '+ minLength + ' characters')
                $('.valfnameo').css('display', 'none');
                $('.valfnamer').css('display', 'none');
            } else {
                $('.valfnameo').css('display', 'block');
                $('#valfnameo').text('very well')
                $('#validatefnameErr').css('display', 'none');
                $('.valfnamer').css('display', 'none');
            }
        });

        $('#lname').keyup(function(e) {
            e.preventDefault();
            var lname = $(this).val();
            var minLength = 2;
            if(e.keyCode == 27 || lname == '') {
                
                $('.vallnameo').css('display', 'none');
                $('.vallnamee').css('display', 'none');
                $('.vallnamer').css('display', 'block');
            } else if($(this).val().length < minLength) {
                $('#vallnamee').css('display', 'block');
                $('#vallnamee').text('Please enter at least minimum of '+ minLength + ' characters')
                $('.vallnameo').css('display', 'none');
                $('.vallnamer').css('display', 'none');
            } else {
                $('.vallnameo').css('display', 'block');
                $('#vallnameo').text('very well')
                $('#vallnamee').css('display', 'none');
                $('.vallnamer').css('display', 'none');
            }
        });

        $('#ages').keyup(function(e) {
            e.preventDefault();
            var age = $(this).val();
            if(e.keyCode == 27 || age == '') {
              
                $('.valageo').css('display', 'none');
                $('.valagee').css('display', 'none');
                $('.valager').css('display', 'block');
            } else if(!$.isNumeric(age)) {
                $('#valagee').css('display', 'block');
                $('#valagee').text('Please enter valid age')
                $('.valageo').css('display', 'none');
                $('.valager').css('display', 'none');
            } else {
                $('.valageo').css('display', 'block');
                $('#valageo').text('very well')
                $('#valagee').css('display', 'none');
                $('.valager').css('display', 'none');
            }
        });
    });

    $.ajax({
        url: "{{ route('user.getProducers') }}",
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
                html += '<td><span style="font-size: 16px; font-family: century gothic; ">'+value.firstname+'</span></td>';
                html += '<td><span style="font-size: 16px; font-family: century gothic; ">'+value.lastname+'</span></td>';
                html += '<td><span style="font-size: 16px; font-family: century gothic; ">'+value.age+' yrs old</span></td>';
                html += '<td><button type="button" class="btn btn-primary btn-sm" style="color:white; font-family: century gothic;" id="editProducer" data-id="'+value.id+'"><i class="fa fa-pencil"></i> Edit Producer</button> <button type="button" class="btn btn-danger btn-sm" style="color:white; font-family: century gothic;" id="deleteProducer" data-id="'+value.id+'"><i class="fa fa-trash"></i> Delete</button></td>'
                html += '<tr>';
            })
            $('#producer').append(html);
        },
        error:function(e){
            console.log(e);
        }
    });

    $('#addProducer').on('click', function() {
        $('#addModal').modal('show');
    });

    // save add producer
    $('#saveProducer').on('click', function() {
        var ffname = $('#ffname').val();
        var llname = $('#llname').val();
        var age = $('#age').val();

        if(ffname == "") {
            alert("First Name cannot be empty!");
            return;
        } else if(ffname.length < 3) {
            alert("Enter at least 3 characters, please,");
            return;
        }

        if(llname == "") {
            alert("Last Name cannot be empty!");
            return;
        } else if(llname.length < 2) {
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

        $.ajax({
            url: "{{ route('user.saveProducers') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                ffname:ffname,
                llname:llname,
                age:age
            },
            method:"post",
            dataType:"json",
            success:function(e){
                if(e.status == "OK")
                {
                    $('#addModal').modal('hide');
                    alert("A new Producer was successfully introduced!");
                    var html = '';
                    html += '<tr>';
                    html += '<td>'+e.producer.id+'</td>';
                    html += '<td><span style="font-size: 16px; font-family: century gothic; ">'+e.producer.firstname+'</span></td>';
                    html += '<td><span style="font-size: 16px; font-family: century gothic; ">'+e.producer.lastname+'</span></td>';
                    html += '<td><span style="font-size: 16px; font-family: century gothic; ">'+e.producer.age+' yrs old</span></td>';
                    html += '<td><button type="button" class="btn btn-primary btn-sm" style="color:white; font-family: century gothic;" id="editProducer" data-id="'+e.producer.id+'"><i class="fa fa-pencil"></i> Edit Producer</button> <button type="button" class="btn btn-danger btn-sm" style="color:white; font-family: century gothic;" id="deleteProducer" data-id="'+e.producer.id+'"><i class="fa fa-trash"></i> Delete</button></td>'
                    html += '<tr>';
                    $('#producer').prepend(html);
                }
            },
            error:function(e){
                console.log(e);
            }
        });
    });

    $(document).on('click', '#editProducer[data-id]', function() {
        $('#editModal').modal('show');
        var id = $(this).data('id');

        $.ajax({
            url: "{{ route('user.editProducer') }}",
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
                    $('#Producerid').val(e.producer.id)
                    $('#fname').val(e.producer.firstname);
                    $('#lname').val(e.producer.lastname);
                    $('#ages').val(e.producer.age);
                }
            },
            error:function(e){
                console.log(e);
            }
        });
    });

    $('#save').on('click', function() {
        var id = $('#Producerid').val();
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var ages = $('#ages').val();

        if(fname == "") {
            alert("First Name cannot be empty!");
            location.reload();
        } else if(fname.length < 3) {
            alert("Enter at least 3 characters, please");
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

        $.ajax({
            url: "{{ route('user.updateProducers') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                id:id,
                fname:fname,
                lname:lname,
                ages:ages
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

    $(document).on('click', '#deleteProducer[data-id]', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var el = this;

        $.ajax({
            url: "{{ route('user.deleteProducer') }}",
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
                    alert("Successfully deleted producer id "+e.producerid+"!");
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
            url: "{{ route('producer.search') }}",
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
                    var count = 5;
                    html += '<tr>';
                    html += '<td colspan="'+count+'" style="text-align:center;">No record found!</td>';
                    html += '<tr>';
                } else {
                    $.each(data, function(key, value) {
                        html += '<tr>';
                        html += '<td>'+value.id+'</td>';
                        html += '<td><span style="font-size: 16px; font-family: century gothic; ">'+value.firstname+'</span></td>';
                        html += '<td><span style="font-size: 16px; font-family: century gothic; ">'+value.lastname+'</span></td>';
                        html += '<td><span style="font-size: 16px; font-family: century gothic; ">'+value.age+' yrs old</span></td>';
                        html += '<td><button type="button" class="btn btn-primary btn-sm" style="color:white; font-family: century gothic;" id="editProducer" data-id="'+value.id+'"><i class="fa fa-pencil"></i> Edit Producer</button> <button type="button" class="btn btn-danger btn-sm" style="color:white; font-family: century gothic;" id="deleteProducer" data-id="'+value.id+'"><i class="fa fa-trash"></i> Delete</button></td>'
                        html += '<tr>';
                    });
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
