<template>
    <div class="fixed left-0 top-10 h-full w-1/6 border-2 border-yellow-500 overflow-hidden">
        <div class=" relative flex flex-col w-1/6 h-full mt-10 border bg-slate-700 overflow-hidden">
            <div class=" w-full border-2 border-lime-300 ">
                <ul v-for="item in sideBarItems">
                    <li>{{ item }}</li>
                </ul>
            </div>
            <div
                class=" absolute bottom-10 self-center w-5/6 text-center mx-8 text-2xl text-gray-300 rounded-lg border-4 border-red-700">
                <button @click="logout">
                    <router-link :to="{ name:'welcome' }">
                        Log Out
                    </router-link>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SideBar",
    data() {
        return {
            sideBarItems: [
                'inbox',
                'orders',
                'favorites',
                'profile',
            ],
        }
    },
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
