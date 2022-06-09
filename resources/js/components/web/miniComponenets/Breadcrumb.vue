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
            allCategories: {},
            bredCrumbContainer: {},
            breakBredIteration: false, // helper variable to to break nested Object iteration
            breakHierarchyIteration: false, // helper variable to to break nested Object iteration
            targetCategory: {},
            hierarchyArray: []
        }
    },
    mounted() {
        this.$root.$on('bredCrumb', (categories) => {
            this.allCategories = categories
        })

        this.$watch(() => this.$route.params.category, (newValue, oldValue) => {
            this.breakBredIteration = false
            this.refreshBredCrumbContainer(newValue, this.allCategories)
        })
    },
    methods: {
        refreshBredCrumbContainer(category, allCategories) {
            if (!this.breakBredIteration) {
                if (category === undefined) {
                    console.log('category undefined')
                    this.bredCrumbContainer = {}
                }
                // find intended category Object
                else {
                    allCategories.forEach((item, index) => {
                        if (!this.breakBredIteration) {
                            if (item.category === category) {
                                console.log(category + ' found')
                                this.targetCategory = item
                                this.breakHierarchyIteration = false
                                this.hierarchyArray = []
                                this.buildCategoryHierarchyArray(this.allCategories)
                                this.bredCrumbContainer = this.hierarchyArray
                                console.log(this.bredCrumbContainer)
                                this.breakBredIteration = true
                            } else if (item.sub !== undefined)
                                this.refreshBredCrumbContainer(category, item.sub)
                        }
                    })
                }
            }
        },
        buildCategoryHierarchyArray(allCategories) {
            allCategories.forEach((item, index) => {
                if (!this.breakHierarchyIteration) {
                    //if it is root , add it to array
                    if (item.parent_id === null){
                        this.hierarchyArray.push(item.category)
                    }
                    if (item.category === this.targetCategory.category){
                        this.breakHierarchyIteration = true
                    }else {
                        this.buildCategoryHierarchyArray(item.sub)
                    }
                }
            })
        },
    }
}
</script>
