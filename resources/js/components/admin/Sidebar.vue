<template>
    <div ref="sidebar"
         class="fixed flex left-0  min-h-screen w-2/3  rounded-tr-lg rounded-br-lg bg-slate-800 overflow-hidden">
        <div class="relative w-full">
            <div class=" absolute top-0 flex flex-col items-center justify-start w-full h-full overflow-hidden">
                <!-- sidebar items -->
                <div class="w-full ">

                </div>
                <!-- logout button -->
                <div
                    class=" absolute bottom-20 w-5/6 h-8 text-center text-red-600 rounded-lg border-2 border-red-600">
                    <button @click="logout">
                        Log Out
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SideBar",
    props: [
        'display'
    ],
    data() {
        return {
            displaySidebar: false,
            sideBarItems: [
                'inbox',
                'orders',
                'favorites',
                'profile',
            ],
        }
    },
    mounted() {
        this.$root.$on('sidebar', () => {
            this.toggleSidebar()
        })
    },
    methods: {
        async logout() {
            await localStorage.removeItem('loggedInUser')
            axios.post('/logout')
                .then(response => {
                    console.log(response)
                    window.location.href = '/'
                })
                .catch(function (error) {
                    console.log(error)
                    localStorage.removeItem('loggedInUser')
                })
        },
        toggleSidebar() {
            console.log('sidebar > toggleSidebar')
            if (this.displaySidebar) {
                this.displaySidebar = !this.displaySidebar
                this.$refs.sidebar.classList.remove('w-2/3')
                this.$refs.sidebar.classList.add('w-0')
            } else if (!this.displaySidebar) {
                this.displaySidebar = !this.displaySidebar
                this.$refs.sidebar.classList.remove('w-0')
                this.$refs.sidebar.classList.add('w-2/3')
            }
        },
    }
}
</script>

<style scoped>

</style>

