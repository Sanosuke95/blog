import { React, useState } from "react";
import Input from "../components/input/Input";
import Label from "../components/label/Label";
import Layout from "../components/layouts/layout/Layout";
import Textarea from "../components/textarea/Textarea";
import { addContact } from "../data/contactData";
import formValidate from "../utils/formValidate";
import Button from "../components/button/Button";

function Contact() {
    const [formData, setFormData] = useState({
        email: "",
        title: "",
        content: "",
        error: {},
    });

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData((prevFormData) => ({
            ...prevFormData,
            [name]: value,
        }));
    };

    const validateForm = () => {
        const error = formValidate(formData);
        setFormData((prevState) => ({ ...prevState, error }));
        return Object.keys(error).length === 0;
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        if (validateForm()) {
            await addContact(formData);
            setFormData({
                email: "",
                title: "",
                content: "",
            });
        } else {
            console.log("pas d'envoie");
        }
    };

    return (
        <Layout>
            <h1>Contact</h1>
            <form onSubmit={handleSubmit}>
                <div className="mb">
                    <Label htmlFor="email">Email</Label>
                    <Input
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Email..."
                        onChange={handleChange}
                        value={formData.email}
                        className={formData.error?.email ? "error-form" : ""}
                    />
                    {formData.error?.email && (
                        <p style={{ color: "red" }}>{formData.error.email}</p>
                    )}
                </div>
                <div className="mb">
                    <Label htmlFor="title">Title</Label>
                    <Input
                        id="title"
                        name="title"
                        placeholder="Title..."
                        onChange={handleChange}
                        value={formData.title}
                        className={formData.error?.title ? "error-form" : ""}
                    />
                    {formData.error?.title && (
                        <p style={{ color: "red" }}>{formData.error.title}</p>
                    )}
                </div>
                <div className="mb">
                    <Label htmlFor="content">Content</Label>
                    <Textarea
                        id="content"
                        name="content"
                        placeholder="content..."
                        row="10"
                        onChange={handleChange}
                        value={formData.content}
                        className={formData.error?.content ? "error-form" : ""}
                    />
                    {formData.error?.content && (
                        <p style={{ color: "red" }}>{formData.error.content}</p>
                    )}
                </div>
                <Button>Submit</Button>
            </form>
        </Layout>
    );
}

export default Contact;
