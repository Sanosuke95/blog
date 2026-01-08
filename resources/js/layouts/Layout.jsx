import PropTypes from "prop-types";
import "./layout.css";

function Layout({ children }) {
    return <div className="container">{children}</div>;
}

Layout.propTypes = {
    children: PropTypes.node,
};

export default Layout;
