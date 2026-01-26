import { createBrowserRouter } from "react-router";
import Home from "./pages/Home";
import Contact from "./pages/Contact";

const router = createBrowserRouter([
    {
        path: "/",
        Component: Home,
    },
    {
        path: "/contact",
        Component: Contact,
    },
]);

export default router;
