<script setup>
defineProps({label:String,value:[String,Number],hint:String})
</script>
<template><div class="stat"><strong>{{ value }}</strong><span>{{ label }}</span><small v-if="hint">{{ hint }}</small></div></template>
