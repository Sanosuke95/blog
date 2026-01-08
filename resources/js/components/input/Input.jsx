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
                onChange={onChange}
                value={value}
            />
        </>
    );
}

Input.propTypes = {
    type: PropTypes.string,
    id: PropTypes.string,
    name: PropTypes.string,
    placeholder: PropTypes.string,
    value: PropTypes.node,
    onChange: PropTypes.node,
};
export default Input;
