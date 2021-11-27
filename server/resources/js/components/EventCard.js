import React from "react";

function EventCard({ event }) {
    return (
        <div className={'card m-3'}>
            <div className={'row g-0'}>
                <div className={'col-md-4 p-4 align-items-center justify-content-center col d-flex'} style={{ width: 200 + 'px' }}>
                    <img src={event.img} className={'img-fluid rounded-start img-thumbnail'} alt={'Kartinka'}/>
                </div>
                <div className={'col-md-8'}>
                    <div className={'card-body'}>
                        <h5 className={'card-title'}>{ event.name }</h5>
                        <p className={'card-text'}>{ event.attributes }</p>
                        <p className={'card-text'}><small>{ event.description }</small></p>
                    </div>
                </div>

            </div>
        </div>
    )
}

export default EventCard;
