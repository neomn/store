<template>
    <div>
        <aside class=" min-h-screen bg-gray-800 border-r border-gray-200 float-left  ">
            <router-link :to="{ name:'welcome' }">
                <button class="fixed bottom-5 left-8 justify-center border-gray-200 rounded-lg bg-red-700 px-4 py-1"
                        @click="logout"> Log Out
                </button>
            </router-link>
        </aside>
    </div>
</template>

<script>
export default {
    name: "SideBar",
    methods: {
        logout() {
            localStorage.removeItem('loggedInUser')
            axios.post('/logout')
                .then(response => {
                    console.log(response)
                })
                .catch(function (error) {
                    console.log(error)
                })
        },
    }
}
</script>

<style scoped>

</style>
