<template>
  <div class="profile-avatar">
    <div class="profile-avatar-picture">
      <div class="profile-avatar-picture-frame">
        <img src="../../img/profile-avatar.png" alt="profile-avatar" />
      </div>
      <file-input @upload="onAvatarUpload">
        <b-button class="profile-avatar-change sy-btn">
          <b-icon icon="camera-fill"></b-icon>
        </b-button>
      </file-input>
    </div>
    <div class="profile-avatar-friends">
      <p class="profile-avatar-friends-title">Friends</p>
      <p class="profile-avatar-friends-count">
        {{ friendsCount }}
      </p>
    </div>
  </div>
</template>

<script>
import FileInput from "@/components/FileInput";
import api from '@/api';

export default {
  name: "ProfileAvatar",
  components: {
    FileInput,
  },
  props: {
    avatar: {
      type: String,
      required: true,
    },
    friendsCount: {
      type: Number,
      required: true,
    },
  },
  methods: {
    onAvatarUpload(file) {
      if (file) {
        api.uploadAvatarPhoto(file);
      }
    }
  }
}
</script>

<style lang="scss" scoped>
@import '../../scss/colors';

.profile-avatar {
  .profile-avatar-friends {
    text-align: center;
    margin-top: 28px;

    .profile-avatar-friends-title {
      color: #686868;
      font-size: 20px;
      font-weight: 500;
      margin-bottom: 6px;
    }

    .profile-avatar-friends-count {
      color: #000000;
      font-size: 20px;
      font-weight: 600;
    }
  }
}

.profile-avatar-picture {
  position: relative;
  text-align: center;

  .profile-avatar-picture-frame {
    padding: 4px;
    width: 178px;
    height: 178px;
    border-radius: 89px;
    background-color: white;
    margin-left: auto;
    margin-right: auto;
  }

  .profile-avatar-change {
    position: absolute;
    width: 40px;
    height: 40px;
    border-radius: 20px;
    color: white;
    top: -8px;
    right: 49px;
    padding-left: 10px;

    &:hover {
      border: 2px solid white;
      padding-left: 8px;
    }
  }
}
</style>