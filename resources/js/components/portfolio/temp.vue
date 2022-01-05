<template>
  <navbar />
  <!-- <div v-for="picture in pictures" :key="picture.id">
    {{ picture.picture }}
  </div> -->
  <UploadImages @changed="handleImages" />
  <div class="container">
    <carousel
      :interval="3000"
      controls="true"
      indicators="true"
      :slides="pictures"
    ></carousel>
  </div>
</template>

<script>
import { ref } from "@vue/reactivity";
import navbar from "../portfolio/Navbar";
import Carousel from "../carousel/Carousel.vue";
import UploadImages from "vue-upload-drop-images";

export default {
  components: {
    navbar,
    Carousel,
    UploadImages,
  },
  setup() {
    const handleImages = (files) => {
      console.log(files);
    };
    return {
      handleImages,
      pictures: [
        {
          id: 1,
          project_id: 1,
          picture: "1641299710_aegean-680x500-1-1024x1024.jpg",
          created_at: null,
          updated_at: null,
        },
        {
          id: 2,
          project_id: 1,
          picture: "default.jpg",
          created_at: null,
          updated_at: null,
        },
        {
          id: 3,
          project_id: 1,
          picture: "1641299691_Adna-min.jpg",
          created_at: null,
          updated_at: null,
        },
        {
          id: 4,
          project_id: 1,
          picture: "1641299710_aegean-680x500-1-1024x1024.jpg",
          created_at: null,
          updated_at: null,
        },
      ],
    };
  },
};
</script>
