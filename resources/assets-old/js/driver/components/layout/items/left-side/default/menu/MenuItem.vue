<template>
    <div class="menu-item">
        <a :href="link" exact >
            <i class="leftmenu_icon" :class="icon"></i>
            <span class="name"><slot></slot></span>
        </a>
    </div>
</template>
<script>
export default {
    props: ["link", "icon"]
}
</script>
