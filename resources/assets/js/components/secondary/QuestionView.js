import React, { Component } from 'react';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.min.css';
import $ from 'jquery';

class QuestionView extends Component {

    constructor(props) {
        super(props);
        this.state = {
            player:[],
            question:[]
        };
        this.isEmpty = this.isEmpty.bind(this);
        this.onUpdate = this.onUpdate.bind(this);
    }

    componentDidMount() {
        this.setState({
            player:this.props.player
        });
    }

    componentWillReceiveProps(nextProps, prevState) {
        this.setState({
            player:nextProps.player
        });
    }

    onUpdate(e) {
        $(document).ready(()=>{
            window.Echo.channel('game.'+this.state.player['game_id'])
                .listen('QuestionAsked', (e) => {
                    console.log('event player id: '+e.player['id'])
                    console.log('react player id: '+this.state.player['id'])
                    if(this.isEmpty(this.state.question) && e.player['id'] == this.state.player['id']) {
                        this.setState({
                            question:e.question
                        });
                    }
                });
        });
    }

    notify() {
        toast("Wow so easy !");
    }

    isEmpty(obj) {
        return obj == undefined || Object.keys(obj).length == 0 || (Array.isArray(obj) && obj.length == 0)
            || (typeof obj == 'string' && trim(obj) == "");
    }

    render() {
        let name = this.isEmpty(this.state.player) ? 'No player defined':this.state.player['name'];
        let question = this.isEmpty(this.state.question) ? 'No question defined' : this.state.question['question'];
        return (
            <div className="text-center" onLoad={this.onUpdate()}>
                <h1>{name}</h1>
                <hr/>
                <div>{question}</div>
                <button>Enter!</button>
            </div>
        );
    }
}

export default QuestionView;
