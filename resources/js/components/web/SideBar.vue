<template>
    <div class="w-1/6 h-screen mt-10  flex flex-col border-2 border-red-600 overflow-hidden">
        <div class="w-full flex flex-col justify-item-start border-2 border-lime-300 ">
            <ul v-for="item in sideBarItems">
                <li>{{item}}</li>
            </ul>
        </div>
        <button class=" justify-self-end mx-8 text-2xl text-gray-300 rounded-lg border-4 border-red-700"
                @click="logout">
            <router-link :to="{ name:'welcome' }">
                Log Out
            </router-link>
        </button>
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
