<template>
  <div class="main-layout">
    <div class="header">
      <div class="header-content">
        <div class="header-search">
          <simply-logo class="logo"></simply-logo>
          <search-field class="search"></search-field>
        </div>
        <div class="header-menu">
          <top-menu class="top-menu" :items="items"></top-menu>
          <dropdown-user-menu
              :profile="profile"
              :setting-items="settingItems"
              :logout-link="logoutLink"
          ></dropdown-user-menu>
        </div>
      </div>
    </div>
    <div class="content">
      <slot/>
    </div>
    <div class="footer">
      <div class="footer-content">
        <div class="footer-links">
          <router-link
              v-for="(item, index) in footerLinks"
              :key="index"
              :to="item.linkTo"
              class="footer-link"
          >
            {{ item.name }}
          </router-link>
        </div>
        <div class="footer-copyright">
          © Copyright {{ currentYear }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SimplyLogo from "../components/SimplyLogo";
import SearchField from "../components/SearchField";
import TopMenu from "../components/TopMenu";
import DropdownUserMenu from "../components/DropdownUserMenu";

export default {
  name: "MainLayout",

  components: {
    SimplyLogo,
    SearchField,
    TopMenu,
    DropdownUserMenu,
  },

  data() {
    return {
      items: [
        {
          name: 'Messages',
          icon: 'envelope-fill',
          linkTo: '/login'
        },
        {
          name: 'Settings',
          icon: 'envelope',
          linkTo: '/login'
        },
        {
          name: 'FAQ',
          icon: 'arrow-up',
          linkTo: '/login'
        },
      ],
      profile: {
        fullName: 'Airat'
      },
      logoutLink: '/login',
      settingItems: [
        {
          name: 'Account',
          linkTo: '/login',
        },
        {
          name: 'Privacy',
          linkTo: '/login',
        },
        {
          name: 'Terms & Conditions',
          linkTo: '/login',
        }
      ],
      footerLinks: [
        {
          name: 'Help Center',
          linkTo: '#',
        },
        {
          name: 'About',
          linkTo: '#',
        },
        {
          name: 'Privacy Policy',
          linkTo: '#',
        },
        {
          name: 'Community Guidelines',
          linkTo: '#',
        },
        {
          name: 'Cookies Policy',
          linkTo: '#',
        },
        {
          name: 'Career',
          linkTo: '#',
        },
        {
          name: 'Forum',
          linkTo: '#',
        },
        {
          name: 'Language',
          linkTo: '#',
        },
      ]
    };
  },

  computed: {
    currentYear() {
      return new Date().getFullYear();
    }
  }
}
</script>

<style lang="scss" scoped>
@import '../../scss/colors';

$page-width: 1110px;

.header {
  width: 100%;
  height: 56px;
  background-color: $sy-red;

  .header-content {
    width: $page-width;
    margin-left: auto;
    margin-right: auto;

    .header-search {
      float: left;
      display: flex;
      padding-top: 9px;
    }

    .header-menu {
      float: right;
      display: flex;
    }
  }
}

.content {
  background-color: $sy-profile-background;
}

.footer {
  width: 100%;
  padding-top: 30px;
  padding-bottom: 30px;

  .footer-content {
    display: flex;
    justify-content: space-between;
    width: $page-width;
    margin-left: auto;
    margin-right: auto;

    .footer-copyright {
      font-size: 14px;
      font-weight: 500;
      color: $sy-footer-text-grey;
    }
  }
}

.footer-links .footer-link:last-child {
  border-right: none !important;
}

.footer-link {
  font-size: 14px;
  font-weight: 500;
  color: $sy-footer-text-grey;
  text-decoration: none;
  border-right: 1px solid $sy-footer-text-grey;
  padding-left: 10px;
  padding-right: 10px;

  &:hover {
    color: $sy-red;
  }
}

.top-menu {
  margin-right: 15px;
}

.logo {
  margin-right: 15px;
}
</style>