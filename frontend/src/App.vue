<template>
  <div id="app">
    <div>
      <hotels/>
    </div>
  </div>
</template>

<script>
export default {
  components: {
    Hotels: () => import("./components/Hotels"),
  }
}
</script>

<style>
#app {
  font-family: Helvetica, sans-serif;
  text-align: center;
}
</style>
