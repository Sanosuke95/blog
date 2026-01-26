import { useEffect, useState } from "react";
import apiService from "../services/apiService";

function Home() {
    const [msg, setMsg] = useState("");
    useEffect(() => {
        apiService.get("/example").then((response) => {
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

export default Home;
