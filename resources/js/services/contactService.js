import instance from "./instance";

async function fetchContacts() {
    try {
        const response = await instance.get("/contacts");
        return response;
    } catch (error) {
        console.log("Error fetch contact", error);
        throw error;
    }
}

async function createContact(contact) {
    try {
        const response = await instance.post("/contacts", contact);
        return response;
    } catch (error) {
        console.log("Error fetch contact", error);
        throw error;
    }
}

export { fetchContacts, createContact };
