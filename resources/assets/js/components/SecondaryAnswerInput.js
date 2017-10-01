import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class SecondaryAnswerInput extends Component {
    render() {
        return (
            <div>
                <div className="text-center">
                    <div>
                        <h1>Answer Input Page</h1>
                        <h4>Please enter your answer.</h4>
                    </div>
                    <hr/>
                </div>
                <div className="container">
                    <div className="row">
                        <div className="col-md-5 col-md-offset-3" style={{ 'text-align': 'center' }}>
                            <div className="panel panel-default" style={{ 'text-align' : 'center' }}>
                                <div className="panel-body" style={{ 'text-align' : 'center' }}>
                                    <textarea placeholder="Enter answer here..." rows="3" cols="40"/>
                                    <br/>
                                    <button onClick="" className="btn btn-success">Go!</button>
                                </div>
                            </div>
                        </div>
                        <div className="col-md-5 col-md-offset-3">
                            <div className="panel panel-default">
                                <div className="panel-body text-center">
                                    <p>
                                        <span className="glyphicon glyphicon-time timer" />
                                        &nbsp;
                                        <span className="answerInput-TimeLeft">
                                            5&nbsp;
                                        </span>
                                        &nbsp;
                                        seconds left
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

export default SecondaryAnswerInput;

// We only want to try to render our component on pages that have a div with an ID
// of "example"; otherwise, we will see an error in our console
if (document.getElementById('secondaryAnswerInput')) {
    ReactDOM.render(<SecondaryAnswerInput />, document.getElementById('secondaryAnswerInput'));
}
