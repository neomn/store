<template>
    <div>
        <h1 class="text-gray-200">this is login component</h1>
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {
        return{

        }
    },
    mounted() {
        this.initLogin();
    },
    methods: {
        initLogin() {
            axios.get('/sanctum/csrf-cookie')
                .then(response=>{
                    console.log('initializing csrf token >>> ')
                    console.log(response.data)
                })
                .catch(function ( error) {console.log(error)})
        },

    },
}
</script>

<style scoped>

</style>
