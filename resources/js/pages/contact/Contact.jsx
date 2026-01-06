import { useState } from "react";
import Input from "../../components/input/Input";
import Layout from "../../layouts/Layout";
import Label from "../../components/label/Label";
import Textarea from "../../components/textarea/Textarea";
import { addContact } from "../../data/contactData";

function Contact() {
    const [formData, setFormData] = useState({
        email: "",
        title: "",
        content: "",
    });

    const handleOnChange = (e) => {
        const { name, value } = e.target;
        setFormData((prevFormData) => ({
            ...prevFormData,
            [name]: value,
        }));
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        await addContact(formData);
        setFormData({
            email: "",
            title: "",
            content: "",
        });
    };

    return (
        <Layout>
            <h1>Contact</h1>
            <form onSubmit={handleSubmit}>
                <Label name={"email"}>Email</Label>
                <Input
                    name="email"
                    type="email"
                    id="email"
                    value={formData.email}
                    onChange={handleOnChange}
                />
                <Label name={"title"}>Title</Label>
                <Input
                    name="title"
                    type="text"
                    id="title"
                    value={formData.title}
                    onChange={handleOnChange}
                />
                <Label name={"content"}>Content</Label>
                <Textarea
                    name="content"
                    id="content"
                    value={formData.content}
                    onChange={handleOnChange}
                />
                <Input type="submit" />
            </form>
        </Layout>
    );
}

export default Contact;
