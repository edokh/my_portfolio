<template>
  <div class="carousel">
    <div class="carousel-inner">
      <carousel-indicators
        v-if="indicators"
        :total="Object.keys(slides).length"
        :currentIndex="currentSlide"
        @switch="switchSlide($event)"
      ></carousel-indicators>
      <carousel-item
        v-for="(slide, index) in slides"
        :key="`item-${index}`"
        :slide="slide.picture"
        :current-slide="currentSlide"
        :index="index"
        :direction="direction"
        @mouseenter="stopSlideTimer"
        @mouseout="startSlideTimer"
      ></carousel-item>
      <carousel-controls
        v-if="controls"
        @prev="prev"
        @next="next"
      ></carousel-controls>
    </div>
  </div>
</template>

<script>
import { ref } from "@vue/reactivity";
import CarouselItem from "./CarouselItem.vue";
import CarouselControls from "./CarouselControls.vue";
import CarouselIndicators from "./CarouselIndicators.vue";
import { onBeforeMount, onMounted } from "@vue/runtime-core";
export default {
  props: {
    slides: {
      type: Object,
      required: true,
    },
    controls: {
      type: Boolean,
      default: false,
    },
    indicators: {
      type: Boolean,
      default: false,
    },
    interval: {
      type: Number,
      default: 5000,
    },
  },
  components: {
    CarouselItem,
    CarouselControls,
    CarouselIndicators,
  },
  setup(props) {
    let currentSlide = ref(0);
    let slideInterval = ref(null);
    let direction = ref("right");
    function setCurrentSlide(index) {
      currentSlide.value = index;
    }
    onMounted(() => {
      startSlideTimer();
    });
    onBeforeMount(() => {
      stopSlideTimer();
    });

    const prev = (step = -1) => {
      console.log(currentSlide.value + step);
      const index =
        currentSlide.value > 0
          ? currentSlide.value + step
          : Object.keys(props.slides).length - 1;
      setCurrentSlide(index);
      direction.value = "left";
      startSlideTimer();
    };
    const _next = (step = 1) => {
      const index =
        currentSlide.value < Object.keys(props.slides).length - 1
          ? currentSlide.value + step
          : 0;
      setCurrentSlide(index);
      direction.value = "right";
    };
    const next = (step = 1) => {
      _next(step);
      startSlideTimer();
    };
    const startSlideTimer = () => {
      stopSlideTimer();
      slideInterval.value = setInterval(() => {
        _next();
      }, props.interval);
    };
    const stopSlideTimer = () => {
      clearInterval(slideInterval.value);
    };
    const switchSlide = (index) => {
      const step = index - currentSlide.value;
      if (step > 0) {
        next(step);
      } else {
        prev(step);
      }
    };
    return {
      currentSlide,
      slideInterval,
      setCurrentSlide,
      prev,
      next,
      direction,
      startSlideTimer,
      stopSlideTimer,
      switchSlide,
    };
  },
};
</script>

<style   scoped>
.carousel {
  display: flex;
  justify-content: center;
}
.carousel-inner {
  position: relative;
  width: 900px;
  padding-bottom: 1rem;
  overflow: hidden;
}
</style> 