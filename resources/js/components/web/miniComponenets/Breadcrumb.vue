<template>
    <div class="z-20 absolute top-4 flex justify-center items-center w-full h-12 ">
        <div class="w-11/12 h-full  text-zinc-200 rounded-lg border">
            <div v-for="category in bredCrumbContainer">

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Breadcrumb",
    data(){
      return {
          bredCrumbContainer: {},
      }
    },
    created() {
    },
    mounted(){
        this.$root.$on('bredCrumb' , (categories)=>{
            this.bredCrumbContainer = categories
        })

        this.$watch(()=> this.$route.params , (newValue , oldValue) => {
            console.log(newValue)
        })
    },
    methods:{

    }
}
</script>
