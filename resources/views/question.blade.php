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

                            <form class="" action="{{ url('question') }}" method="POST" >
                                {{ csrf_field() }}

                                <div class="form-group question-padding col-md-12">
                                    <label for="question" class="col-md-3 control-label text-center">Categories</label>
                                    <div class="col-md-4 no-padding-left " id ="taginput">
                                        <div >Add Tags:<p id ="tags"></p></div><br/>
                                        <input type="text" name="tags" id = "taginput"data-role="tagsinput" name="tags[]" placeholder="Tags" class="tm-input form-control tm-input-info tags"/>

                                    </div>

                                    <div class="col-md-2">
                                        <button class="add_tags_button btn-danger btn ">Add </button>
                                    </div>



                                </div>

                                <div class="form-group question-padding">
                                    <div class="col-md-3 text-center">
                                         <label for="question" class="control-label">Question</label>
                                    </div>
                                    <div class="col-md-7 no-margin-padding">
                                        <input id="question" type="text" name="questions[]" placeholder="question" class="form-control" required>

                                    </div>
                                    <div class="col-md-2">
                                        <button class="add_field_button btn-danger btn ">Add </button>
                                    </div>
                                    <div class="input_fields_wrap"></div>
                                </div>

                                <div class="col-md-12 question-padding text-center">
                                    <div class="form-group question-padding ">
                                        <button class="btn-info btn col-md-4 ">Submit</button>
                                    </div>
                                </div>
                            </form>

                            <div class="col-md-12">
                                <h1>Question Lists</h1>
                                @if(isset($questions))
                                    @foreach($questions as $question)
                                        <p>{{ $question->question }}</p>
                                        <div>
                                            <strong>Tag:</strong>
                                            @if(isset($question->tags))
                                                @foreach($question->tags as $tag)
                                                    <label class="label label-info">{{ $tag->tag }}</label>
                                                @endforeach
                                            @endif

                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        $(".tm-input").tagsManager();

        $(document).ready(function() {
            var max_fields      = 10;
            var wrapper         = $(".input_fields_wrap");
            var add_button      = $(".add_field_button");
            var add_tags_button = $(".add_tags_button");
            var tag = $("#tags");
            var tagsarr = new Array();



            var x = 1;
            $(add_button).click(function(e){
                e.preventDefault();
                if(x < max_fields){
                    x++;
                    $(wrapper).append(
                        '<div class="col-md-offset-3 col-md-8 appending-top-padding row">' +'<div class="col-md-11 no-margin-padding">'+
                        '<input type="text" class="form-control"  name="questions[]"/>' +'</div>' +
                        '<a href="#" class="remove_field col-md-1">remove</a></div>'); //add input box
                }
            });

            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })



            $(add_tags_button).click(function(e) {
                e.preventDefault();
                tags = document.getElementById('taginput');
                tagsarr.push(tag.val());
                console.log(tagsarr);

                $("#tags").val(function() {
                    return tagsarr;
                });
            });


        });
    </script>
@endsection
