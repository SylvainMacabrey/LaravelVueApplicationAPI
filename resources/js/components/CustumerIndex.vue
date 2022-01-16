<template>

    <div class="flex flex-col">
        <div class="flex mb-5">
            <router-link :to="{name: 'customer.create'}" class="px-2 py-1 text-white rounded bg-sky-500/100">Créer un client</router-link>
        </div>
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Telephone
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Favori
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <template v-for="customer in customers" :key="customer.id">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-10 h-10">
                                                <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900" v-text="customer.name"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900" v-text="customer.telephone"></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full" v-bind:class="{'bg-green-300 text-green-800': customer.isFavorite}" v-text="customer.isFavorite"></span>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        <router-link :to="{ name: customer.edit, params: { id: customer.id }}" class="mr-5 text-indigo-600 hover:text-indigo-900">Modifier</router-link>
                                        <button @click="deleteCustomer(customer.id)" class="text-red-600 hover:text-red-900"></button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import { onMounted } from "vue";
import useCustomers from "../services/CustomerService.js";

export default {
    setup() {

        const { customers, getCustomers, destroyCustomer } = useCustomers();

        const deleteCustomer = async (id) => {
            await destroyCustomer(id);
            await getCustomers();
        }

        onMounted(getCustomers());

        return {
            customers,
            deleteCustomer
        };

    }
}
</script>
