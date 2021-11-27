import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import EventCard from "./EventCard";
import SelectCityButton from "./SelectCityButton";

/* An example React component */
function Main() {
    const [events, setEvents] = React.useState([])
    const [city, setCity] = React.useState(1)

    React.useEffect(() => {
        fetch('/getEventsByCity/' + city)
            .then(response => {
                return response.json()
            })
            .then(events => {
                setEvents(events)
            })
    })

    return (
        <div>
            <div>
                <SelectCityButton onCityChange={setCity}/>
            </div>
            <div>
                { events.map(event => {
                    return (
                        <EventCard event={event}/>
                    )
                })}
            </div>
        </div>
    );
}

export default Main;

/* The if statement is required so as to Render the component on pages that have a div with an ID of "root";
*/

if (document.getElementById('root')) {
    ReactDOM.render(<Main />, document.getElementById('root'));
}
