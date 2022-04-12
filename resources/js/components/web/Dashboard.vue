<template>
    <div class="bg-slate-900 min-h-screen text-gray-200">
        <aside class="bg-gray-800 border-r border-gray-200 float-left w-44 min-h-screen">
            <h1>this is side bar</h1>
        </aside>
    </div>
</template>

<script>
export default {
    name: "Dashboard",
    data(){
        return {

        }
    },
    mounted(){
        this.initDashboard()
    },
    methods:{
        initDashboard(){
            axios.get('api/dashboard')
            .then(response=>{
                console.log('user dashboard data >>> ')
                console.log(response)
            })
            .catch(function (error){
                console.log(error)
            })
        }
    }
}
</script>

<style scoped>

</style>
