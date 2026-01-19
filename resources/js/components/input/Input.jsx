import PropTypes from "prop-types";
import "./input.css";

function Input({ type = "text", id, name, placeholder, value, onChange }) {
    return (
        <>
            <input
                type={type}
                id={id}
                name={name}
                placeholder={placeholder}
                value={value}
                onChange={onChange}
            />
        </>
    );
}

Input.propType = {
    type: PropTypes.string,
    id: PropTypes.string,
    name: PropTypes.string,
    placeholder: PropTypes.string,
    value: PropTypes.string,
    onChange: PropTypes.object,
};

export default Input;
