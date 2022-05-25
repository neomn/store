<template>
    <div>
        <Header/>
        <Sidebar/>
        <!--productContainer table-->
        <div dir="rtl" class="rtl ">
            <table class="table-fixed fixed right-10 top-10 mx-auto inset-x-0 rounded-md bg-slate-400">
                <thead>
                <tr class="border-b-2 ">
                    <th scope="col" class="px-4" >ID</th>
                    <th scope="col" class="px-4" >Product Number</th>
                    <th scope="col" class="px-28" >Name</th>
                    <th scope="col" class="px-4" >Count</th>
                    <th scope="col" class="px-4" >Active</th>
                    <th scope="col" class="px-36" > Operations</th>
                </tr>
                </thead>
                <tbody class="bg-slate-200 ">
                <tr>
                    <template v-for=" product in products">
                        <td class="text-center py-1"> {{ product.id }}</td>
                        <td class="text-center"> {{ product.product_number }}</td>
                        <td class="text-center"> {{ product.product_name }}</td>
                        <td class="text-center"> {{ product.available_count }}</td>
                        <td class="text-center"> {{ product.show }}</td>
                        <td class="text-center">
                            <button class="bg-amber-300  rounded-lg px-4 ">Refresh</button>
                            <button class="bg-emerald-300  rounded-lg px-4 ">Edit</button>
                            <button class="bg-red-300 rounded-lg px-4 ">Delete</button>
                        </td>
                    </template>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import Header from "./Header";
import Sidebar from "./Sidebar";

export default {
    name: "products",
    components: {Sidebar, Header},
    data() {
        return {
            products: [],
        }
    },
    mounted() {
        this.retriveProducts()
    },
    methods: {
        retriveProducts() {
            axios.get('/admin-api/products')
                .then((response) => {
                    this.products = response.data;
                    console.log('this. productContainer >>>' + this.products)
                    console.log('productContainer retrived ')
                })
                .catch(function (error) {
                    console.log('cant load productContainer from server' + error)
                })
        }
    }
}
</script>
