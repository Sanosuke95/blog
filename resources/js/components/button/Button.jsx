import PropTypes from "prop-types";
import "./button.css";

function Button({ children, theme = "btn-primary" }) {
    const style = () => {
        switch (theme) {
            case "primary":
                return "btn-primary";
            case "secondary":
                return "btn-secondary";
            case "success":
                return "btn-success";
            case "danger":
                return "btn-danger";
            default:
                return "btn-primary";
        }
    };

    return (
        <button type="submit" className={"btn" + " " + style()}>
            {children ? children : "Submit"}
        </button>
    );
}

Button.propType = {
    children: PropTypes.node,
    theme: PropTypes.string,
    className: PropTypes.string,
};

export default Button;
