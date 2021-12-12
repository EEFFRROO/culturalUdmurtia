import React from "react";

function EventCardInfo({  }) {
    const [event, setEvent] = React.useState([])
    const [eventId, setEventId] = React.useState(1)

    React.useEffect(() => {
        fetch('/getEventInfo/' + eventId)
            .then(response => {
                return response.json()
            })
            .then(event => {
                setEvent(event)
            })
    })

    return (
        <div style={{ height: 10 + 'rem' }}>
            <div>
                { event.name }
            </div>
        </div>
    )
}

export default EventCardInfo;
