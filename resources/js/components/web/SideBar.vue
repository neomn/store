<template>
    <div v-if="displaySidebar" class="z-30 fixed left-0 w-3/4 h-full backdrop-blur bg-white/10 ">

    </div>
<!--    <div class=" z-20 absolute flex left-0 top-12 h-full w-full  rounded-lg bg-slate-900 overflow-hidden border">-->
<!--        <div class="relative flex flex-col w-full h-full overflow-hidden">-->

<!--            &lt;!&ndash; Orders History&ndash;&gt;-->
<!--            <div class=" w-full ">-->
<!--                <div class=" flex justify-start items-center h-auto py-1 pl-2 rounded-lg bg-slate-900 text-center text-zinc-300 ">-->
<!--                    <div>-->
<!--                        <div class="inline pr-2">-->
<!--                            <font-awesome-icon :icon="['fas' , 'receipt']"/>-->
<!--                        </div>-->
<!--                        <span>Orders History</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class=" w-5/6 h-[1px]  bg-gradient-to-r from-slate-900 via-lime-300 to-slate-900"></div>-->

<!--            &lt;!&ndash; favorite products&ndash;&gt;-->
<!--            <div class=" w-full ">-->
<!--                <div class=" flex justify-start pl-2 items-center h-auto py-1 bg-slate-900 rounded-lg text-center text-zinc-300 ">-->
<!--                    <div>-->
<!--                        <div class="inline pr-2 ">-->
<!--                            <font-awesome-icon :icon="['fas' , 'heart']"/>-->
<!--                        </div>-->
<!--                        <span>Favorite Products</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="w-5/6 h-[1px] bg-gradient-to-r from-slate-900 via-lime-300 to-slate-900"></div>-->

<!--            &lt;!&ndash; inbox&ndash;&gt;-->
<!--            <div class=" w-full ">-->
<!--                <div class=" flex justify-start pl-2 items-center h-auto py-1 rounded-lg text-center text-zinc-300 ">-->
<!--                    <div>-->
<!--                        <div class="inline pr-2">-->
<!--                            <font-awesome-icon :icon="['fas' , 'envelope']"/>-->
<!--                        </div>-->
<!--                        <span>Inbox</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="w-5/6 h-[1px] bg-gradient-to-r from-slate-900 via-lime-300 to-slate-900"></div>-->
<!--            &lt;!&ndash; personal info&ndash;&gt;-->
<!--            <div class=" w-full ">-->
<!--                <div class=" flex justify-start pl-2 items-center h-auto py-1 rounded-lg text-center text-zinc-300 ">-->
<!--                    <div>-->
<!--                        <div class="inline pr-2 ">-->
<!--                            <font-awesome-icon :icon="['fas' , 'user']"/>-->
<!--                        </div>-->
<!--                        <span>Personal Info</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="w-5/6 h-[1px] bg-gradient-to-r from-slate-900 via-lime-300 to-slate-900"></div>-->
<!--            &lt;!&ndash; settings &ndash;&gt;-->
<!--            <div class=" w-full ">-->
<!--                <div class=" flex justify-start pl-2 items-center h-10 py-1 rounded-lg text-center text-zinc-300 ">-->
<!--                    <div>-->
<!--                        <div class="inline pr-2 ">-->
<!--                            <font-awesome-icon :icon="['fas' , 'cogs']"/>-->
<!--                        </div>-->
<!--                        <span>Settings</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class=" absolute bottom-16 self-center w-5/6 h-8 text-center-->
<!--                text-red-600 rounded-lg border-2 border-red-600">-->
<!--                <button @click="logout">-->
<!--                        Log Out-->
<!--                </button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</template>

<script>
export default {
    name: "SideBar",
    props: [
        'orientation'
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
    mounted(){
      this.$root.$on('toggle' , ()=>{
           this.toggle()
      })
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
        toggle(){
            this.displaySidebar = !this.displaySidebar
        }
    }
}
</script>

<style scoped>

</style>
