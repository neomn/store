<template>
    <div class="fixed">
        <h1>
            this is Footer
        </h1>
    </div>
</template>

<script>
export default {
    name: "Footer"
}
</script>

<style scoped>
    div.fixed{
        background-color: #333333;
        border: 2px solid white;
        position: fixed;
        bottom: 0;
        width: 1300px;
        display: inline;
        text-align: center;
    }
    h1{
        color:white;
    }
</style>
