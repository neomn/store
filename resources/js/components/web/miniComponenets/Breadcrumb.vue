<template>
    <div class="z-20 absolute top-4 flex justify-center items-center w-full h-12  ">
        <div id="bredCrumb"
            class="flex justify-start items-center w-11/12 h-10 pr-4 text-zinc-200 rounded-lg overflow-x-scroll border">
            <div class="ml-4">
                Categories
            </div>
            <div v-for="category in bredCrumbContainer" class="w-auto flex items-center h-10 pl-2 ">
                <span class="truncate"> > {{ category }} </span>
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

        if (this.$route.params.category !== undefined) {
            this.$router.push({name: 'categories'})
        }

        this.$watch(() => this.$route.params.category, (newValue, oldValue) => {
            this.breakBredIteration = false
            this.refreshBredCrumbContainer(newValue, this.allCategories)
        })
    },
    updated(){
        document.getElementById('bredCrumb').scrollTo(document.getElementById('bredCrumb').scrollWidth , 0)
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
            let wasntTarget = 0
            console.log('recursive call > ')
            console.log(allCategories)
            allCategories.forEach((item, index) => {
                if (!this.breakHierarchyIteration) {
                    console.log('checking > ' + item.category)
                    //is it target ?
                    if (item.category === this.targetCategory.category) {
                        console.log('target found')
                        this.hierarchyArray.push(item.category)
                        this.breakHierarchyIteration = true
                    } else {
                        wasntTarget++
                        console.log(item.category + ' wasnt target > ' + wasntTarget)
                        if (wasntTarget >= allCategories.length) {
                            console.log('all children checked')
                            console.log('removing last element')
                            console.log(this.hierarchyArray)
                            this.hierarchyArray.pop()
                        }
                        if (item.sub.length > 0) {
                            this.hierarchyArray.push(item.category)
                            console.log('adding ' + item.category + ' to hierarchy array ')
                            console.log(this.hierarchyArray)
                            this.buildCategoryHierarchyArray(item.sub)
                        }
                    }
                }
            })
        },
    }
}
</script>
