<template>
    <div class="fixed flex left-0 top-12 h-full w-1/6  rounded-lg bg-slate-900 overflow-hidden">
        <div class="relative flex flex-col w-full h-full overflow-hidden">

            <!-- Orders History-->
            <div class=" w-full ">
                <div class=" flex justify-start items-center h-10 py-1 pl-2 rounded-lg bg-slate-900 text-center text-zinc-300 ">
                    <div>
                        <div class="inline pr-2 text-orange-500">
                            <font-awesome-icon :icon="['fas' , 'receipt']"/>
                        </div>
                        <span>Orders History</span>
                    </div>
                </div>
            </div>
            <div class=" w-full h-[1px] bg-gradient-to-r from-slate-900 via-lime-300 to-slate-900"></div>

            <!-- favorite products-->
            <div class=" w-full ">
                <div class=" flex justify-start pl-2 items-center h-10 py-1 bg-slate-900 rounded-lg text-center text-zinc-300 ">
                    <div>
                        <div class="inline pr-2 text-red-700">
                            <font-awesome-icon :icon="['fas' , 'heart']"/>
                        </div>
                        <span>Favorite Products</span>
                    </div>
                </div>
            </div>
            <div class="w-full h-[1px] bg-gradient-to-r from-slate-900 via-lime-300 to-slate-900"></div>

            <!-- inbox-->
            <div class=" w-full ">
                <div class=" flex justify-start pl-2 items-center h-10 py-1 rounded-lg text-center text-zinc-300 ">
                    <div>
                        <div class="inline pr-2 text-lime-300">
                            <font-awesome-icon :icon="['fas' , 'envelope']"/>
                        </div>
                        <span>Inbox</span>
                    </div>
                </div>
            </div>
            <div class="w-full h-[1px] bg-gradient-to-r from-slate-900 via-lime-300 to-slate-900"></div>
            <!-- personal info-->
            <div class=" w-full ">
                <div class=" flex justify-start pl-2 items-center h-10 py-1 rounded-lg text-center text-zinc-300 ">
                    <div>
                        <div class="inline pr-2 text-indigo-500">
                            <font-awesome-icon :icon="['fas' , 'user']"/>
                        </div>
                        <span>Personal Info</span>
                    </div>
                </div>
            </div>
            <div class="w-full h-[1px]  bg-gradient-to-r from-slate-900 via-lime-300 to-slate-900"></div>
            <!-- settings -->
            <div class=" w-full ">
                <div class=" flex justify-start pl-2 items-center h-10 py-1 rounded-lg text-center text-zinc-300 ">
                    <div>
                        <div class="inline pr-2 text-amber-500">
                            <font-awesome-icon :icon="['fas' , 'cogs']"/>
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
