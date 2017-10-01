@extends('layouts.app')

@section('content')
    <div class="text-center">
        <div>
            <h1>Answer Selection Page</h1>
            <h4>Choose the answer you think is right on your device!</h4>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <!-- Answers go here -->
                <div class="panel panel-default">
                    <div class="panel-body" style={{ 'text-align:center;' }}>
                        <!-- 2 questions per row -->
                        <div class="container" style={{ 'display:inline-block;' }}>
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <a href="#" id="option1">
                                        <div class="panel panel-default">
                                            <div class="panel-body optionAnswer1">
                                                <!-- TODO populate answer -->
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 text-center">
                                    <a href="#" id="option2">
                                        <div class="panel panel-default">
                                            <div class="panel-body optionAnswer2">
                                                <!-- TODO populate answer -->
                                                Option 2
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <a href="#" id="option3">
                                        <div class="panel panel-default">
                                            <div class="panel-body optionAnswer3">
                                                <!-- TODO populate answer -->
                                                Option 3
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 text-center">
                                    <a href="#" id="option4">
                                        <div class="panel panel-default">
                                            <div class="panel-body optionAnswer4">
                                                <!-- TODO populate answer -->
                                                Option 4
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-md-offset-4">
            <!-- timer -->
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <span class="glyphicon glyphicon-time timer"></span>
                    &nbsp;
                    <span class="answerSelection-TimeLeft">
                            5
                        </span>
                    &nbsp;seconds left
                </div>
            </div>
        </div>
    </div>
@endsection
