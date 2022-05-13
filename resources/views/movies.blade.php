@extends('layouts.app')

<style>
/* body {
    background-color: #000000
} */

.padding {
    padding: 3rem !important;
}

.user-card-full {
    overflow: hidden;
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    border: none;
    margin-bottom: 30px;
}

.m-r-0 {
    margin-right: 0px
}

.m-l-0 {
    margin-left: 0px
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px
}

.bg-c-lite-green {
    background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
    background: linear-gradient(to right, #ee5a6f, #f29263)
}

.user-profile {
    padding: 20px 0
}

.card-block {
    padding: 1.25rem
}

.m-b-25 {
    margin-bottom: 25px
}

.img-radius {
    border-radius: 5px
}

h6 {
    font-size: 14px
}

.card .card-block p {
    line-height: 25px
}

@media only screen and (min-width: 1400px) {
    p {
        font-size: 14px
    }
}

.card-block {
    padding: 1.25rem
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.m-b-20 {
    margin-bottom: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.card .card-block p {
    line-height: 25px
}

.m-b-10 {
    margin-bottom: 10px
}

.text-muted {
    color: #919aa3 !important
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.f-w-600 {
    font-weight: 600
}

.m-b-20 {
    margin-bottom: 20px
}

.m-t-40 {
    margin-top: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.m-b-10 {
    margin-bottom: 10px
}

.m-t-40 {
    margin-top: 20px
}

.user-card-full .social-link li {
    display: inline-block
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out
}
</style>
@section('content')
<div class="container">
              <!--   <div class="pull-right">
                   
                   
                </div> -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="background:#6b1212; color:white;">
                <i class="fa fa-film"></i> List of Movies 
                <div class="pull-right" >
                <button type="button" class="btn" style="background:white; color:black; font-family: century gothic;" id="addMovie"><i class="fa fa-plus"></i> Create Movie</button>
                </div>

                <div class="pull-right" style="padding-right:15px;">
                     <input type="text" name="search" id="searchText" class="form-control" placeholder="Search...">
                </div>

                <!-- Add Modal For movie-->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content" style="color:black;">
                            <form method="post" id="save-movie-form" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Create Movie</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="exampleInputPassword1" class="col-md-12 col-form-label"><b>Movie Title:</b></label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="ftitle" name="ftitle">
                                            <span style="color:blue; font-style: italic;" id="valtitlereq" class="valtitlereq">Title is required</span>
                                            <span style="color:red; font-style: italic;" id="valtitleerror" class="valtitleerror"></span>
                                            <span class="valtitleok" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="valtitleok" class=""></span></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" id="" class="row col-md-12 col-form-label"><b>Select Actors:</b>
                                            <!-- <span style="color:blue; font-style: italic;" id="validateactorsReq" class="validateactorsReq">This field is required</span>
                                            <span style="color:red; font-style: italic;" id="validateactorsErr" class="validateactorsErr"></span>
                                            <span class="validateactorsOk" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="validateactorsOk" class=""></span></i></span>
                                         -->
                                        </label>
                                        <div id="actors">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputPassword1" class="col-md-12 col-form-label"><b>Producers:</b></label>
                                        <div class="col-md-12">
                                            <select class="form-control" id="prod" name="prod">

                                            </select>
                                            <span style="color:blue; font-style: italic;" id="valprodreq" class="valprodreq">Producer is required</span>
                                            <span style="color:red; font-style: italic;" id="valproderror" class="valproderror"></span>
                                            <span class="valprodok" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="valprodok" class=""></span></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputPassword1" class="col-md-12 col-form-label"><b>Genre:</b></label>
                                        <div class="col-md-12">
                                            <select class="form-control" id="gen" name="gen">

                                            </select>
                                            <span style="color:blue; font-style: italic;" id="valgenrereq" class="valgenrereq">Genre is required</span>
                                            <span style="color:red; font-style: italic;" id="valgenreerror" class="valgenreerror"></span>
                                            <span class="valgenreok" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="valgenreok" class=""></span></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputPassword1" class="col-md-12 col-form-label"><b>Date Release:</b></label>
                                        <div class="col-md-12">
                                            <input type="date" class="form-control" id="dRelease" name="dRelease">
                                            <span style="color:blue; font-style: italic;" id="valdreleasereq" class="valdreleasereq">Date Release is required</span>
                                            <span style="color:red; font-style: italic;" id="valdreleaseerr" class="valdreleaseerr"></span>
                                            <span class="valdreleaseok" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="valdreleaseok" class=""></span></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputPassword1" class="col-md-12 col-form-label"><b>Country Release:</b></label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="cRelease" name="cRelease">
                                            <span style="color:blue; font-style: italic;" id="valcreleasereq" class="valcreleasereq">Country Release is required</span>
                                            <span style="color:red; font-style: italic;" id="valcreleaseerr" class="valcreleaseerr"></span>
                                            <span class="valcreleaseok" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="valcreleaseok" class=""></span></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputPassword1" class="col-md-12 col-form-label"><b>Image:</b></label>
                                        <div class="col-md-12">
                                            <input type="file" class="form-control" id="avatar" name="avatar">
                                            <span style="color:blue; font-style: italic;" id="valimgreq" class="valimgreq">This field is required</span>
                                            <span style="color:red; font-style: italic;" id="valimgerror" class="valimgerror"></span>
                                            <span class="valimgok" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="valimgok" class=""></span></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputPassword1" class="col-md-12 col-form-label"><b>Content:</b></label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" rows="7" id="cont" name="cont"></textarea>
                                            <span style="color:blue; font-style: italic;" id="valcontreq" class="valcontreq">Content is required</span>
                                            <span style="color:red; font-style: italic;" id="valconterror" class="valconterror"></span>
                                            <span class="valcontok" style="color:green; font-style: italic; display: none;"><i class="fa fa-check-circle"> <span style="" id="valcontok" class=""></span></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm" id="saveMovie">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                 <!-- Edit Modal FOR MOVIE -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content" style="color:black;>
                            <form method="post" id="edit-movie-form" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Edit Movie</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body" id="updateform">
                                    <div class="form-group row">
                                        <label for="exampleInputPassword1" class="col-md-12 col-form-label"><b>Movie Title:</b></label>
                                        <div class="col-md-12">
                                            <input type="hidden" class="form-control" id="movieid" name="movieid">
                                            <input type="text" class="form-control" id="movietitle" name="movietitle">
                                            <span style="color:red; font-style: italic;" id="valmovtitleerror" class="valmovtitleerror"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" id="" class="row col-md-12 col-form-label"><b>Select Actors:&nbsp;&nbsp;</b>
                                            <span style="color:red; font-style: italic;" id="valmovactorerror" class="valmovactorerror"></span>
                                            </label>
                                        <div id="movieactors">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputPassword1" class="col-md-12 col-form-label"><b>Producers:</b></label>
                                        <div class="col-md-12">
                                            <select class="form-control" id="mprod" name="mprod">

                                            </select>
                                            <span style="color:red; font-style: italic;" id="valmovproderror" class="valmovproderror"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputPassword1" class="col-md-12 col-form-label"><b>Genre:</b></label>
                                        <div class="col-md-12">
                                            <select class="form-control" id="mgen" name="mgen">

                                            </select>
                                            <span style="color:red; font-style: italic;" id="valmovgenerror" class="valmovgenerror"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputPassword1" class="col-md-12 col-form-label"><b>Date Release:</b></label>
                                        <div class="col-md-12">
                                            <input type="date" class="form-control" id="mdRelease" name="mdRelease">
                                            <span style="color:red; font-style: italic;" id="valmovdreleaseerr" class="valmovdreleaseerr"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputPassword1" class="col-md-12 col-form-label"><b>Country Release:</b></label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="mcRelease" name="mcRelease">
                                            <span style="color:red; font-style: italic;" id="valmovcreleaseerr" class="valmovcreleaseeerr"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputPassword1" class="col-md-12 col-form-label"><b>Image:</b></label>
                                        <div class="col-md-12">
                                            <input type="file" class="form-control" id="movieavatar" name="movieavatar">
                                            <input type="hidden" class="form-control" id="oldmovieavatar" name="oldmovieavatar">
                                            <span style="color:red; font-style: italic;" id="valmovavatarerr" class="valmovavatarerr"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputPassword1" class="col-md-12 col-form-label"><b>Content:</b></label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" rows="7" id="mcont" name="mcont"></textarea>
                                            <span style="color:red; font-style: italic;" id="valmovconterr" class="valmovconterr"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm" id="updateMovie">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row" id="movies">
                    <!-- call data via ajax -->
                </div>
            </div>
            <!-- view Modal FOR MOVIE DETAILS-->
            <div class="modal fade" id="viewmodal" tabindex="-1" style="color:black;" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" style="width: 100%;" role="document">
                    <div class="modal-content">
                        <div class="modal-body" style="padding: 0; margin: 0; left: -15px;">
                            <div class="" id="page-content">
                                <div class="">
                                    <div class="row container d-flex justify-content-center">
                                        <div class="col-xl-12 col-md-12" style="height: 450px;">
                                            <div class="card user-card-full" style="width: 795px;">
                                                <div class="row m-l-0 m-r-0" id="viewbody">
                                                    <div class="col-sm-4 bg-c-lite-green user-profile" style="height: 450px; overflow-y: scroll;">
                                                        <div class="card-block text-center text-black">
                                                            <div class="m-b-25" id="img"> <img src="#" id="img0" class="img-radius" alt="User-Profile-Image" style="height: 200px;"> </div>
                                                            <!-- <h6 class="f-w-600" id="title"></h6> -->
                                                            <p style="text-align: left;">Title: <span id="titles" style="font-weight: bold;"></span></p>
                                                            <p style="text-align: left;">Producer: <span id="producer" style="font-weight: bold;"></span></p>
                                                            <p style="text-align: left;">Actors:<span id="actor"></span></p>
                                                            <p style="text-align: left;">Genre: <span id="genre" style="font-weight: bold;"></span></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8" style="border-color: 1px solid grey; padding: 0; margin: 0;">
                                                        <div class="card-block">
                                                            <h6 class="m-b-20 p-b-5 b-b-default f-w-600">
                                                                Information:
                                                                <div class="pull-right" style="margin-top: -10px;">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                </div>
                                                            </h6>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <p class="m-b-10 f-w-600">Date Release</p>
                                                                    <h6 class="text-muted f-w-400" id="dateReleases"></h6>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <p class="m-b-10 f-w-600">Country Release</p>
                                                                    <h6 class="text-muted f-w-400" id="countryReleases"></h6>
                                                                </div>
                                                            </div>
                                                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Summary:</h6>
                                                            <div class="row">
                                                                <div class="col-sm-12" style="overflow-y: scroll; height: 240px;">
                                                                    <p class="f-w-400" id="summary" style="text-indent: 50px; color: black;"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

        var actor = [];
        // add modal validation
        $('#ftitle').keyup(function(e) {
            e.preventDefault();
            var title = $(this).val();
            var minLength = 3;
            if(e.keyCode == 27 || title == '') {
             
                $('.valtitleok').css('display', 'none');
                $('.valtitleerror').css('display', 'none');
                $('.valtitlereq').css('display', 'block');
            } else if($(this).val().length < minLength) {
                $('#valtitleerror').css('display', 'block');
                $('#valtitleerror').text('Please enter at least minimum of '+ minLength + ' characters')
                $('.valtitleok').css('display', 'none');
                $('.valtitlereq').css('display', 'none');
            } else {
                $('.valtitleok').css('display', 'block');
                $('#valtitleok').text('very well')
                $('#valtitleerror').css('display', 'none');
                $('.valtitlereq').css('display', 'none');
            }
        });

        $('#prod').on('change', function(e) {
            e.preventDefault();
            var producers = $(this).val();
            if(producers == '') {
                $('.valprodok').css('display', 'none');
                $('.valproderror').css('display', 'none');
                $('.valprodreq').css('display', 'block');
            } else {
                $('.valprodok').css('display', 'block');
                $('#valprodok').text('very well')
                $('#valproderror').css('display', 'none');
                $('.valprodreq').css('display', 'none');
            }
        });

        $('#gen').on('change', function(e) {
            e.preventDefault();
            var genres = $(this).val();
            if(genres == '') {
                $('.valgenreok').css('display', 'none');
                $('.valgenreerror').css('display', 'none');
                $('.valgenrereq').css('display', 'block');
            } else {
                $('.valgenreok').css('display', 'block');
                $('#valgenreok').text('very well')
                $('#valgenreerror').css('display', 'none');
                $('.valgenrereq').css('display', 'none');
            }
        });

        $('#dRelease').keyup(function(e) {
            e.preventDefault();
            var date = document.getElementById("dRelease").value.split("/");
            var day = date[0];
            var month = date[1];
            var dateString = document.getElementById("dRelease").value;
            var regex = /^(0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])[\/\-]\d{4}$/;

            if (regex.test(dateString) || dateString.length == 0) {
                $('#valdreleaseerr').css('display', 'block');
                $('#valdreleaseerr').text('Invalid Date')
                $('.valdreleaseok').css('display', 'none');
                $('.valdreleasereq').css('display', 'none');
            } else {
                $('.valdreleaseok').css('display', 'block');
                $('#valdreleaseok').text('very well')
                $('#valdreleaseerr').css('display', 'none');
                $('.valdreleasereq').css('display', 'none');
            }
            if (day > 31) {
                $('#valdreleaseerr').css('display', 'block');
                $('#valdreleaseerr').text('Invalid Date')
                $('.valdreleaseok').css('display', 'none');
                $('.valdreleasereq').css('display', 'none');
            } 
            if (month > 12) {
                $('#valdreleaseerr').css('display', 'block');
                $('#valdreleaseerr').text('Invalid Date')
                $('.valdreleaseok').css('display', 'none');
                $('.valdreleasereq').css('display', 'none');
            } 
        });

        $('#cRelease').keyup(function(e) {
            e.preventDefault();
            var countryRelease = $(this).val();
            var minLength = 2;
            if(e.keyCode == 27 || countryRelease == '') {
                //if esc is pressed we want to clear the value of search box
                $('.valcreleaseok').css('display', 'none');
                $('.valcreleaseerr').css('display', 'none');
                $('.valcreleasereq').css('display', 'block');
            } else if($(this).val().length < minLength) {
                $('#valcreleaseerr').css('display', 'block');
                $('#valcreleaseerr').text('Please enter at least minimum of '+ minLength + ' characters')
                $('.valcreleaseok').css('display', 'none');
                $('.valcreleasereq').css('display', 'none');
            } else {
                $('.valcreleaseok').css('display', 'block');
                $('#valcreleaseok').text('very well')
                $('#valcreleaseerr').css('display', 'none');
                $('.valcreleasereq').css('display', 'none');
            }
        });

        $('#avatar').on('change', function(e) {
            e.preventDefault();
            var maxSize = 300000;
            var avatar;
            var file = $(this).val();
            if(file != '') {
                avatar = $('#avatar')[0].files[0].size;
            }

            if(file == '') {
                $('.valimgok').css('display', 'none');
                $('.valimgerror').css('display', 'none');
                $('.valimgreq').css('display', 'block');
            } else if (avatar > maxSize) {
                $('#valimgerror').css('display', 'block');
                $('#valimgerror').text('File size is greater than 300kb')
                $('.valimgok').css('display', 'none');
                $('.valimgreq').css('display', 'none');
            } else {
                $('.valimgok').css('display', 'block');
                $('#valimgok').text('very well')
                $('#valimgerror').css('display', 'none');
                $('.valimgreq').css('display', 'none');
            }
        });

        $('#cont').keyup(function(e) {
            e.preventDefault();
            var content = $(this).val();
            if(e.keyCode == 27 || content == '') {
            
                $('.valcontok').css('display', 'none');
                $('.valconterror').css('display', 'none');
                $('.valcontreq').css('display', 'block');
            } else {
                $('.valcontok').css('display', 'block');
                $('#valcontok').text('very well')
                $('#valconterror').css('display', 'none');
                $('.valcontreq').css('display', 'none');
            }
        });


        // edit modal validation
        $('#movietitle').keyup(function(e) {
            e.preventDefault();
            var movietitle = $(this).val();
            var minLength = 3;
            if(e.keyCode == 27 || movietitle == '') {
            
                $('.valmovtitleerror').css('display','block');
                $('#valmovtitleerror').text('This field is required')
            } else if($(this).val().length < minLength) {
                $('#valmovtitleerror').css('display', 'block');
                $('#valmovtitleerror').text('Please enter at least minimum of '+ minLength + ' characters')
            } else {
                $('#valmovtitleerror').css('display', 'none');
            }
        });

        $('#mprod').on('change', function(e) {
            e.preventDefault();
            var movieproducers = $(this).val();
            if(movieproducers == '') {
                $('.valmovproderror').css('display','block');
                $('#valmovproderror').text('This field is required')
            } else {
                $('#valmovproderror').css('display', 'none');
            }
        });

        $('#mgen').on('change', function(e) {
            e.preventDefault();
            var moviegenres = $(this).val();
            if(moviegenres == '') {
                $('.valmovgenerror').css('display','block');
                $('#valmovgenerror').text('This field is required')
            } else {
                $('#valmovgenerror').css('display', 'none');
            }
        });

        $('#mdRelease').keyup(function(e) {
            e.preventDefault();
            var date = document.getElementById("moviedateRelease").value.split("/");
            var day = date[0];
            var month = date[1];
            var dateString = document.getElementById("moviedateRelease").value;
            var regex = /^(0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])[\/\-]\d{4}$/;

            if (regex.test(dateString) || dateString.length == 0) {
                $('#valmovdreleaseerr').css('display', 'block');
                $('#valmovdreleaseerr').text('Invalid Date')
            } else {
                $('#valmovdreleaseerr').css('display', 'none');
            }
            if (day > 31) {
                $('#valmovdreleaseerr').css('display', 'block');
                $('#valmovdreleaseerr').text('Invalid Date')
            } 
            if (month > 12) {
                $('#valmovdreleaseerr').css('display', 'block');
                $('#valmovdreleaseerr').text('Invalid Date')
            } 
        });

        $('#mcRelease').keyup(function(e) {
            e.preventDefault();
            var moviecountryRelease = $(this).val();
            var minLength = 2;
            if(e.keyCode == 27 || moviecountryRelease == '') {
         
                $('.valmovcreleaseeerr').css('display','block');
                $('.valmovcreleaseeerr').text('This field is required')
            } else if($(this).val().length < minLength) {
                $('#valmovcreleaseeerr').css('display', 'block');
                $('#valmovcreleaseeerr').text('Please enter at least minimum of '+ minLength + ' characters')
            } else {
                $('#valmovcreleaseeerr').css('display', 'none');
            }
        });

        $('#movieavatar').on('change', function(e) {
            e.preventDefault();
            var maxSize = 300000;
            var movieavatar;
            var file = $(this).val();
            if(file != '') {
                movieavatar = $('#movieavatar')[0].files[0].size;
            }

            if(file == '') {
                $('.valmovavatarerr').css('display', 'block');
                 $('#valmovavatarerr').text('This field is required')
            } else if (movieavatar > maxSize) {
                $('#valmovavatarerr').css('display', 'block');
                $('#valmovavatarerr').text('File size is greater than 300kb')
            } else {
                $('#valmovavatarerr').css('display', 'none');
            }
        });

        $('#mcont').keyup(function(e) {
            e.preventDefault();
            var moviecontent = $(this).val();
            if(e.keyCode == 27 || moviecontent == '') {
                $('.valmovconterr').css('display', 'block');
                $('#valmovconterr').text('This field is required')
            } else {
                $('#valmovconterr').css('display', 'none');
            }
        });

        $.ajax({
            url: "{{ route('user.getMovies') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            method:"post",
            dataType:"json",
            success:function(e){
                var html = '';
                $.each(e, function(key, value) {
                    html += '<div class="col-sm-6 col-md-4">';
                    html += '<div class="thumbnail">';
                    html += '<img src="/img/movies/'+value.img+'" alt="..." class="img-responsive" style="text-align: center;" width="310" height="1200"><br><br>';
                    html += '<div class="caption">';
                    html += '<h3>'+ value.title +'<span style="font-size: 16px; margin-top: 10px;">'+ moment(value.date_release).format("YYYY") +'</span></h3>';
                    html += '<p>' + value.content.substr(0,300) +'...</p>';
                    html += '<div class="clearfix">';
                    html += '<button type="button" class="btn btn-warning btn-sm" id="view" data-id="'+ value.id +'" style="color:white;"><i class="fas fa-info-circle"></i> Read More</button> <button type="button" class="btn btn-primary btn-sm" id="editMovie" data-id="'+ value.id +'"><i class="fa fa-pencil"></i>  Edit Details</button> <button type="button" class="btn btn-danger btn-sm" id="deleteMovie" data-id="'+ value.id +'"><i class="fas fa-trash"></i> Delete</button><br><br><br><br>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                })
                $('#movies').append(html);
            },
            error:function(e){
                console.log(e);
            }
        });
    });

    $(document).on('click', '#view[data-id]', function() {
        $('#viewmodal').modal('show');
        var id = $(this).data('id');

        $.ajax({
            url: "{{ route('user.viewMovie') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                id:id
            },
            method:"post",
            dataType:"json",
            success:function(e){
                console.log(e.title)
                var html = [];
                $('#actor').text("");
                $('#titles').text(e.title);
                $('#producer').text(e.producer.firstname+" "+e.producer.lastname)
                $('#genre').text(e.genre.name)
                $('#summary').text(e.content)
                $('#img0').attr('src','/img/movies/'+e.img);
                $('#dateReleases').text(moment(e.date_release).format("MMMM DD, YYYY"));
                $('#countryReleases').text(e.country_release);
                $.each(e.actor, function(key, value) {
                    html.push(' <span style="font-weight: bold;">'+ value.firstname +' '+ value.lastname +'</span>');
                });
                $('#actor').append(html.join(','));
            },
            error:function(e){
                console.log(e);
            }
        });
    });

    // add functiions
    $('#addMovie').on('click', function() {
        $('#addModal').modal('show');

        $.ajax({
            url: "{{ route('user.addMovie') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            method:"get",
            dataType:"json",
            success:function(e){
                var actor = '';
                var genre = '';
                var producer = '';
                // actors
                $.each(e[0], function(key, val) {
                    actor += '<div class="col-md-12 form-check">'
                    actor += '<input type="checkbox" class="form-check-input" id="exampleCheck1" id="actorid" value="'+ val.id +'" name="actorid[]">'
                    actor += '<label class="form-check-label" for="exampleCheck1">'+ val.firstname+' '+ val.lastname +'</label>'
                    actor += '</div>'
                });
                $('#actors').append(actor);

                //genre
                genre += '<option>Select Genre...</option>';
                $.each(e[1], function(key, val) {
                    genre += '<option value="'+val.id+'">'+val.name+'</option>';
                });
                $('#gen').append(genre);

                // producers
                producer += '<option>Select Producer...</option>';
                $.each(e[2], function(key, val) {
                    producer += '<option value="'+val.id+'">'+val.firstname+' '+val.lastname+'</option>';
                });
                $('#prod').append(producer);

                 $(':checkbox').change(function(e) {
                    var actor = $(':checkbox:checked').length
                    var minActorLength = 2;
                    if(actor == 0) {
                        $('.validateactorsOk').css('display', 'none');
                        $('.validateactorsErr').css('display', 'none');
                        $('.validateactorsReq').css('display', 'block');
                    } else if(actor < minActorLength) {
                        $('#validateactorsErr').css('display', 'block');
                        $('#validateactorsErr').text('Please select at least '+ minActorLength + ' actors')
                        $('.validateactorsOk').css('display', 'none');
                        $('.validateactorsReq').css('display', 'none');
                    } else {
                        $('.validateactorsOk').css('display', 'block');
                        $('#validateactorsOk').text('Ok')
                        $('#validateactorsErr').css('display', 'none');
                        $('.validateactorsReq').css('display', 'none');
                    }
                });
            },
            error:function(e){
                console.log(e);
            }
        });
    });

    //save movie function
    $('#save-movie-form').on('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);

          if($('#ftitle').val() == "") {
            alert("Title is required");
            return;
        } else if($('#ftitle').val().length < 3) {
            alert("Please enter at least minimum of 3 characters");
            return;
        }

        if($(':checkbox:checked').length == 0) {
            alert("This field is required");
            return;
        } else if($(':checkbox:checked').length < 2) {
            alert('Please select at least 2 actors');
            return;
        }

        if($('#prod').val() == "") {
            alert("This field is required");
            return;
        }

        if($('#gen').val() == "") {
            alert("This field is required");
            return;
        }

        if($('#dRelease').val() == "") {
            alert("Date Release is required");
            return;
        }

        if($('#cRelease').val() == "") {
            alert("Country is required");
            return;
        } else if($('#cRelease').val().length < 2) {
            alert("Please enter at least minimum of 2 characters");
            return;
        }

        if($('#avatar').val() == '') {
            alert("This field is required");
            return;
        } else if($('#avatar')[0].files[0].size > 300000) {
            alert("File size is greater than 300kb");
            return;
        }

        if($('#cont').val() == "") {
            alert("Content is required");
            return;
        }


        $.ajax({
            url: "{{ route('user.saveMovie') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: formData,
            processData: false,
            contentType: false,
            method:"post",
            dataType:"json",
            success:function(e){
                if(e.status == "OK")
                {
                    $('#addModal').modal('hide');
                    alert("A new Movie was successfully introduced!")
                    location.reload(); 
                }
                else
                {
                    alert(e.status);
                    location.reload();
                }
               
            },
            error:function(e){
                console.log(e);
            }
        });
    });

    // edit function FOR MOVIE DETAILS
    $(document).on('click', '#editMovie[data-id]', function() {
        var id = $(this).data('id');
        $('#editModal').modal('show');
        $('.form-check-input').val('');

        $.ajax({
            url: "{{ route('user.editMovie') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                id: id
            },
            method:"post",
            dataType:"json",
            success:function(e){
                var actors = '';
                let final = e[3].actor.map(actorid => actorid.id);

                $('#movietitle').val(e[3].title)
                $('#movieid').val(e[3].id)
                $.each(e[0], function(key, val) {
                    if(final.indexOf(val.id) !== -1) {
                        actors += '<div class="col-md-12 form-check">';
                        actors += '<input type="checkbox" class="form-check-input" id="exampleCheck1" id="movieactorid" value="'+ val.id +'" name="movieactorid[]" checked>';
                        actors += '<label class="form-check-label" for="exampleCheck1">'+ val.firstname+' '+ val.lastname +'</label>';
                        actors += '</div>';
                    } else {
                        actors += '<div class="col-md-12 form-check">';
                        actors += '<input type="checkbox" class="form-check-input" id="exampleCheck1" id="movieactorid" value="'+ val.id +'" name="movieactorid[]">';
                        actors += '<label class="form-check-label" for="exampleCheck1">'+ val.firstname+' '+ val.lastname +'</label>';
                        actors += '</div>';
                    }
                });
                $('#movieactors').append(actors);

                //genre
                genre += '<option>Select Genre...</option>';
                $.each(e[1], function(key, val) {
                    genre += '<option value="'+val.id+'">'+val.name+'</option>';
                });
                $('#mgen').append(genre);
                $('#mgen').val(e[3].genre_id);

                // producers
                producer += '<option>Select Producer...</option>';
                $.each(e[2], function(key, val) {
                    producer += '<option value="'+val.id+'">'+val.firstname+' '+val.lastname+'</option>';
                });
                $('#mprod').append(producer);
                $('#mprod').val(e[3].producer_id);

                $('#mdRelease').val(e[3].date_release)
                $('#mcRelease').val(e[3].country_release)
                $('#mcont').val(e[3].content)
                $('#oldmovieavatar').val(e[3].img)

                   $(':checkbox').change(function(e) {
                    var actor = $(':checkbox:checked').length
                    var minActorLength = 2;
                    if(actor == 0) {
                        $('.valmovactorerror').css('display', 'block');
                        $('#valmovactorerror').text('Actor is required')
                    } else if(actor < minActorLength) {
                        $('#valmovactorerror').css('display', 'block');
                        $('#valmovactorerror').text('Please select at least '+ minActorLength + ' actors')
                    } else {
                        $('#valmovactorerror').css('display', 'none');
                    }
                });
            },
            error:function(e){
                console.log(e);
            }
        });
    });

    // update function
    $('#edit-movie-form').on('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);

          if($('#movietitle').val() == "") {
            alert("Title is required");
            return;
        } else if($('#movietitle').val().length < 3) {
            alert("Please enter at least minimum of 3 characters");
            return;
        }

        if($(':checkbox:checked').length == 0) {
            alert("This field is required");
            return;
        } else if($(':checkbox:checked').length < 2) {
            alert('Please select at least 2 actors');
            return;
        }

        if($('#mprod').val() == "") {
            alert("Producer is required");
            return;
        }

        if($('#mgen').val() == "") {
            alert("Genre is required");
            return;
        }

        if($('#mdRelease').val() == "") {
            alert("Date Release is required");
            return;
        }

        if($('#mcRelease').val() == "") {
            alert("Country Release is required");
            return;
        } else if($('#mcRelease').val().length < 2) {
            alert("Please enter at least minimum of 2 characters");
            return;
        }

        if($('#mcont').val() == "") {
            alert("Content is required");
            return;
        }

        $.ajax({
            url: "{{ route('user.updateMovie') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: formData,
            processData: false,
            contentType: false,
            method:"post",
            dataType:"json",
            success:function(e){
                if(e.status == "OK")
                {
                    $('#editModal').modal('hide');
                    alert("Updated Movie Details successfully!")
                    location.reload(); 
                }
            },
            error:function(e){
                console.log(e);
            }
        });
    });

    // delete function
    $(document).on('click', '#deleteMovie[data-id]', function(e) {
        e.preventDefault();
        var id = $(this).data('id');

        $.ajax({
            url: "{{ route('user.deleteMovie') }}",
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
                    alert("Successfully deleted movie "+e.movietitle+"!");
                    location.reload();
                }
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
        
        //if esc is pressed or nothing is entered
        if(e.keyCode === 27) {
            $(this).val('');
        }

        $.ajax({
            url: "{{ route('movies.search') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                search: txt,
            },
            method:"post",
            dataType:"json",
            success:function(data){
                $("#movies").empty();
                var html = '';
                if(data == '') {
                    var count = 6;
                    html += '<div class="col-md-12">';
                    html += '<center><p>No record found!</p></center>';
                    html += '</div>';
                } else {
                    $.each(data, function(key, value) {
                        html += '<div class="col-sm-6 col-md-4">';
                        html += '<div class="thumbnail">';
                        html += '<img src="/img/movies/'+value.img+'" alt="..." class="img-responsive" style="text-align: center;"><br><br>';
                        html += '<div class="caption">';
                        html += '<h3>'+ value.title +'<span style="font-size: 16px; margin-top: 10px;">'+ moment(value.date_release).format("YYYY") +'</span></h3>';
                        html += '<p>' + value.content.substr(0,300) +'...</p>';
                        html += '<div class="clearfix">';
                        html += '<button type="button" class="btn btn-warning btn-sm" id="view" data-id="'+ value.id +'" style="color:white;"><i class="fas fa-info-circle"></i> More Info</button> <button type="button" class="btn btn-primary btn-sm" id="editMovie" data-id="'+ value.id +'"><i class="fa fa-pencil"></i> Edit</button> <button type="button" class="btn btn-danger btn-sm" id="deleteMovie" data-id="'+ value.id +'"><i class="fas fa-trash"></i> Remove</button><br><br><br><br>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    })
                }
                $('#movies').append(html);
            },
            error:function(data){
                console.log(data);
            }
        });
    });
</script>
@endsection
