import { fetchContacts } from "../services/contactService";

async function getContacts() {
    try {
        const response = await fetchContacts();
        return response.data;
    } catch (error) {
        console.log("Error in getContacts", error);
    }
}

export { getContacts };
