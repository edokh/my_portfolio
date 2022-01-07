<template>
  <svg
    xmlns="http://www.w3.org/2000/svg"
    class="carousel-control left"
    fill="none"
    viewBox="0 0 24 24"
    stroke="currentColor"
    @click="$emit('prev')"
  >
    <path
      stroke-linecap="round"
      stroke-linejoin="round"
      stroke-width="2"
      d="M15 19l-7-7 7-7"
    />
  </svg>
  <svg
    xmlns="http://www.w3.org/2000/svg"
    class="carousel-control right"
    fill="none"
    viewBox="0 0 24 24"
    stroke="currentColor"
    @click="$emit('next')"
  >
    <path
      stroke-linecap="round"
      stroke-linejoin="round"
      stroke-width="2"
      d="M9 5l7 7-7 7"
    />
  </svg>
</template>
<script>
export default {
  emits: ["prev", "next"],
  //   setup(emits) {

  //   },
};
</script>


<style scoped>
.carousel-control {
  border: none;
  display: inline-block;
  position: absolute;
  height: 50px;
  width: 70px;
  top: calc(50% - 25px);
  color: #eef5db;
  cursor: pointer;
}
.left {
  left: 0;
}
.right {
  right: 0;
}
</style>