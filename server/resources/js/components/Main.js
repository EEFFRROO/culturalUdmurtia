import React, { Component } from 'react';
import ReactDOM from 'react-dom';

/* An example React component */
class Main extends Component {
    constructor() {
        super();
        this.state = {
            events: []
        }
    }

    componentDidMount() {
        fetch('/getEventsByCity/1')
            .then(response => {
                return response.json()
            })
            .then(events => {
                this.setState({ events })
            })
    }

    renderEvents() {
        return this.state.events.map(event => {
            return (
                <li key={event.id}>
                    { event.name }
                </li>
            )
        })
    }

    render() {
        return (
            <div>
                <ul>
                    { this.renderEvents() }
                </ul>
            </div>
        );
    }
}

export default Main;

/* The if statement is required so as to Render the component on pages that have a div with an ID of "root";
*/

if (document.getElementById('root')) {
    ReactDOM.render(<Main />, document.getElementById('root'));
}
