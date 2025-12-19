import { useEffect } from "react";
import "./bootstrap";
import { createRoot } from "react-dom/client";
import instance from "./services/instance";

function App() {
    useEffect(() => {
        instance.get("/example").then(function (response) {
            console.log(response.data);
        });
    }, []);
    return <h1>Home</h1>;
}

const root = document.getElementById("root");
createRoot(root).render(<App />);
