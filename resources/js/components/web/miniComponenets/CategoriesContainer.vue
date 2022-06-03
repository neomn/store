<template>

<!--    <div class=" z-20 absolute top-20 w-full h-full text-zinc-200 overflow-y-scroll border border-red-700">-->
<!--        <div class=" grid grid-cols-3 gap-4 p-2 justify-center place-items-center  ">-->
<!--            <div v-for="category in categoryContainer" >-->
<!--                <router-link :to="{name: 'categories' , params: {category: category.category}}">-->
<!--                    <button @click="refreshCategoryContainer(category.sub)"  class="w-28 h-28 p-2 rounded-xl border">-->
<!--                        {{ category.category }}-->
<!--                    </button>-->
<!--                </router-link>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</template>

<script>
export default {
    name: "Categories"
}
</script>

<style scoped>

</style>
