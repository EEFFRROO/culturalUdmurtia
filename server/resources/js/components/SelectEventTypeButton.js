import React, {useCallback} from "react";

function SelectEventTypeButton({ onEventTypeChange }) {
    const handleEventTypeChange = useCallback(event => {
        onEventTypeChange(event.target.value)
    }, [onEventTypeChange])

    return (
        <select onChange={handleEventTypeChange} className={'form-select form-select-lg m-4 px-4 py-2 btn-outline-secondary rounded-pill'} aria-label={'Выберите тип мероприятия'}>
            <option defaultValue value={1}>Выставки</option>
            <option value={2}>Спектакли</option>
            <option value={3}>Концерты</option>
        </select>
    )
}

export default SelectEventTypeButton;
