import React, {useCallback} from "react";
import EventCardInfo from "./EventCardInfo";

function EventCard({ event, onEventIdChange, onIsVisibleChange }) {
    const handleEventIdChange = function (eventId) {
        return function () {
            onEventIdChange(eventId)
            onIsVisibleChange(true)
        }
    }

    return (
        <div className="col-sm-3" onClick={handleEventIdChange(event.id)}>
            <div className={'card m-1'} style={{ width: "auto" }}>
                <img src={event.img} className={'img-fluid rounded-start img-thumbnail'} alt={'Kartinka'}/>
                <div className={'card-body'}>
                    <h5 className={'card-title'}>{ event.name }</h5>
                    <p className={'card-text'}>{ event.attributes }</p>
                </div>
            </div>
        </div>
    )
}

export default EventCard;
