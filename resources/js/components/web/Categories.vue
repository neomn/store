<template>
    <div class="w-full min-h-screen flex flex-col bg-zinc-800 overflow-y-scroll text-zinc-300">
<!--        <Background/>-->
        <Header/>
        <Sidebar/>
        <Breadcrumb/>
        <CategoriesContainer/>
    </div>
</template>

<!---------------------------------------------------------------------->

<script>
import Header from "./Header";
import Background from "./Background";
import Sidebar from "./SideBar";
import Breadcrumb from "./miniComponenets/Breadcrumb";
import CategoriesContainer from "./miniComponenets/CategoriesContainer";

export default {
    name: "Categories",
    components: {
        Breadcrumb,
        Background,
        Header,
        Sidebar,
        CategoriesContainer
    },
    props: [
        'category',
    ],
    created() {
        console.log('Categories component created > -------------------- \n')

    },
    mounted() {

    },
    methods: {

    }
}
</script>
