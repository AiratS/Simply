export default {
  decorateVuelidateError(promise, { onSuccess, onError, onFinally }) {
    onSuccess = onSuccess || (response => {});
    onFinally = onFinally || (() => {});

    promise
      .then(onSuccess)
      .catch(error => {
        let response = error.response;
        let vuelidateErrors = response.hasOwnProperty('data') && response.data.hasOwnProperty('violations')
          ? this.toVuelidateErrors(response.data.violations)
          : null;

        onError(vuelidateErrors, error);
      })
      .finally(onFinally);
  },
  toVuelidateErrors(violations) {
    let vuelidateErrors = {};
    violations.forEach(violation => {
      let field = violation.propertyPath;
      if (!vuelidateErrors.hasOwnProperty(field)) {
        vuelidateErrors[field] = {
          $invalid: true,
          server: {
            message: violation.message,
            messageList: [
              violation.message,
            ]
          },
        };
      } else {
        vuelidateErrors[field]
          .server
          .messageList
          .push(violation.message);
      }
    });

    vuelidateErrors.count = Object.keys(vuelidateErrors).length;
    vuelidateErrors.$invalid = true;

    return vuelidateErrors;
  },
};