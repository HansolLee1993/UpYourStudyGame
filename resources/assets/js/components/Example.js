import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.min.css';
class Example extends Component {
    notify() {
        toast("Wow so easy !");
    }
    render() {
        return (
        <div>
        <h1>Cool, it's working</h1>
            <button onClick={this.notify}>Notify !</button>
            {/* One container to rule them all! */}
            <ToastContainer
                position="bottom-right"
                type="default"
                autoClose={5000}
                hideProgressBar={false}
                newestOnTop={false}
                closeOnClick
                pauseOnHover
            />
        </div>
    );
    }
}

export default Example;

// We only want to try to render our component on pages that have a div with an ID
// of "example"; otherwise, we will see an error in our console
if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}