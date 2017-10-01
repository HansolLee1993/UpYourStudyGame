import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.min.css';
import $ from 'jquery';
import WaitingRoomConsole from './WaitingRoomConsole';

class Console extends Component {

    constructor(props) {
        super(props);
        this.state = {
            game: [],
            host: [],
            players: [],
            gameActive: false
        };
        this.onUpdate = this.onUpdate.bind(this);
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
                })
                .listen('GameStarted', (e) => {
                    this.setState({
                        gameActive:true
                    });
                });
        });
    }

    render() {
        return (
            <div onLoad={this.onUpdate()} className="row">
                {!this.state.gameActive ?
                <WaitingRoomConsole players={this.state.players} host={this.state.host} game={this.state.game}/>
                : <div>Game has started yall</div>}
            </div>
        );
    }
}

export default Console;

// We only want to try to render our component on pages that have a div with an ID
// of "example"; otherwise, we will see an error in our console
if (document.getElementById('console-react-entry')) {
    ReactDOM.render(<Console />, document.getElementById('console-react-entry'));
}