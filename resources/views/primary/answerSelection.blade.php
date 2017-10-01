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
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-1 text-center">
                            <a href="#" id="option1">
                                <div class="panel panel-default">
                                    <div class="panel-body optionAnswer1">
                                        <!-- TODO populate answer -->
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-5 text-center">
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
                        <div class="col-md-5 col-md-offset-1 text-center">
                            <a href="#" id="option3">
                                <div class="panel panel-default">
                                    <div class="panel-body optionAnswer3">
                                        <!-- TODO populate answer -->
                                        Option 3
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-5 text-center">
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
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <!-- TODO maybe session flash, stop, or alert user that their time is up -->
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <span class="glyphicon glyphicon-time pull-left" style="font-size: 2.0em; color: red;"></span>
                        <div>
                            <span style="font-size: 20px"><b>Time left : </b></span>
                            &nbsp;
                            <span id="answerTimer" class="answerSelection-TimeLeft"></span>
                        <div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('answerTimer').innerHTML = 1 + ":" + 30;

        function checkSecond(sec) {
            if (sec < 10 && sec >= 0) {
                sec = "0" + sec
            }; // add zero in front of numbers < 10
            if (sec < 0) {
                sec = "59"
            };
            return sec;
        }

        function startTimer() {
            var presentTime = document.getElementById('answerTimer').innerHTML;
            var timeArray = presentTime.split(/[:]+/);
            var m = timeArray[0];
            var s = checkSecond((timeArray[1] - 1));
            if (s == 59) {
                m = m- 1
            }
            if(m < 0) {
                alert('timer completed')
            }

            document.getElementById('answerTimer').innerHTML =
                m + ":" + s;
            setTimeout(startTimer, 1000);
        }

        startTimer();
    </script>
@endsection
