<template>
  <!-- Page Content -->
  <div class="container bg-white shadow">
    <!-- Portfolio Item Heading {{ pictures }}-->
    <div class="d-flex justify-content-between">
      <h1 class="py-2 text-center"></h1>
      <h1 class="py-2 text-center">
        {{ project.title }}
      </h1>
      <svg
        @click="closeSingle"
        xmlns="http://www.w3.org/2000/svg"
        class="h-8 mr-1 -mr-2 text-red-500 hover:text-red-600 cursor-pointer"
        viewBox="0 0 20 20"
        fill="currentColor"
      >
        <path
          fill-rule="evenodd"
          d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
          clip-rule="evenodd"
        />
      </svg>
    </div>

    <!-- Portfolio Item Row -->
    <div class="row">
      <div class="col-md-8">
        <!-- <img
          class="img-fluid mb-3"
          src="'http://127.0.0.1:8000/images/' + project.image"
          alt=""
        /> -->
        <div
          id="carouselBasicExample"
          class="carousel slide carousel-fade"
          data-mdb-ride="carousel"
        >
          <!-- Indicators -->
          <div class="carousel-indicators">
            <button
              type="button"
              data-mdb-target="#carouselBasicExample"
              data-mdb-slide-to="0"
              class="active"
              aria-current="true"
              aria-label="Slide 1"
            ></button>
            <button
              type="button"
              data-mdb-target="#carouselBasicExample"
              data-mdb-slide-to="1"
              aria-label="Slide 2"
            ></button>
            <button
              type="button"
              data-mdb-target="#carouselBasicExample"
              data-mdb-slide-to="2"
              aria-label="Slide 3"
            ></button>
          </div>

          <!-- Inner -->
          <div class="carousel-inner">
            <!-- Single item -->
            <div class="carousel-item active">
              <img
                :src="'http://127.0.0.1:8000/images/' + project.image"
                class="d-block w-100"
                alt="Sunset Over the City"
              />
            </div>

            <!-- Single item -->
            <div class="carousel-item">
              <img
                :src="'http://127.0.0.1:8000/images/1641275969_TheCommonWanderer_-870x555-1-2048x2048.jpg'"
                class="d-block w-100"
                alt="Canyon at Nigh"
              />
            </div>

            <!-- Single item -->
            <div class="carousel-item">
              <img
                :src="'http://127.0.0.1:8000/images/1641282537_Screenshot_1.jpg'"
                class="d-block w-100"
                alt="Cliff Above a Stormy Sea"
              />
            </div>
          </div>
          <!-- Inner -->

          <!-- Controls -->
          <button
            class="carousel-control-prev"
            type="button"
            data-mdb-target="#carouselBasicExample"
            data-mdb-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-mdb-target="#carouselBasicExample"
            data-mdb-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

      <div class="col-md-4">
        <h3 class="my-3">Project Description</h3>
        <p>
          {{ project.description }}
        </p>
        <h3 class="my-3">Project Details</h3>
        <ul>
          <li class="text-capitalize">
            <strong>Category</strong>: {{ project.category }}
          </li>
          <li><strong>Client</strong>: {{ project.client }}</li>
          <!-- <li><strong>Project date</strong>: 01 March, 2020</li> -->
          <li>
            <strong>URL</strong>:
            <a href="http://admin.yadgarsoft.com/">{{ project.project_url }}</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- /.container -->
</template>
<script>
// import { defineComponent } from '@vue/composition-api'

export default {
  props: {
    project: { type: Object },
    pictures: { type: Object },
  },
  emits: ["close"],
  setup(props, { emit }) {
    function closeSingle() {
      emit("close");
    }
    return {
      closeSingle,
    };
  },
};
</script>




<style>
.single-project {
  width: 80%;
  height: 30rem;
  margin: auto;
}
.single-row {
  margin: auto !important;
}
.h5 {
  font-weight: bolder !important;
}
#img {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
}
/* .portrait {
  height: 80px;
  widows: 30px;
} */
</style>