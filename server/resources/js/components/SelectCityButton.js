import React, {useCallback} from "react";

function SelectCityButton({ onCityChange }) {
    const handleCityChange = useCallback(event => {
        onCityChange(event.target.value)
    }, [onCityChange])

    return (
        <select onChange={handleCityChange} className={'form-select form-select-lg m-4 px-4 py-2 btn-outline-info rounded-pill'} aria-label={'Выберите город'}>
            <option defaultValue value={1}>Ижевск</option>
            <option value={2}>Глазов</option>
            <option value={3}>Сарапул</option>
            <option value={4}>Можга</option>
            <option value={5}>Воткинск</option>
        </select>
    )
}

export default SelectCityButton;
