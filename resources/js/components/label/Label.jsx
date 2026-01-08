import PropTypes from "prop-types";
import "./label.css";

function Label({ children, name }) {
    return <label htmlFor={name}>{children}</label>;
}

Label.propTypes = {
    children: PropTypes.node,
    name: PropTypes.string,
};

export default Label;
