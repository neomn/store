<template>
    <div class=" m-16 justify-center">
        <form action="#" class="">
            <label for="email">enter your email </label>
            <input name="email" id="email" type="email" placeholder="email" >
            <label for="password">enter password</label>
            <input name="password" id="password" type="password" placeholder="password">
            <button type="submit">login</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {}
    },
    mounted() {
        this.initLogin();
    },
    methods: {
        initLogin() {
            axios.get('/sanctum/csrf-cookie')
                .then(response => {
                    console.log('initializing csrf token >>>> ')
                    console.log(response)
                })
                .catch(function (error) {
                    console.log(error)
                })
        },

    },
}
</script>

<style scoped>

</style>
