<template>
    <form class="w-full max-w-sm" @submit.prevent="saveCustomer">
        <div class="mb-6 md:flex md:items-center">
            <div class="md:w-1/3">
                <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0" for="name">
                    Nom du client
                </label>
            </div>
            <div class="md:w-2/3">
                <input class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" id="name" type="text" v-model="customer.name">
            </div>
            <div v-if="errorsCustomer.name">
                {{ errorsCustomer.name }}
            </div>
        </div>
        <div class="mb-6 md:flex md:items-center">
            <div class="md:w-1/3">
                <label class="block pr-4 mb-1 font-bold text-gray-500 md:text-right md:mb-0" for="telephone">
                    Telephone
                </label>
            </div>
            <div class="md:w-2/3">
                <input class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500" id="telephone" type="text" v-model="customer.telephone">
            </div>
            <div v-if="errorsCustomer.telephone">
                {{ errorsCustomer.telephone }}
            </div>
        </div>
        <div class="mb-6 md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <label class="block font-bold text-gray-500 md:w-2/3" for="isFavori">
                <input class="mr-2 leading-tight" type="checkbox" id="isFavori" v-model="customer.isFavorite">
                <span class="text-sm">
                    Favori ?
                </span>
            </label>
        </div>
        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <button class="px-4 py-2 font-bold text-white bg-purple-500 rounded shadow hover:bg-purple-400 focus:shadow-outline focus:outline-none" type="submit">
                    Modifier
                </button>
            </div>
        </div>
    </form>

</template>

<script>
import { onMounted } from "vue";
import useCustomers from "../services/CustomerService.js";

export default {

    props: {
        id: {
            required: true,
            type: String
        }
    },

    setup(props) {

        const { getCustomer, customer, updateCustomer, errorsCustomer } = useCustomers();

        const saveCustomer = async () => {
            await updateCustomer(props.id);
        }

        onMounted(getCustomer(props.id));

        return {
            errorsCustomer,
            customer,
            saveCustomer
        }

    }
}
</script>
