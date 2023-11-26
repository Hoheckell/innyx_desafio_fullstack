<script setup lang="ts">
const props = defineProps(['image'])
defineEmits(['showImage'])
const apiUrl = import.meta.env.VITE_API_URL
</script>
<template>
    <div class="imagebox">
        <img :src=" apiUrl + 'image/' + props.image" alt="produto" @click="$emit('showImage')" />
    </div>
</template>
<style scoped>
.imagebox {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    height: 100%;
    z-index: 99;
    display: flex;
    align-content: center;
    justify-content: center;
}
img {
    align-self: center;
    justify-content: center;
    max-width: 500px;
}
</style>