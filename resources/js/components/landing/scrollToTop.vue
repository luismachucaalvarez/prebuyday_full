<template>
    <div>
        <div class="page-wrapper" id="top"></div>
        <a href="#" v-scroll-to="{
                                   el: '#top',
                                   offset: 0
                                 }" class="scrollToTop">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</template>

<script>
export default {
name: "scrollToTop"
}
</script>

<style scoped>
.scrollToTop {
    border-radius: 5px;
    background-color: rgb(1,14,27);
    background-color: rgba(1, 14, 27, .7);
    position: fixed;
    width: 45px;
    height: 45px;
    display: block;
    right: 15px;
    bottom: 15px;
    border: none;
    opacity: 0;
    z-index: 1;
}
.scrollToTop .fa {
    color: white;
    font-size: 22px;
}
.scrollToTop:hover {
    opacity: 1;
    background-color: rgb(1,14,27);
    background-color: rgba(1, 14, 27, .9);
}
.scrollToTop.isVisible {
    opacity: .8;
    z-index: 4;
    transition: all .4s ease-in;
}

</style>
