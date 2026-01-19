import { createContact, getContacts } from "../services/contactService";

async function allContact() {
    try {
        const response = await getContacts();
        return response.data;
    } catch (error) {}
}

async function addContact(data) {
    try {
        const response = await createContact(data);
        return response.data;
    } catch (error) {}
}

export { allContact, addContact };
