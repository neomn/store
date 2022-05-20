<template>
    <div ref="sidebar"
         class="fixed flex left-0  min-h-screen w-2/3  rounded-tr-lg rounded-br-lg bg-slate-800 overflow-hidden">
        <div class="relative flex justify-center w-full">
            <!-- sidebar items -->
            <div class=" absolute top-0 flex flex-col items-start justify-start  w-full h-5/6 overflow-hidden
                text-zinc-300">

                <div class=" flex flex-col w-full h-full border">
                    <!-- top level buttons and expandable area -->
                    <div v-for="item in sideBarItems">
                        <!-- buttons  -->
                        <div class="flex w-full border ">
                            <button class="w-5/6 h-full pl-2  text-2xl text-left ">
                                {{ item.title }}
                            </button>
                            <!-- expand icon -->
                            <div v-if="(item.items.length !== 0)"
                                 @click="toggleExpand(item)"
                                 class=" flex justify-center items-center h-full w-1/6 border ">
                                    <font-awesome-icon :icon="['fas', 'angle-down']"/>
                            </div>
                        </div>
                        <!-- expandable area -->
                        <div v-if="item.expand" class="">
                            <div v-for=" subItem in item.items"  class=" w-full h-10 pl-4 px-4 bg-slate-700 border-b">
                                {{ subItem.toString() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- logout button -->
            <div class=" absolute bottom-20 w-5/6 h-8 text-center text-red-600 rounded-lg border-2 border-red-600">
                <button @click="logout">
                    Log Out
                </button>
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
            sideBarItems: {
                users: {title: 'users', items: ['create', 'details'], expand: false},
                categories: {title: 'categories', items: []},
                products: {title: 'products', items: []},
                admins: {title: 'admins', items: []},
                analytics: {title: 'analytics', items: []},
                settings: {title: 'settings', items: []},
            },
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
            if (this.displaySidebar) {
                this.$refs.sidebar.classList.remove('w-2/3')
                this.$refs.sidebar.classList.add('w-0')
            } else if (!this.displaySidebar) {
                this.$refs.sidebar.classList.remove('w-0')
                this.$refs.sidebar.classList.add('w-2/3')
            }
            this.displaySidebar = !this.displaySidebar
        },
        toggleExpand(item) {
            item.expand = !item.expand
        }
    }
}
</script>

<style scoped>

</style>

