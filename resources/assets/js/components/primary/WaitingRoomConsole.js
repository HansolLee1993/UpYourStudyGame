import React, { Component } from 'react';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.min.css';
import $ from 'jquery';
class WaitingRoomConsole extends Component {

    constructor(props) {
        super(props);
        this.state = {
            game: [],
            host: [],
            players: []
        };
        this.renderPlayers = this.renderPlayers.bind(this);
    }

    componentDidMount() {
        this.setState({
            game:this.props.game,
            host:this.props.host,
            players:this.props.players
        });
    }

    componentWillReceiveProps(nextProps, prevState) {
        this.setState({
            game:nextProps.game,
            host:nextProps.host,
            players:nextProps.players
        });
    }

    notify() {
        toast("Wow so easy !");
    }

    renderPlayers() {
        let players = [];
        if(Array.isArray(this.state.players) && this.state.players.length == 0) {
            return (<div><span>No players</span></div>)
        }
        for(let player of this.state.players) {
            players.push(
                <div key={'player-'+player['id']} className="col-md-2">
                    <img className="waitingRoom-avatar" src="http://localhost:8000/avatars/smiley_face.png"/>
                    <span>{player['name']}</span>
                    {player['id'] == this.state.host['id'] && <span className="label label-default">host</span>}
                </div>
            );
        }
        return (<div>{players}</div>);
    }

    render() {
        let players = this.renderPlayers();
        return (
            <div className="row">
                <div className="text-center">
                    <h1>Waiting Room</h1>
                    <hr/>
                </div>
                <div className="col-md-8 col-md-offset-2">
                    <div className="panel panel-default">
                        <div className="panel-body">
                            <div className="container">
                                <div className="row">
                                    {players}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="panel panel-default">
                        <div className="panel-body">
                            <div className="waitingRoom-Code text-center">
                                Room Code:
                                <span className="waitingRoom-Label">
                                        {this.state.game['code']}
                                    </span>
                            </div>
                            <div className="text-center">
                                <p>Go to upyourstudygame.tech</p>
                                <p>
                                    Enter your name and the room code
                                    <span className="waitingRoom-Label">
                                            {this.state.game['code']}
                                        </span>
                                    &nbsp;to join the game
                                </p>

                                <p>
                                    Host! Click start when everyone has joined the room!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default WaitingRoomConsole;
