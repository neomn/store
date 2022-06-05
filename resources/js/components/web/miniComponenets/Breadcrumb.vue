<template>
    <div class="z-20 absolute top-4 flex justify-center items-center w-full h-12 ">
        <div class="w-11/12 h-full  text-zinc-200 rounded-lg border">
            <div v-for="category in this.$root.categories">
                {{category}}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Breadcrumb",
    data(){
      return {
          content: {},
      }
    },
    created() {
    },
    mounted(){
        this.$root.$on('bredCrumb' , (category)=>{
            console.log(category)
        })
    },
    methods:{

    }
}
</script>
