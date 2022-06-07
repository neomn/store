<template>
    <div class="z-20 absolute top-4 flex justify-center items-center w-full h-12 ">
        <div class="flex justify-start items-center w-11/12 h-full text-zinc-200 rounded-lg border">
            <div class="ml-4">
                Categories >
            </div>
            <div v-for="category in bredCrumbContainer" class="w-auto h-10 ml-2 border">
                {{ category }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Breadcrumb",
    data() {
        return {
            breakIteration: false, // helper variable to to break nested Object iteration
            allCategories: {},
            bredCrumbContainer: {},
        }
    },
    mounted() {
        this.$root.$on('bredCrumb', (categories) => {
            this.allCategories = categories
        })

        this.$watch(() => this.$route.params.category, (newValue, oldValue) => {
            this.breakIteration = false
            this.refreshBredCrumbContainer(newValue , this.allCategories)
        })
    },
    methods: {
        refreshBredCrumbContainer(category , allCategories) {
            if (!this.breakIteration) {
                if (category === undefined) {
                    return
                } else {
                    allCategories.forEach((item, index) => {
                        console.log('comparing ' + category + ' with ' + item.category)
                        if (item.category === category) {
                            console.log(category + ' found')
                            this.breakIteration = true
                            // this.bredCrumbContainer = item.sub.category
                            // console.log('send to bredCrumb container >')
                            // console.log(this.bredCrumbContainer)
                        } else if (item.sub !== undefined)
                            this.refreshBredCrumbContainer(category, item.sub)
                    })
                }
            }
        },
    }
}
</script>
