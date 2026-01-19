import PropTypes from "prop-types";
import "./textarea.css";

function Textarea({
    type = "text",
    id,
    name,
    placeholder,
    row = "5",
    value,
    onChange,
}) {
    return (
        <>
            <textarea
                type={type}
                id={id}
                name={name}
                placeholder={placeholder}
                rows={row}
                value={value}
                onChange={onChange}
            />
        </>
    );
}

Textarea.propType = {
    type: PropTypes.string,
    id: PropTypes.string,
    name: PropTypes.string,
    placeholder: PropTypes.string,
    row: PropTypes.string,
    value: PropTypes.string,
    onChange: PropTypes.object,
};

export default Textarea;
