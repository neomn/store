<template>
    <div ref="sidebar"
         class="fixed flex left-0 min-h-screen w-0  rounded-tr-lg rounded-br-lg bg-slate-800 overflow-hidden">
        <!-- sidebar contents  -->
        <div class="relative flex justify-center w-full">
            <!-- top section -->
            <div class=" absolute top-0 flex flex-col justify-start w-full h-5/6 overflow-x-hidden overflow-y-scroll
                text-zinc-300 ">
                <!-- top level buttons and expandable area -->
                <div v-for="item in sideBarItems">
                    <!-- buttons  -->
                    <div class="flex w-full px-2 py-4 border-b">
                        <router-link :to="{name: item.title}">
                            <button class="h-full grow pl-2  text-2xl text-left  ">
                                {{ item.title }}
                            </button>
                        </router-link>
                        <!-- expand icon -->
                        <div v-if="(item.items.length !== 0)" @click="toggleExpand(item)"
                             class=" flex justify-center items-center w-1/6  ">
                            <font-awesome-icon :icon="['fas', 'angle-down']"/>
                        </div>
                    </div>
                    <!-- expandable area -->
                    <div v-if="item.expand">
                        <div>
                            <div v-for=" subItem in item.items"
                                 @click=""
                                 class=" flex flex-col justify-center items-start w-full h-10 pl-8 bg-slate-700 border-b">
                                <span class="">{{ subItem.toString() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- bottom section -->
            <div class=" absolute bottom-0 flex justify-center w-full h-28 bg-slate-800">
                <!-- logout button -->
                <div @click="logout"
                     class=" w-5/6 h-8 mt-2 text-center text-red-600 rounded-lg border-2 border-red-600">
                    <span>Log Out</span>
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
            sideBarItems: {
                products: {title: 'products', items: ['add', 'edit', 'delete'], expand: false},
                categories: {title: 'categories', items: ['add', 'edit', 'delete'], expand: false},
                users: {title: 'users', items: ['add', 'edit', 'delete'], expand: false},
                admins: {title: 'admins', items: ['add', 'edit', 'delete'], expand: false},
                analytics: {title: 'analytics', items: [], expand: false},
                settings: {title: 'settings', items: [], expand: false},
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
        },
        handleSidebarClickedItem() {

        },
    }
}
</script>


