<!--<template>-->
<!--    <div class="flex flex-col fixed top-10 right-0 min-h-screen text-center-->
<!--     w-10 bg-gray-500 shadow-lg ">-->

<!--        &lt;!&ndash;sidebar links&ndash;&gt;-->
<!--        <ul class="text-gray-100">-->
<!--            <div class="hover:bg-gray-900"><router-link to="panel"><font-awesome-icon :icon="['fas','chart-line']"/></router-link></div>-->
<!--            <div class="hover:bg-gray-900"><router-link to='products' ><font-awesome-icon :icon="['fab','product-hunt']"/> </router-link></div>-->
<!--            <div class="hover:bg-gray-900"><a><font-awesome-icon :icon="['fas','users']"/></a></div>-->
<!--            <div class="hover:bg-gray-900"><a><font-awesome-icon :icon="['fas','chart-bar']"/></a></div>-->
<!--            <div class="hover:bg-gray-900"><a><font-awesome-icon :icon="['fas','cogs']"/></a></div>-->

<!--                <button @click="logout" class="fixed bottom-3 right-3 ">-->
<!--                    <font-awesome-icon :icon="['fas','sign-out-alt']"/>-->
<!--                </button>-->

<!--        </ul>-->
<!--    </div>-->
<!--</template>-->


<!--<script>-->
<!--export default {-->
<!--    name: "Sidebar",-->
<!--    data() {-->
<!--        return {-->
<!--            // csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),-->
<!--        }-->
<!--    },-->
<!--    methods:{-->
<!--        logout() {-->
<!--            localStorage.removeItem('loggedInUser')-->
<!--            axios.post('/logout')-->
<!--                .then(response => {-->
<!--                    console.log(response)-->
<!--                    window.location.href='/'-->
<!--                })-->
<!--                .catch(function (error) {-->
<!--                    console.log(error)-->
<!--                })-->
<!--        },-->

<!--    }-->
<!--}-->
<!--</script>-->


<!--<style scoped>-->
<!--a {-->
<!--    display: block;-->
<!--}-->

<!--ul div a {-->
<!--    margin-bottom: 10px;-->
<!--    margin-top: 5px;-->
<!--}-->

<!--ul div button {-->
<!--    margin-top: 15px;-->
<!--    margin-bottom: 5px;-->
<!--}-->
<!--</style>-->



<template>
    <div class="fixed flex left-0 top-12 h-full w-1/6  rounded-lg bg-slate-900 overflow-hidden">
        <div class="relative flex flex-col w-full h-full overflow-hidden">

            <!-- Orders History-->
            <div class=" w-full ">
                <div class=" flex justify-start items-center h-auto py-1 pl-2 rounded-lg bg-slate-900 text-center text-zinc-300 ">
                    <div>
                        <div class="inline pr-2">
                            <font-awesome-icon :icon="['fas' , 'receipt']"/>
                        </div>
                        <span>Orders History</span>
                    </div>
                </div>
            </div>
            <div class=" w-5/6 h-[1px]  bg-gradient-to-r from-slate-900 via-lime-300 to-slate-900"></div>

            <!-- favorite products-->
            <div class=" w-full ">
                <div class=" flex justify-start pl-2 items-center h-auto py-1 bg-slate-900 rounded-lg text-center text-zinc-300 ">
                    <div>
                        <div class="inline pr-2 ">
                            <font-awesome-icon :icon="['fas' , 'heart']"/>
                        </div>
                        <span>Favorite Products</span>
                    </div>
                </div>
            </div>
            <div class="w-5/6 h-[1px] bg-gradient-to-r from-slate-900 via-lime-300 to-slate-900"></div>

            <!-- inbox-->
            <div class=" w-full ">
                <div class=" flex justify-start pl-2 items-center h-auto py-1 rounded-lg text-center text-zinc-300 ">
                    <div>
                        <div class="inline pr-2">
                            <font-awesome-icon :icon="['fas' , 'envelope']"/>
                        </div>
                        <span>Inbox</span>
                    </div>
                </div>
            </div>
            <div class="w-5/6 h-[1px] bg-gradient-to-r from-slate-900 via-lime-300 to-slate-900"></div>
            <!-- personal info-->
            <div class=" w-full ">
                <div class=" flex justify-start pl-2 items-center h-auto py-1 rounded-lg text-center text-zinc-300 ">
                    <div>
                        <div class="inline pr-2 ">
                            <font-awesome-icon :icon="['fas' , 'user']"/>
                        </div>
                        <span>Personal Info</span>
                    </div>
                </div>
            </div>
            <div class="w-5/6 h-[1px] bg-gradient-to-r from-slate-900 via-lime-300 to-slate-900"></div>
            <!-- settings -->
            <div class=" w-full ">
                <div class=" flex justify-start pl-2 items-center h-10 py-1 rounded-lg text-center text-zinc-300 ">
                    <div>
                        <div class="inline pr-2 ">
                            <font-awesome-icon :icon="['fas' , 'cogs']"/>
                        </div>
                        <span>Settings</span>
                    </div>
                </div>
            </div>
            <div class=" absolute bottom-16 self-center w-5/6 h-8 text-center
                text-red-600 rounded-lg border-2 border-red-600">
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
        async logout() {
            await localStorage.removeItem('loggedInUser')
            axios.post('/logout')
                .then(response => {
                    console.log(response)
                    this.$router.push({name: 'welcome'})
                })
                .catch(function (error) {
                    console.log(error)
                    localStorage.removeItem('loggedInUser')
                })
        },
    }
}
</script>

<style scoped>

</style>

