import { createBrowserRouter } from "react-router";
import Contact from "./pages/contact/Contact";
import Home from "./pages/home/Home";

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
