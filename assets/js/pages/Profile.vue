<template>
  <main-layout>
    <div class="profile">
      <div class="profile-bg">
        <img src="../../img/profile-background.jpg" alt="profile-background" />
        <div class="profile-bg-change-container">
          <div class="profile-bg-change">
            <file-input @upload="onBackgroundUpload">
              <b-button class="bg-change-btn sy-btn">
                Change image
              </b-button>
            </file-input>
          </div>
        </div>
      </div>
      <div class="profile-content-bg">
        <div class="profile-content">
          <div class="profile-sidebar">
            <profile-avatar
                :avatar="profile.avatar"
                :friends-count="profile.friendsCount"
                class="profile-avatar"
            ></profile-avatar>
          </div>
          <div class="profile-center">
            <div class="profile-user-info">
              <p class="user-full-name">
                {{ profile.fullName }}
              </p>
              <p class="user-about">
                {{ profile.about }}
              </p>
            </div>
            <div class="profile-posts">
              <post-list :posts="profilePosts"></post-list>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main-layout>
</template>

<script>
import { mapState, mapActions } from 'vuex';
import MainLayout from '@/layouts/MainLayout';
import ProfileAvatar from '@/components/ProfileAvatar';
import Post from '@/components/Post';
import PostList from '@/components/PostList';
import FileInput from '@/components/FileInput';
import api from '@/api';

export default {
  name: "Profile",
  components: {
    MainLayout,
    ProfileAvatar,
    Post,
    PostList,
    FileInput
  },
  mounted() {
    this.dispatchProfile(this.$route.params.id).then(profile => {
      this.dispatchProfilePosts(profile.id);
    });
  },
  computed: {
    ...mapState(['profile', 'profilePosts'])
  },
  methods: {
    ...mapActions(['dispatchProfile', 'dispatchProfilePosts']),
    onBackgroundUpload(file) {
      if (file) {
        api.profile.uploadBackgroundPhoto(file);
      }
    }
  }
}
</script>

<style lang="scss" scoped>
@import '@scss/variables';
@import '@scss/colors';

.profile-bg {
  position: relative;
  width: 100%;
  overflow: hidden;
}

.profile-bg-change-container {
  position: absolute;
  width: 100%;
  top: 0;

  .profile-bg-change {
    position: relative;
    width: $sy-page-width;
    margin-left: auto;
    margin-right: auto;

    .bg-change-btn {
      position: absolute;
      font-size: 15px;
      font-weight: 600;
      text-transform: uppercase;
      color: $sy-red;
      background-color: white !important;
      border: 2px solid $sy-red;
      top: 30px;
      right: 0;

      &:hover, &:active {
        background-color: $sy-red !important;
        color: white !important;
      }
    }
  }
}

.profile-content-bg {
  width: 100%;
  background-color: $sy-profile-background;
}

.profile-content {
  display: flex;
  width: $sy-page-width;
  padding-bottom: 60px;
  margin-left: auto;
  margin-right: auto;

  .profile-sidebar {
    width: 280px;
    background-color: white;
    height: fit-content;
    padding-bottom: 60px;

    .profile-avatar {
      margin-top: -95px;
    }
  }

  .profile-center {
    width: 100%;
    padding-top: 60px;
    margin-left: 30px;
  }
}

.profile-user-info {
  .user-full-name {
    font-size: 24px;
    font-weight: 600;
    color: black;
  }

  .user-about {
    color: #686868;
    font-size: 18px;
    font-weight: 600;
  }
}

.profile-posts {
  margin-top: 45px;
}
</style>