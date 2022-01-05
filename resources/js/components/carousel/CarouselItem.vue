<template>
  <transition :name="transitionEffect">
    <div
      class="carousel-item active"
      v-show="currentSlide === index"
      @mouseenter="$emit('mouseenter')"
      @mouseout="$emit('mouseout')"
    >
      <img
        :src="'http://127.0.0.1:8000/images/' + slide"
        class="d-block w-100"
        alt="Sunset Over the City"
      />
    </div>
  </transition>
</template>
<script>
import { computed, ref } from "@vue/reactivity";
export default {
  props: ["slide", "currentSlide", "index", "direction"],
  emits: ["mouseenter", "mouseout"],
  setup(props) {
    const transitionEffect = computed(() => {
      return props.direction === "right" ? "slide-out" : "slide-in";
    });

    return {
      transitionEffect,
    };
  },
};
</script>
<style scoped>
.carousel-item {
  position: relative;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
}
.slide-in-enter-active,
.slide-in-leave-active .slide-out-enter-active,
.slide-out-leave-active {
  transition: all 1s ease-in-out;
}
.slide-in-enter-form {
  transform: translateX(-100%);
}
.slide-in-leave-to {
  transform: translateX(100%);
}
.slide-out-enter-form {
  transform: translateX(100%);
}
.slide-out-leave-to {
  transform: translateX(-100%);
}
</style>
