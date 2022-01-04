<template>
  <navbar />
  {{ images[0].picture_link }}
  <img :src="'http://127.0.0.1:8000/images/' + images[0].picture_link" alt="" />
  <div class="carousel-item" v-for="image in images" :key="image.id">
    <img :src="'http://127.0.0.1:8000/images/' + image.picture_link" alt="" />
  </div>
  <div class="carousel">
    <div class="carousel-inner">
      <div class="carousel-item" v-for="image in images" :key="image.id">
        <img :src="image.picture_link" alt="" />
      </div>
    </div>
  </div>
</template>

<script>
import { ref } from "@vue/reactivity";
import navbar from "../portfolio/Navbar";

export default {
  components: {
    navbar,
  },
  setup() {
    let numOfPics = ref(3);
    let idOfPics = ref(0);
    let images = ref();

    return {
      numOfPics,
      idOfPics,
      images: [
        {
          picture_link: "1641275933_img2-1200x900.jpg",
          id: 1,
        },
        {
          picture_link: "1641275954_tour-3@2x-400x300.png",
          id: 2,
        },
        {
          picture_link: "1641275980_study_in_turkey-1200x900.png",
          id: 3,
        },
      ],
    };
  },
};
</script>
