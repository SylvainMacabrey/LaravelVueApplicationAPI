import { createRouter, createWebHistory} from "vue-router";
import CustomerCreate from "../components/CustomerCreate.vue";
import CustomerEdit from "../components/CustomerEdit.vue";
import CustumerIndex from "../components/CustumerIndex.vue";

const routes = [
    {
        path: '/dashboard',
        name: 'customers.index',
        component: CustumerIndex
    },
    {
        path: '/customer/create',
        name: 'customer.create',
        component: CustomerCreate
    },
    {
        path: '/customer/:id/edit',
        name: 'customer.edit',
        component: CustomerEdit,
        props: true
    }
];

export default createRouter ({
    history: createWebHistory(),
    routes
});
