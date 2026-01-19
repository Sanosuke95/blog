import PropTypes from "prop-types";
import "./layout.css";

function Layout({ children }) {
    return (
        <main>
            <div className="container">{children}</div>
        </main>
    );
}

Layout.propTypes = {
    children: PropTypes.any,
};

export default Layout;
