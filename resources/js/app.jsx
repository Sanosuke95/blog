import { useEffect, useState } from "react";
import { createRoot } from "react-dom/client";
import axios from "axios";

function App() {
    const [data, setData] = useState("");
    useEffect(() => {
        axios
            .get("http://localhost:8000/api/example")
            .then(function (response) {
                setData(response.data.data);
                console.log(response.data.data);
            });
    });
    return (
        <>
            <h1>First app</h1>
            <p>{data}</p>
        </>
    );
}

const root = createRoot(document.getElementById("root"));
root.render(<App />);
