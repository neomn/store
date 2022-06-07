<template>
    <div class="z-20 absolute top-4 flex justify-center items-center w-full h-12 ">
        <div class="flex justify-start items-center w-11/12 h-full text-zinc-200 rounded-lg border">
            <div class="ml-4">
                Categories >
            </div>
            <div v-for="category in bredCrumbContainer" class="w-auto h-10 ml-2 border" >
                {{category}}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Breadcrumb",
    data() {
        return {
            allCategories: {},
            bredCrumbContainer: {},
        }
    },
    mounted() {
        this.$root.$on('bredCrumb', (categories) => {
            this.allCategories = categories
        })

        this.$watch(() => this.$route.params.category, (newValue, oldValue) => {
            this.refreshBredCrumbContainer(newValue)
        })
    },
    methods: {
        refreshBredCrumbContainer(category) {
            if (category === undefined){

            }else {
                this.bredCrumbContainer = category
            }
        }
    }
}
</script>
