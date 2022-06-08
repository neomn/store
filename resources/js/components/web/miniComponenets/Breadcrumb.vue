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

                }
                // find intended category Object
                else {
                    allCategories.forEach((item, index) => {
                        if (!this.breakBredIteration) {
                            if (item.category === category) {
                                console.log(category + ' found')
                                this.targetCategory = item
                                if (item.parentId !== null)
                                    this.buildCategoryHierarchyArray(item, this.allCategories)
                                this.breakBredIteration = true
                            } else if (item.sub !== undefined)
                                this.refreshBredCrumbContainer(category, item.sub)
                        }
                    })
                }
            }
        },
        buildCategoryHierarchyArray(category, allCategories) {
            let hierarchyArray = []
            allCategories.forEach((item, index) => {

                console.log('checking >')
                console.log(item.category)

                if (!this.breakHierarchyIteration) {
                    if (item.parentId === null) {
                        hierarchyArray = []
                        hierarchyArray.push(item.category)
                    }
                    hierarchyArray.push(category.category)
                    if (item.id === this.targetCategory.parentId){
                        this.breakHierarchyIteration = true
                    }
                    else if (item.sub !== undefined){
                        this.buildCategoryHierarchyArray(item.sub , this.allCategories)
                    }
                }
            })
            this.breakHierarchyIteration = false
            console.log(hierarchyArray)
            this.bredCrumbContainer = hierarchyArray
        },
    }
}
</script>
