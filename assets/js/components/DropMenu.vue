<template>
  <div class="dropdown-user-menu">
    <b-dropdown
        class="dropdown-container"
        toggle-class="sy-btn dropdown-btn"
        menu-class="dropdown-content"
        right
    >
      <template #button-content>
        {{ profile.fullName }}
      </template>
      <b-dropdown-text text-class="dropdown-item dropdown-setting-title">
        Setting
      </b-dropdown-text>
      <b-dropdown-divider></b-dropdown-divider>
      <b-dropdown-text
          v-for="(item, index) in settingItems" :key="index"
          text-class="dropdown-setting-title"
      >
        <router-link :to="item.linkTo" class="dropdown-item dropdown-setting-link">
          {{ item.name }}
        </router-link>
      </b-dropdown-text>
      <b-dropdown-divider></b-dropdown-divider>
      <b-dropdown-item-button class="dropdown-logout-container">
        <router-link :to="logoutLink" class="dropdown-logout-link">
          Logout
        </router-link>
      </b-dropdown-item-button>
    </b-dropdown>
  </div>
</template>

<script>
export default {
  name: "DropMenu",
  props: {
    profile: {
      type: Object,
      required: true,
    },
    settingItems: {
      type: Array,
      required: true,
    },
    logoutLink: {
      type: [String, Object],
      required: true,
    }
  }
}
</script>

<style lang="scss" scoped>
  @import '@scss/variables';
  @import '@scss/colors';

  $dropdown-btn-border-color: #dd3e2b;

  .dropdown-container {
    width: fit-content;
    height: $sy-header-height;
    border-left: 1px solid $dropdown-btn-border-color;
    border-right: 1px solid $dropdown-btn-border-color;

    .dropdown-item {
      width: 240px;

      &:hover, &:focus {
        background-color: white;
        color: black;
      }
    }

    .dropdown-setting-title {
      font-size: 16px;
      font-weight: 600;
    }

    .dropdown-setting-link {
      font-size: 14px;
      font-weight: 500;
      text-decoration: none;
      color: black;
      padding: 0;
    }
  }

  .dropdown-content {
    min-width: unset !important;
    width: 240px;
  }

  .dropdown-logout-container {
    text-align: center;

    .dropdown-logout-link {
      font-size: 16px;
      font-weight: 600;
      color: black;
      text-decoration: none;
      padding: 0;
    }
  }
</style>