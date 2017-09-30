@extends('layouts.app')

@section('content')
    <div class="container" id="question">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="room-content">
                            <div class="text-center">
                                <h1><b>Make Question</b></h1>
                                <h4>Make questions for your game</h4>
                            </div>

                            <form class="" method="POST" >
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }} question-padding ">
                                    <label for="question" class="col-md-3 control-label text-center">Categories</label>
                                    <div class="col-md-8 no-padding-left">
                                        <button class="btn btn-default dropdown-toggle form-control " type="button" data-toggle="dropdown">Categories
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li> <input id="category" type="category" placeholder="Create new Category" class="form-control" name="question" value="{{ old('category') }}" ></li>
                                            <li><a href="#">CSS</a></li>
                                            <li><a href="#">JavaScript</a></li>
                                        </ul>
                                    </div>
                                </div>



                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} question-padding">
                                    <div class="col-md-3 text-center">
                                         <label for="question" class="control-label">Question</label>
                                    </div>
                                    <div class="col-md-7 no-margin-padding">
                                        <input id="question" type="text" class="form-control" name="question[]" required>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="add_field_button btn-danger btn ">Add </button>
                                    </div>
                                    <div class="input_fields_wrap">
                                        </div>
                                </div>

                                <div class="col-md-12 question-padding ">
                                    <div class="form-group question-padding pull-right">
                                        <button class="btn-info btn">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var max_fields      = 10;
            var wrapper         = $(".input_fields_wrap");
            var add_button      = $(".add_field_button");

            var x = 1;
            $(add_button).click(function(e){
                e.preventDefault();
                if(x < max_fields){
                    x++;
                    $(wrapper).append(
                        '<div class="col-md-offset-3 col-md-8 appending-top-padding row">' +'<div class="col-md-11 no-margin-padding">'+
                        '<input type="text" class="form-control"  name="question[]"/>' +'</div>' +
                        '<a href="#" class="remove_field col-md-1">remove</a></div>'); //add input box
                }
            });

            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        });
    </script>
@endsection
