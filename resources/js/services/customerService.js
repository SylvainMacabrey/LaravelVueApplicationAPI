import { ref } from "vue";
import router from "../router/index.js"
import axios from 'axios';

export default function useCustomers() {

    const customer = ref('');
    const customers = ref([]);
    const errorsCustomer = ref([]);

    const getCustomer = async (id) => {
        let response = await axios.get('/api/customers/' + id);
        customer.value = response.data.data;
    }

    const getCustomers = async () => {
        let response = await axios.get('/api/customers');
        customers.value = response.data.data;
    }

    const createCustomer = async (data) => {
        try {
            await axios.post('/api/customers', data);
            await router.push({name: 'customers.index'});
        } catch (error) {
            let errorResponce = error.response.data.errors;
            errorsCustomer.value = errorResponce;
        }
    }

    const updateCustomer = async (id) => {
        try {
            await axios.put('/api/customers/' + id, customer.value);
            await router.push({name: 'customers.index'});
        } catch (error) {
            let errorResponce = error.response.data.errors;
            errorsCustomer.value = errorResponce;
        }
    }

    const destroyCustomer = async (id) => {
        if(!window.confirm('Supprimer ce client ?')) return;
        await axios.delete('/api/customers/' + id);
    }

    return {
        customer,
        customers,
        errorsCustomer,
        getCustomer,
        getCustomers,
        createCustomer,
        updateCustomer,
        destroyCustomer
    }

}
