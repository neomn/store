<template>
    <div class="flex flex-col fixed top-10 right-0 min-h-screen text-center
     w-40 bg-gray-500 shadow-lg ">
        <ul class="text-red-200">
            <a>Dashboard</a>
            <a>Analytics</a>
            <a>Customers</a>
            <a>Products</a>
            <a>Settings</a>
            <form action="/logout" method="post">
                <input type="hidden" name="_token" :value="csrf">
                <button type="submit" class="fixed bottom-3 right-10 ">Log Out</button>
            </form>
        </ul>
    </div>
</template>

<script>
export default {
    name: "Sidebar",
    data(){
        return{
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    }
}
</script>

<style scoped>
a {
    display: block;
}

</style>
