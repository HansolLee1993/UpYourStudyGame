import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class SecondaryAnswerSelection extends Component {
    render() {
        return(
            <div>
                <div className="text-center">
                    <div>
                        <h1>Answer Selection Page</h1>
                        <h4>Choose the answer you think is right on your device!</h4>
                    </div>
                    <hr/>
                </div>
                <div className="container text-center">
                    <div className="row">
                        <div className="panel panel-default">
                            <div className="panel-body">
                                <div className="row">
                                    <div className="col-md-4 col-md-offset-4 text-center">
                                        <a href="#" id="option1">
                                            <div className="panel panel-default">
                                                <div className="panel-body optionAnswer1">
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div className="row">
                                    <div className="col-md-4 col-md-offset-4 text-center">
                                        <a href="#" id="option2">
                                            <div className="panel panel-default">
                                                <div className="panel-body optionAnswer2">
                                                    Option 2
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div className="row">
                                    <div className="col-md-4 col-md-offset-4 text-center">
                                        <a href="#" id="option3">
                                            <div className="panel panel-default">
                                                <div className="panel-body optionAnswer3">
                                                    Option 3
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div className="row">
                                    <div className="col-md-4 col-md-offset-4 text-center">
                                        <a href="#" id="option4">
                                            <div className="panel panel-default">
                                                <div className="panel-body optionAnswer4">
                                                    Option 4
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="row">
                        <div className="col-md-4 col-md-offset-4">
                            <div className="panel panel-default">
                                <div className="panel-body text-center">
                                    <span className="glyphicon glyphicon-time pull-left"
                                          style={{ 'font-size': '2.0em', 'color': 'red' }} />
                                    <div>
                                        <span style={{ 'font-size': '20px' }}><b>Time left : </b></span>
                                        &nbsp;
                                        <span id="answerTimer" className="answerSelection-TimeLeft" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default SecondaryAnswerSelection;

// We only want to try to render our component on pages that have a div with an ID
// of "example"; otherwise, we will see an error in our console
if (document.getElementById('secondaryAnswerSelection')) {
    ReactDOM.render(<SecondaryAnswerSelection />, document.getElementById('secondaryAnswerSelection'));
}
