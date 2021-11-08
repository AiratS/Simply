<template>
  <div class="search-profile">
    <div class="search-profile-info">
      <div class="search-profile-avatar">
        <img src="../../img/search-profile-avatar.png" alt="search-profile-avatar" />
      </div>
      <p class="search-profile-full-name">
        {{ profile.fullName }}
      </p>
      <p class="search-profile-about">
        {{ profile.about }}
      </p>
    </div>
    <div class="search-profile-actions">
      <b-button class="search-profile-follow-btn sy-btn">
        Follow
      </b-button>
      <b-button class="search-profile-message-btn sy-btn">
        Message
      </b-button>
    </div>
    <div class="search-profile-view">
      <router-link to="#" class="search-profile-view-link">
        View Profile
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: "SearchProfile",
  props: {
    profile: {
      type: Object,
      required: true,
    },
  }
}
</script>

<style lang="scss" scoped>
@import '@scss/colors';

.search-profile {
  width: 260px;
  background-color: white;
  box-shadow: 1 1px $sy-block-border-grey;
  border: 1px solid $sy-block-border-grey;
  text-align: center;

  .search-profile-info {
    padding: 35px 25px 0 25px;

    .search-profile-full-name {
      color: #000;
      font-size: 18px;
      font-weight: 600;
      margin-top: 10px;
      margin-bottom: 3px;
    }

    .search-profile-about {
      color: #686868;
      font-size: 14px;
      font-weight: 500;
    }
  }

  .search-profile-actions {
    padding-left: 25px;
    padding-right: 25px;
    margin-bottom: 35px;

    .search-profile-follow-btn {
      background-color: #53d690 !important;
    }

    .search-profile-message-btn {
      margin-left: 10px;
    }
  }

  .search-profile-view {
    border-top: 1px solid $sy-border-grey;
    padding: 13px 0;

    .search-profile-view-link {
      color: #000;
      font-size: 16px;
      font-weight: 500;
      text-decoration: none;
    }
  }
}
</style>