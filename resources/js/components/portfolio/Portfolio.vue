<template>
  <navbar />
  {{ projectPictures }}{{ project }}
  <!-- project is not getting with the first click -->
  <div
    v-if="!isSingleClose"
    style="height: 100% !important"
    class="w-100 position-absolute mt-12"
  >
    <single
      v-click-outside="onClickOutside"
      class="opacity-100 rounded-md"
      :project="project"
      :pictures="projectPictures"
      @close="onClickOutside"
    />
  </div>
  <div class="w-100" v-if="companies != null">
    <div class="container-fluid mt-2">
      <div class="px-lg-5">
        <div class="row">
          <!-- Gallery item -->
          <div
            v-for="project in companies"
            :key="project.id"
            class="col-xl-3 col-lg-4 col-md-6 mb-4"
          >
            <div
              @click="selectProject(project.id)"
              class="bg-white rounded shadow-sm cursor-pointer"
            >
              <img
                :src="'http://127.0.0.1:8000/images/' + project.image"
                alt=""
                class="img-fluid card-img-top"
              />
              <div class="p-4 text-dark">
                <h5>{{ project.title }}</h5>
                <p class="small text-muted mb-0">
                  {{ project.description }}
                </p>
                <div
                  class="
                    d-flex
                    align-items-center
                    justify-content-between
                    rounded-pill
                    bg-light
                    px-3
                    py-2
                    mt-4
                  "
                >
                  <p class="small mb-0">
                    <i class="fa fa-picture-o mr-2"></i
                    ><span class="font-weight-bold">{{
                      project.category
                    }}</span>
                  </p>
                  <div
                    class="
                      badge badge-danger
                      px-3
                      rounded-pill
                      font-weight-normal
                    "
                  >
                    New
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End -->
        </div>
        <div class="py-5 text-right">
          <a href="#" class="btn btn-dark px-5 py-3 text-uppercase"
            >Show me more</a
          >
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import single from "../portfolio/Single.vue";
import navbar from "../portfolio/Navbar";
import useCompanies from "../../composables/companies";
import { onMounted, ref } from "vue";

export default {
  components: { single, navbar },
  setup() {
    const { companies, getCompanies, company, pictures, getCompany } =
      useCompanies();
    const project = ref({});
    const projectPictures = ref({});
    const isSingleClose = ref(true);
    onMounted(getCompanies);
    function selectProject(id) {
      getCompany(id);
      project.value = company.value;
      projectPictures.value = pictures.value;
      console.log(project.value);
      // isSingleClose.value = false;
    }
    function onClickOutside(event) {
      isSingleClose.value = true;
    }
    return {
      companies,
      project,
      selectProject,
      onClickOutside,
      isSingleClose,
      projectPictures,
    };
  },
};
</script>

