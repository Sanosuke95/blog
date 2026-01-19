import PropTypes from "prop-types";

function Label({ children, htmlFor }) {
    return <label htmlFor={htmlFor}>{children}</label>;
}

Label.propType = {
    children: PropTypes.any,
    htmlFor: PropTypes.string,
};

export default Label;
