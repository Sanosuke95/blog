import { createRoot } from "react-dom/client";
import axios from "axios";
import { useEffect } from "react";

function App() {
    useEffect(() => {
        axios
            .get("http://127.0.0.1:8000/api/example")
            .then(function (response) {
                console.log(response);
            });
    }, []);
    let hello;
    return <h1>Blog</h1>;
}

const root = createRoot(document.getElementById("root"));
root.render(<App />);
