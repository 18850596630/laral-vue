<template>
    <div id="app">
        <transition enter-active-class="animated bounceInDown">
            <router-view/>
        </transition>
    </div>

</template>


<script>
    export default {
        name: 'app'
    }
</script>
