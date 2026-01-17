import { useEffect, useState } from "react";
import "./bootstrap";
import { createRoot } from "react-dom/client";
import api from "./services/api";

function App() {
    const [msg, setMsg] = useState("");
    useEffect(() => {
        api.get("/example").then((response) => {
            setMsg(response.data.msg);
        });
    }, []);
    return (
        <>
            <h1>Home</h1>
            <p>{msg}</p>
        </>
    );
}

const root = createRoot(document.getElementById("root"));
root.render(<App />);
