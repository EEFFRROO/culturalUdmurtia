import React from "react";

function EventCardInfo({ eventId, isVisible, onIsVisibleChange }) {
    const [event, setEvent] = React.useState([])
    const [style, setStyle] = React.useState('none')

    const didMount = React.useRef(false);

    React.useEffect(() => {
        if (didMount.current) {
            fetch('/getEventInfo/' + eventId)
                .then(response => {
                    return response.json()
                })
                .then(event => {
                    setEvent(event)
                })
            console.log(isVisible)
            if (isVisible) {
                setStyle('block')
            } else {
                setStyle('none')
            }
        } else {
            didMount.current = true;
        }
    }, [eventId, isVisible])

    return (
        <div style={{ width: "100vw", height: "100vh", display: style, position: "absolute", zIndex: 100, background: "white", backgroundColor: "rgba(1, 0, 0, 0.5)" }} onClick={ () => onIsVisibleChange(!isVisible) }>
            <div className={'card m-1'} style={{ width: "50%", background: "lightgray", position: "fixed", left: "50%", transform: "translate(-50%, 0%)" }} onClick={e => e.stopPropagation()}>
                <img src={event.img} className={'img-fluid rounded-start img-thumbnail'} alt={'Kartinka'} style={{ width: 30 + "rem", position: "center" }}/>
                <div className={'card-body'}>
                    <h5 className={'card-title'}>{ event.name }</h5>
                    <p className={'card-text'}><span className="badge badge-info">{ event.attributes }</span></p>
                    <p className={'card-text'}><span className="badge badge-secondary">{ event.address }</span></p>
                    <p className={'card-text'} style={{ fontWeight: "bolder" }}>{ event.description }</p>
                </div>
            </div>
        </div>
    )
}

export default EventCardInfo;
