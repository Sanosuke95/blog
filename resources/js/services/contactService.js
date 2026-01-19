import apiService from "./apiService";

async function getContacts() {
    try {
        const response = await apiService.get("/contacts");
        return response;
    } catch (error) {
        console.error("Error fetching users:", error);
        throw error;
    }
}

async function createContact(data) {
    try {
        const response = await apiService.post("/contacts", data);
        return response;
    } catch (error) {
        console.error("Error fetching users:", error);
        throw error;
    }
}

export { getContacts, createContact };
