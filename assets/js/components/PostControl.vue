<template>
  <div class="post-control">
    <div class="post-control-dot"></div>
    <div class="post-control-dot"></div>
    <div class="post-control-dot"></div>
  </div>
</template>

<script>
export default {
  name: "PostControl"
}
</script>

<style lang="scss" scoped>
@import '../../scss/colors';

.post-control {
  cursor: pointer;

  .post-control-dot {
    width: 4px;
    height: 4px;
    border-radius: 2px;
    background-color: #b2b2b2;
    margin-bottom: 3px;
  }

  &:hover .post-control-dot {
    background-color: $sy-red;
  }
}
</style>