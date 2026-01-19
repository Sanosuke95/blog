import { useState } from "react";
import Input from "../components/input/Input";
import Label from "../components/label/Label";
import Layout from "../components/layouts/layout/Layout";
import Textarea from "../components/textarea/Textarea";
import { addContact } from "../data/contactData";

function Contact() {
    const [formData, setFormData] = useState({
        email: "",
        title: "",
        content: "",
    });

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData((prevFormData) => ({
            ...prevFormData,
            [name]: value,
        }));
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        console.log(formData);
        await addContact(formData);
    };

    return (
        <Layout>
            <h1>Contact</h1>
            <form onSubmit={handleSubmit}>
                <div>
                    <Label htmlFor="email">Email</Label>
                    <Input
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Email..."
                        onChange={handleChange}
                        // value={formData.email}
                    />
                </div>
                <div>
                    <Label htmlFor="title">Title</Label>
                    <Input
                        id="title"
                        name="title"
                        placeholder="Title..."
                        onChange={handleChange}
                        // value={formData.title}
                    />
                </div>
                <div>
                    <Label htmlFor="content">Content</Label>
                    <Textarea
                        id="content"
                        name="content"
                        placeholder="content..."
                        row="10"
                        onChange={handleChange}
                        // value={formData.content}
                    />
                </div>
                <Input type="submit" />
            </form>
        </Layout>
    );
}

export default Contact;
