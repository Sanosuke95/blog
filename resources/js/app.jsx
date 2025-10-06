import { StrictMode, useEffect } from "react";
import { createRoot } from "react-dom/client";
import instance from "./utils/instance";

function App() {
    useEffect(() => {
        instance.get("/hello").then(function (response) {
            console.log(response.data);
        });
    });
    return <h1>Hello tout le monde</h1>;
}

const app = document.getElementById("root");
const create_root = createRoot(app);
create_root.render(<App />);
