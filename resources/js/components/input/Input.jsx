import PropTypes from "prop-types";
import "./input.css";

function Input({
    type = "text",
    id,
    name,
    placeholder,
    value,
    onChange,
    className,
}) {
    return (
        <>
            <input
                type={type}
                id={id}
                name={name}
                placeholder={placeholder}
                value={value}
                onChange={onChange}
                className={className}
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
    className: PropTypes.string,
};

export default Input;
