<template>
  <main-layout>
    <div class="profile">
      <div class="profile-bg">
        <img src="../../img/profile-background.jpg" alt="profile-background" />
        <div class="profile-bg-change-container">
          <div class="profile-bg-change">
            <b-button class="bg-change-btn sy-btn">
              Change image
            </b-button>
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
              <p class="user-status">
                {{ profile.status }}
              </p>
            </div>
            <div class="profile-posts">
              <post-list :posts="postList"></post-list>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main-layout>
</template>

<script>
import { BButton } from 'bootstrap-vue';
import MainLayout from "../layouts/MainLayout";
import ProfileAvatar from "../components/ProfileAvatar";
import Post from "../components/Post";
import PostList from "../components/PostList";

export default {
  name: "Profile",
  components: {
    BButton,
    MainLayout,
    ProfileAvatar,
    Post,
    PostList,
  },
  data() {
    return {
      profile: {
        fullName: 'John Doe',
        status: 'Super cool person!',
        background: '../../img/profile-background.jpg',
        avatar: './ddd',
        friendsCount: 20,
      },
      postList: [
        {
          author: 'John Doe',
          time: '3 min ago',
          content: "Lorem ipsum dolor sit amet, consectetuer adipiscing elit." +
              " Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque " +
              "penatibus et magnis dis parturient montes, nascetur ridiculus mus." +
              " Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem." +
              " Nulla consequat massa quis enim. Donec pede justo, fringilla vel, " +
              "aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet" +
              " a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium." +
              " Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean " +
              "vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat " +
              "vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, " +
              "feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque " +
              "rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper" +
              " ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget " +
              "condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed" +
              " ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas " +
              "nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus." +
              " Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed " +
              "fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat," +
              " leo eget bibendum sodales, augue velit cursus nunc,"
        },
        {
          author: 'John Doe',
          time: '3 min ago',
          content: "Lorem ipsum dolor sit amet, consectetuer adipiscing elit." +
              " Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque " +
              "penatibus et magnis dis parturient montes, nascetur ridiculus mus." +
              " Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem." +
              " Nulla consequat massa quis enim. Donec pede justo, fringilla vel, " +
              "aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet" +
              " a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium." +
              " Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean "
        },
      ]
    }
  }
}
</script>

<style lang="scss" scoped>
@import '../../scss/variables';
@import '../../scss/colors';

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

  .user-status {
    color: #686868;
    font-size: 18px;
    font-weight: 600;
  }
}

.profile-posts {
  margin-top: 45px;
}
</style>