import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class SecondaryWelcome extends Component {
    render() {
        return (
            <div>

            </div>
        );
    }
}

export default SecondaryWelcome;

if (document.getElementById('secondaryWelcome')) {
    ReactDOM.render(<SecondaryWelcome />, document.getElementById('secondaryWelcome'));
}