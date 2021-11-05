<template>
  <div class="container login">
    <div class="row">
      <div class="col col-6 left">
        <div class="info">
          <div class="logo">
            Simply
          </div>
          <div class="desc">
            Simply, is a global freelancing platform and
            social networking where businesses and independent
            professionals connect and collaborate remotely
          </div>
        </div>
        <div class="background">
          <img src="@img/login-background.png" alt="login-background" />
        </div>
      </div>
      <div class="col col-6 right">
        <b-tabs
            nav-class="toggle-list"
            content-class="toggle-content"
            active-nav-item-class="toggle-active"
            pills>
          <b-tab title="Sign in" title-link-class="toggle toggle-sign-in" active>
            <sign-in></sign-in>
          </b-tab>
          <b-tab title="Sign up" title-link-class="toggle toggle-sign-up" lazy>
            <sign-up></sign-up>
          </b-tab>
        </b-tabs>
      </div>
    </div>
  </div>
</template>

<script>
import SignIn from "@/components/SignIn";
import SignUp from "@/components/SignUp";

export default {
  name: "Login",
  components: {
    SignIn,
    SignUp,
  }
}
</script>

<style lang="scss">
@import '@scss/colors';

body {
  background-color: $sy-login-red;
  padding-top: 100px;
  padding-bottom: 100px;

  .login {
    width: 940px;
    height: 615px;
    margin-left: auto;
    margin-right: auto;
    background-color: white;
    border-radius: 3px;

    .left {
      position: relative;
      height: 615px;
      padding-top: 70px;
      padding-left: 20px;
      border-right: 1px solid $sy-login-grey;
    }

    .left:before {
      position: absolute;
      width: 30px;
      height: 30px;
      content: "";
      background-color: white;
      border-radius: 15px;
      top: -14px;
      left: 44px;
    }

    .left:after {
      position: absolute;
      width: 20px;
      height: 20px;
      content: "";
      background-color: white;
      border-radius: 10px;
      top: -37px;
      left: 28px;
    }

    .right {
      border-left: 1px solid $sy-login-grey;
      padding-top: 30px;
      padding-left: 75px;
      padding-right: 75px;
    }

    .right:before {
      position: absolute;
      width: 30px;
      height: 30px;
      content: "";
      background-color: white;
      border-radius: 15px;
      bottom: -14px;
      right: 108px;
    }

    .right:after {
      position: absolute;
      width: 20px;
      height: 20px;
      content: "";
      background-color: white;
      border-radius: 10px;
      bottom: -37px;
      right: 94px;
    }
  }
}

.info {
  padding-left: 45px;
  margin-bottom: 120px;

  .logo {
    font-size: 30px;
    font-weight: bold;
    margin-bottom: 25px;
  }
}

.toggle-list {
  float: right;
  clear: both;
  margin-bottom: 70px;

  .toggle {
    padding: 3px 12px;
    font-size: 14px;
    font-weight: 500;
    color: black;
    background-color: $sy-border-grey;
    border-radius: 4px;
  }

  .toggle-sign-in {
    border-top-right-radius: 0 !important;
    border-bottom-right-radius: 0 !important;;
  }

  .toggle-sign-up {
    border-top-left-radius: 0 !important;;
    border-bottom-left-radius: 0 !important;;
  }

  .toggle-active {
    background-color: $sy-red !important;
  }
}

.toggle-content {
  clear: both;
  padding-right: 35px;
}
</style>