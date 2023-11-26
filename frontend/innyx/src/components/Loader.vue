<script setup lang="ts">
import { VueSpinner } from 'vue3-spinners';
const props = defineProps(['show']) 
</script>
<template>
    <div class="spinnerbox" >
        <VueSpinner size="50" color="red" class="spinner" />
    </div>
</template>
<style scoped>
.spinnerbox {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    height: 100%;
    z-index: 100;
    display: flex;
    align-content: center;
    justify-content: center;
}
.spinner {
    align-self: center;
    justify-self: center;
} 
</style>