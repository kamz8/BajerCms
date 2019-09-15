<template>
  <div class="input-group add-on">
    <input
      id="SearchBox"
      class="form-control"
      placeholder="Szukaj..."
      name="SearchBox"
      type="text"
    >
    <div class="input-group-btn">
      <button
        class="btn btn-dark"
        type="submit"
      >
        <i class="fa fa-search" />
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: 'SearchBox',
  data() {
    return {

    };
  },
};
</script>

<style scoped>

</style>
