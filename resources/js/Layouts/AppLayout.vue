<script setup>
defineProps({title:{type:String,default:'DevPilot AI'}})
</script>
<template><div class="app-shell"><aside class="sidebar"><div class="brand"><div class="brand-mark">D</div><div><h1>DevPilot AI</h1><small>Web Dev Employee</small></div></div><div class="nav-label">Workspace</div><div class="nav-item active">AI Workspace</div><div class="sidebar-footer"><strong>Human-in-the-loop</strong><br>AI drafts. Developer reviews, tests and approves.</div></aside><main class="main"><slot/></main></div></template>
