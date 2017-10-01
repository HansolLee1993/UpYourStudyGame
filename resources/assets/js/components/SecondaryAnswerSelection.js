import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class SecondaryAnswerSelection extends Component {
    render() {
        return (
            <div>
                <div className="text-center">
                    <div>
                        <h1>Answer Selection Page</h1>
                        <h4>Choose the answer you think is right on your device!</h4>
                    </div>
                    <hr/>
                </div>
                <div className="container">
                    <div className="row">
                        <div className="col-md-5 col-md-offset-3" style={{ 'text-align': 'center' }}>
                            <div className="panel panel-default" style={{ 'text-align' : 'center' }}>
                                <div className="panel-body" style={{ 'text-align' : 'center' }}>
                                    <div className="container" style={{ 'display' : 'inline-block' }}>
                                        <div className="row">
                                            <div className="col-md-4 text-center">
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
                                            <div className="col-md-4 text-center">
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
                                            <div className="col-md-4 text-center">
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
                                            <div className="col-md-4 text-center">
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
                        </div>
                        <div className="col-md-5 col-md-offset-3">
                            <div className="panel panel-default">
                                <div className="panel-body text-center">
                                    <p>
                                        <span className="glyphicon glyphicon-time timer" />
                                        &nbsp;
                                        <span className="answerSelection-TimeLeft">
                                            5
                                        </span>
                                        &nbsp;seconds left
                                    </p>
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
