import { useEffect, useState } from "react";
import Input from "../../components/input/Input";
import Layout from "../../layouts/Layout";
import Label from "../../components/label/Label";
import Textarea from "../../components/textarea/Textarea";
import { getContacts } from "../../data/contactData";

function Contact() {
    const [formData, setFormData] = useState({
        email: "",
        title: "",
        content: "",
    });

    useEffect(() => {
        const contacts = async () => {
            const data = await getContacts();
        };

        contacts();
    }, []);

    const handleOnChange = (e) => {
        const { name, value } = e.target;
        setFormData((prevFormData) => ({
            ...prevFormData,
            [name]: value,
        }));
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        console.log(formData);
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
