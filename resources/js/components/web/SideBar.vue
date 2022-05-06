<template>
    <div class="fixed flex left-0 top-12 h-full w-1/6 border-r border-lime-300   overflow-hidden">
        <div class=" relative flex flex-col w-full h-full bg-slate-800 overflow-hidden">
            <!-- Orders History-->
            <div class=" w-full ">
                <div class=" flex justify-start pl-2 items-center h-10 border-b rounded-lg text-center text-zinc-300 ">
                    <div>
                        <div class="inline pr-2">
                            <font-awesome-icon :icon="['fas' , 'envelope']"/>
                        </div>
                        <span>Orders History</span>
                    </div>
                </div>
            </div>
            <!-- inbox-->
            <div class=" w-full ">
                <div class=" flex justify-start pl-2 items-center h-10 border-b rounded-lg text-center text-zinc-300 ">
                    <div>
                        <div class="inline pr-2">
                            <font-awesome-icon :icon="['fas' , 'envelope']"/>
                        </div>
                        <span>Inbox</span>
                    </div>
                </div>
            </div>
            <!-- inbox-->
            <div class=" w-full ">
                <div class=" flex justify-start pl-2 items-center h-10 border-b rounded-lg text-center text-zinc-300 ">
                    <div>
                        <div class="inline pr-2">
                            <font-awesome-icon :icon="['fas' , 'envelope']"/>
                        </div>
                        <span>Inbox</span>
                    </div>
                </div>
            </div>
            <!-- personal info-->
            <div class=" w-full ">
                <div class=" flex justify-start pl-2 items-center h-10 border-b rounded-lg text-center text-zinc-300 ">
                    <div>
                        <div class="inline pr-2">
                            <font-awesome-icon :icon="['fas' , 'envelope']"/>
                        </div>
                        <span>Personal Info</span>
                    </div>
                </div>
            </div>
            <!-- settings -->
            <div class=" w-full ">
                <div class=" flex justify-start pl-2 items-center h-10 border-b rounded-lg text-center text-zinc-300 ">
                    <div>
                        <div class="inline pr-2">
                            <font-awesome-icon :icon="['fas' , 'envelope']"/>
                        </div>
                        <span>Settings</span>
                    </div>
                </div>
            </div>
            <div class=" absolute bottom-16 self-center w-5/6 h-8 text-center
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
