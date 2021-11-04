<script>
import { merge } from 'lodash';

export default {
  name: "UnifiedErrorMixin",
  data() {
    return {
      serverErrors: {
        count: 0,
      }
    };
  },
  computed: {
    errors() {
      return merge({}, this.$v, this.serverErrors);
    }
  },
  methods: {
    clearServerError(field) {
      if (this.serverErrors.hasOwnProperty(field)) {
        --this.serverErrors.count;
        if (0 === this.serverErrors.count) {
          delete this.serverErrors.$invalid;
        }
        delete this.serverErrors[field];
        this.$v.$touch();
      }
    }
  }
}
</script>
