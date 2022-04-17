<template>
    <div class="bg-slate-900 min-h-screen text-gray-200">
        <h1>this is categories</h1>
    </div>
</template>

<!---------------------------------------------------------------------->


<script>
export default {
    name: "Categories",
    data(){
        return {
            categories:{},
        }
    },
    mounted() {
        this.getCategories()
    },
    methods: {
        getCategories(){
            axios.get('api/categories')
            .then(response=>{
                console.log(response.data)
                this.categories = response.data
            })
            .catch(function (error){
                console.log(error)
            })
        }
    }
}
</script>


<!---------------------------------------------------------------------->

<style scoped>

</style>
