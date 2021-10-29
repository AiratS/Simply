<template>
  <div class="top-menu">
    <div class="top-menu-items">
      <div v-for="(item, index) in items" :key="index" class="top-menu-item col">
        <b-icon class="top-menu-item-icon" :icon="item.icon"></b-icon>
        <router-link class="top-menu-item-link sy-link" :to="item.linkTo">
          {{ item.name }}
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "TopMenu",
  props: {
    items: {
      type: Array,
      required: true,
    }
  }
}
</script>

<style lang="scss" scoped>
.top-menu {
  font-size: 14px;
}

.top-menu-items {
  display: flex;

  .top-menu-item {
    height: 56px;
    text-align: center;
    cursor: pointer;
    padding-top: 10px;

    .top-menu-item-icon {
      display: block;
      color: white;
      margin-left: auto;
      margin-right: auto;
    }

    .top-menu-item-link {
      display: block;
    }
  }
}
</style>