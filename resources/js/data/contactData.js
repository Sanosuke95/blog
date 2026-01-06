import { createContact, fetchContacts } from "../services/contactService";

async function getContacts() {
    try {
        const response = await fetchContacts();
        return response.data;
    } catch (error) {
        console.log("Error in getContacts", error);
    }
}

async function addContact(contact) {
    try {
        const response = await createContact(contact);
        return response.data;
    } catch (error) {
        console.log("Error in addContacts", error);
    }
}

export { getContacts, addContact };
