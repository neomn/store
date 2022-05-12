<template>
    <div class="fixed flex left-0 top-12 h-full w-1/6  rounded-lg bg-slate-900 overflow-hidden">
        <div class="relative flex flex-col w-full h-full overflow-hidden">

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

            <!-- logout button -->
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
                    window.location.href='/'
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

