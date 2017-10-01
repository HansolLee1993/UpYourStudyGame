import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.min.css';
import $ from 'jquery';
import Echo from 'laravel-echo';
window.Pusher = require('pusher-js');
class WaitingRoomConsole extends Component {

    constructor(props) {
        super(props);
        this.state = {
            game: [],
            host: [],
            players: []
        };
        this.onUpdate = this.onUpdate.bind(this);
        this.renderPlayers = this.renderPlayers.bind(this);
    }

    componentDidMount() {
        this.setState({
            game:phpvars.game,
            host:phpvars.host,
            players:phpvars.players
        });
    }

    onUpdate(e) {
        $(document).ready(()=>{
            window.Echo.channel('game.'+this.state.game['id'])
                .listen('PlayerJoined', (e) => {
                    let found = this.state.players.find(player=> {
                       return player.id == e.player.id;
                    });
                    if(!found) {
                        let players = Object.assign([], this.state.players);
                        players.push(e.player);
                        if(players.length == 1) {
                            this.setState({
                                players:players,
                                host:e.player
                            });
                        } else {
                            this.setState({
                                players:players
                            });
                        }
                    }
                });
        });
    }

    notify() {
        toast("Wow so easy !");
    }

    renderPlayers() {
        let players = [];
        console.log(Array.isArray(this.state.players));
        if(Array.isArray(this.state.players) && this.state.players.length == 0) {
            return (<div><span>No players</span></div>)
        }
        console.log(this.state.players);
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
            <div className="col-md-8 col-md-offset-2" onLoad={this.onUpdate()}>
                <div className="panel panel-default">
                    <div className="panel-body">
                        <div className="container">
                            <div className="row">
                                {players}
                                <div>Here</div>
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
        );
    }
}

export default WaitingRoomConsole;

// We only want to try to render our component on pages that have a div with an ID
// of "example"; otherwise, we will see an error in our console
if (document.getElementById('waitingRoom-console-react-entry')) {
    ReactDOM.render(<WaitingRoomConsole />, document.getElementById('waitingRoom-console-react-entry'));
}