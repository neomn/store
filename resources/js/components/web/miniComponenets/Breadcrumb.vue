<template>
    <div class="z-20 absolute top-4 flex justify-center items-center w-full h-12 ">
        <div class="w-11/12 h-full  text-zinc-200 rounded-lg border">
            <div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Breadcrumb",
    data(){
      return {
          content: {}
      }
    },
    mounted(){
        console.log('breadCrumb > ')
        console.log(this.$root)
    },
    methods:{

    }
}
</script>
