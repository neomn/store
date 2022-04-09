<template>
    <div>
        <h1 class="text-gray-200">this is login component</h1>

        <form action="">

        </form>
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {

    },
    mounted() {
        this.initLogin();
    },
    methods: {
        initLogin() {
            axios.get('/sanctum/csrf-cookie')
            .then(response=>{

            })
            .catch(function ( error) {console.log(error)})
        },

    },
}
</script>

<style scoped>

</style>
