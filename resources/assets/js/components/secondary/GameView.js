import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.min.css';
import $ from 'jquery';
import WaitingRoom from './WaitingRoom.js';
import QuestionView from './QuestionView.js';
class GameView extends Component {

    constructor(props) {
        super(props);
        this.state = {
            game: [],
            host: [],
            players: [],
            current: [],
            gameActive: false
        };
        this.onUpdate = this.onUpdate.bind(this);
        //this.renderPlayers = this.renderPlayers.bind(this);
    }

    componentDidMount() {
        this.setState({
            game:phpvars.game,
            host:phpvars.host,
            players:phpvars.players,
            current:phpvars.player
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
                        this.setState({
                            players:players
                        });
                    }
                })
                .listen('GameStarted', (e) => {
                    this.setState({
                        gameActive:true
                    });
                });
            });
    }

    notify() {
        toast("Wow so easy !");
    }

    /*renderPlayers() {
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
    }*/

    render() {
        return (
            <div onLoad={this.onUpdate()}>
                {!this.state.gameActive ?
                <WaitingRoom player={this.state.current}
                             host={this.state.host}/>:
                <QuestionView player={this.state.current} />}
            </div>

        );
    }
}

export default GameView;

// We only want to try to render our component on pages that have a div with an ID
// of "example"; otherwise, we will see an error in our console
if (document.getElementById('game-secondary-react-entry')) {
    ReactDOM.render(<GameView />, document.getElementById('game-secondary-react-entry'));
}