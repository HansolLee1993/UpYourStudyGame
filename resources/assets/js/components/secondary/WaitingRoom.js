import React, { Component } from 'react';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.min.css';
import $ from 'jquery';
class WaitingRoom extends Component {

    constructor(props) {
        super(props);
        this.state = {
            player:[],
            host:[]
        };
        this.isEmpty = this.isEmpty.bind(this);
        this.handleGameStart = this.handleGameStart.bind(this);
    }

    componentDidMount() {
        this.setState({
            player:this.props.player,
            host:this.props.host
        });
    }

    componentWillReceiveProps(nextProps, prevState) {
        this.setState({
            player:nextProps.player,
            host:nextProps.host
        })
    }

    handleGameStart(e) {
        $.ajax({
            method:'POST',
            url:'/game/start/'+this.state.player['game_id'],
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).then(response => {
            console.log(response);
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
        let isHost = !this.isEmpty(this.state.player) && !this.isEmpty(this.state.host);
        if(isHost) {
            isHost = this.state.player['id'] == this.state.host['id'];
        }
        return (
            <div className="text-center">
                <h1>{name}</h1>
                <hr/>
                {isHost  &&
                    <div>
                        <button onClick={this.handleGameStart}>Start Game -- just click here!</button>
                    </div>
                }
                {!isHost &&
                    <div>
                        <p>Waiting on members to join the room.</p>
                        <p>Let the host know if you're ready to play!</p>
                    </div>
                }
            </div>
        );
    }
}

export default WaitingRoom;
