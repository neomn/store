<template>
    <div class="bg-slate-800 min-h-screen text-gray-200">

        <Header/>

        <div class="p-4 m-4">
            <div v-for="category in categories" class="felx flex-row">
                <div class="bg-slate-700">
                    {{ category }}
                </div>
            </div>
        </div>

    </div>
</template>

<!---------------------------------------------------------------------->


<script>
import Header from "./Header";

export default {
    name: "Categories",
    components:{
      Header
    },
    data() {
        return {
            categories: {},
        }
    },
    mounted() {
        this.getCategories()
    },
    methods: {
        getCategories() {
            axios.get('api/categories')
                .then(response => {
                    console.log(response.data)
                    this.categories = response.data
                })
                .catch(function (error) {
                    console.log(error)
                })
        }
    }
}
</script>


<!---------------------------------------------------------------------->

<style scoped>

</style>
