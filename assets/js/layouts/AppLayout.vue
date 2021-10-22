<template>
  <div class="app-layout">
    <slot/>
  </div>
</template>

<script>
export default {
  name: "AppLayout"
}
</script>

<style lang="scss">
  @import '../../scss/colors';

  body {
    background-color: $red !important;
  }
</style>