<template>
    <div class="flex flex-col fixed top-10 right-0 min-h-screen text-center
     w-10 bg-gray-500 shadow-lg ">

        <!--sidebar links-->
        <ul class="text-gray-100">
            <div class="hover:bg-gray-900"><router-link to="panel"><font-awesome-icon :icon="['fas','chart-line']"/></router-link></div>
            <div class="hover:bg-gray-900"><router-link to='products' ><font-awesome-icon :icon="['fab','product-hunt']"/> </router-link></div>
            <div class="hover:bg-gray-900"><a><font-awesome-icon :icon="['fas','users']"/></a></div>
            <div class="hover:bg-gray-900"><a><font-awesome-icon :icon="['fas','chart-bar']"/></a></div>
            <div class="hover:bg-gray-900"><a><font-awesome-icon :icon="['fas','cogs']"/></a></div>

                        <!--Log Out Form-->
                        <form action="/logout" method="post">
                            <input type="hidden" name="_token" :value="csrf">
                            <button type="submit" class="fixed bottom-3 right-3 ">
                                <font-awesome-icon :icon="['fas','sign-out-alt']"/>
                            </button>
                        </form>
        </ul>
    </div>
</template>


<script>
export default {
    name: "Sidebar",
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    },
    methods:{

    }
}
</script>


<style scoped>
a {
    display: block;
}

ul div a {
    margin-bottom: 10px;
    margin-top: 5px;
}

ul div button {
    margin-top: 15px;
    margin-bottom: 5px;
}
</style>
