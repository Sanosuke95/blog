import PropTypes from "prop-types";

function Textarea({ id, name, value, onChange, rows = "10", cols = "30" }) {
    return (
        <textarea
            id={id}
            name={name}
            value={value}
            onChange={onChange}
            rows={rows}
            cols={cols}
        />
    );
}

Textarea.propTypes = {
    id: PropTypes.string,
    name: PropTypes.string,
    value: PropTypes.string,
    onChange: PropTypes.node,
    rows: PropTypes.string,
    cols: PropTypes.string,
};

export default Textarea;
