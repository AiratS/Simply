<template>
  <div class="file-input">
    <input type="file" ref="file-input" @input="onInput" hidden />
    <div @click="onSelectFile">
      <slot>
        <button class="sy-btn">Browse</button>
      </slot>
    </div>
  </div>
</template>

<script>
export default {
  name: "FileInput",
  methods: {
    onSelectFile() {
      this.$refs['file-input'].click();
    },
    onInput(event) {
      let files = event.target.files;
      let uploadedFile = 0 !== files.length
          ? files.item(0)
          : null;
      this.$emit('upload', uploadedFile);
    }
  }
}
</script>
