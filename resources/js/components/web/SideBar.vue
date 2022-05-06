<template>
    <div class="fixed left-0 top-12 h-full w-1/6 border-r border-lime-300   overflow-hidden">
        <div class=" relative flex flex-col w-full h-full bg-slate-800 overflow-hidden">
            <div class=" w-full ">
                <ul v-for="item in sideBarItems">
                    <div class=" flex justify-center items-center h-10 border-b rounded-lg text-center text-zinc-300 ">

                        <li>{{ item }}</li>
                    </div>
                </ul>
            </div>
            <div
                class=" absolute bottom-16 self-center w-5/6 h-8 text-center
                text-red-600 rounded-lg border-2 border-red-600">
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
