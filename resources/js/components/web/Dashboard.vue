<template>
    <div class="bg-slate-900 min-h-screen text-gray-200">
        <h2>this is dashboard</h2>
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
            axios.get('/dashboard')
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
