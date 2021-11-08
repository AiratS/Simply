<template>
  <div class="unified-error-wrapper">
    <slot />
    <b-form-invalid-feedback :state="isValidState">
      {{ message }}
    </b-form-invalid-feedback>
  </div>
</template>

<script>
import { pickBy, isEmpty } from 'lodash';

export default {
  name: "UnifiedErrorWrapper",
  props: {
    errors: {
      type: Object,
      required: true,
    }
  },
  data() {
    // TODO: Move to a separate file, and generate values from Symfony validator translations
    return {
      required: 'This value should not be blank.',
      email: 'The field value must be an email',
      minLength: 'The password must have at least 8 characters',
      sameAs: 'Passwords must be the same',
    }
  },
  computed: {
    isValidState() {
      return !this.errors.$invalid;
    },
    message() {
      if (this.errors.hasOwnProperty('server')) {
        return this.errors.server.message;
      }

      if (!isEmpty(this.invalidConstraints)) {
        let [ constraint ] = Object.entries(this.invalidConstraints)[0];
        return this[constraint];
      }
    },
    invalidConstraints() {
      return pickBy(this.errors, (value, key) => {
        if (0 === key.indexOf('$') || 'server' === key) {
          return false;
        }
        return !value;
      });
    }
  }
}
</script>