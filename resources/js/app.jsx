import react from "react";
import { createRoot } from "react-dom/client";
import { RouterProvider } from "react-router";
import router from "./routes";
import "./app.css";

const root = createRoot(document.getElementById("root"));
root.render(<RouterProvider router={router} />);
