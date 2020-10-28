<template>
    <ScrollTop>
        <a class="btn bg-darkviolet">
            <font-awesome-icon :icon="['far', 'arrow-alt-circle-up']" />
        </a>
    </ScrollTop>

</template>

<script>
import ScrollTop from "./ScrollTop";
export default {
name: "ScrollTopArrow", components:{
    ScrollTop
    }
}
</script>

<style scoped>
.btn {
    border-radius: 8px;
    background-color: rgba(0, 0, 0, 0.55);
    padding-top: 27px;
    padding-left: 10px;
    padding-right: 10px;
    padding-bottom: 5px;
}
</style>
