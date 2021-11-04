<template>
  <div class="sign-up">
    <b-form>
      <p class="title">Sign up</p>
      <b-form-group>
        <unified-error-wrapper :errors="errors.fullName">
          <b-form-input
              v-model="fullName"
              :state="!errors.fullName.$invalid"
              @input="clearServerError('fullName')"
              class="sy-input"
              placeholder="Full name"
              required>
          </b-form-input>
        </unified-error-wrapper>
      </b-form-group>
      <b-form-group>
        <unified-error-wrapper :errors="errors.email">
          <b-form-input
              v-model="email"
              :state="!errors.email.$invalid"
              @input="clearServerError('email')"
              class="sy-input"
              placeholder="Email"
              required>
          </b-form-input>
        </unified-error-wrapper>
      </b-form-group>
      <b-form-group>
        <unified-error-wrapper :errors="errors.password">
          <b-form-input
              v-model="password"
              :state="!errors.password.$invalid"
              @input="clearServerError('password')"
              class="sy-input"
              type="password"
              placeholder="Password"
              required>
          </b-form-input>
        </unified-error-wrapper>
      </b-form-group>
      <b-form-group>
        <unified-error-wrapper :errors="errors.repeatPassword">
          <b-form-input
              v-model="repeatPassword"
              :state="!errors.repeatPassword.$invalid"
              @input="clearServerError('repeatPassword')"
              class="sy-input"
              type="password"
              placeholder="Repeat password"
              required>
          </b-form-input>
        </unified-error-wrapper>
      </b-form-group>
      <b-form-group class="agree-checkbox">
        <b-form-checkbox
            v-model="isAgree"
            :state="!$v.isAgree.$invalid">
          Yes, I understand and agree to the workwise Terms & Conditions.
        </b-form-checkbox>
      </b-form-group>
      <b-button @click="onSignUp" :disabled="errors.$invalid" class="sy-btn btn-sign-up" variant="primary">
        Get started
      </b-button>
    </b-form>
  </div>
</template>

<script>
import { required, email, minLength, sameAs } from 'vuelidate/lib/validators'
import UnifiedErrorMixin from '@/mixins/UnifiedErrorMixin';
import UnifiedErrorWrapper from '@/components/UnifiedErrorWrapper';
import api from '@/api';
import helpers from '@/helpers';

export default {
  name: "SignUp",
  mixins: [
    UnifiedErrorMixin,
  ],
  components: {
    UnifiedErrorWrapper,
  },
  data() {
    return {
      fullName: null,
      email: null,
      password: null,
      repeatPassword: null,
      isAgree: false,
    }
  },
  validations: {
    fullName: {
      required,
    },
    email: {
      required,
      email,
    },
    password: {
      required,
      minLength: minLength(8),
    },
    repeatPassword: {
      required,
      sameAs: sameAs('password'),
    },
    isAgree: {
      isTrue: value => true === value,
    }
  },
  methods: {
    onSignUp() {
      helpers.decorateVuelidateError(api.auth.signUp(this.$data), {
        onSuccess: () => {
          // TODO: go to profile
        },
        onError: (serverErrors) => {
          this.serverErrors = serverErrors;
        }
      });
    }
  }
}
</script>

<style lang="scss" scoped>
@import '@scss/colors';

.sign-up {
  .title {
    width: fit-content;
    color: #000000;
    font-size: 18px;
    font-weight: 600;
    border-bottom: 2px solid $sy-login-red;
    margin-bottom: 30px;
  }

  .btn-sign-up {
    width: 125px;
    height: 40px;
    margin-top: 18px;
  }

  .agree-checkbox {
    margin-top: 25px;
  }
}
</style>