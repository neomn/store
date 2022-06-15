<template>
    <div>
        <Background/>
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
