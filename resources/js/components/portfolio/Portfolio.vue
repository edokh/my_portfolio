<template>
  <navbar />
  <div
    v-if="!isSingleClose"
    style="height: 100% !important"
    class="w-100 position-fixed"
  >
    <single
      v-click-outside="onClickOutside"
      class="opacity-100 rounded-md"
      :project="singleProject"
      :pictures="projectPictures"
      :techniques="projectTechniques"
      @close="onClickOutside"
    />
  </div>
  <div class="w-100" v-if="projects != null">
    <div class="container-fluid mt-2">
      <div class="px-lg-5">
        <div class="row">
          <!-- Gallery item -->
          <div
            v-for="project in projects"
            :key="project.id"
            class="col-xl-3 col-lg-4 col-md-6 mb-4"
          >
            <div
              @click="selectProject(project.id)"
              class="bg-white rounded shadow-sm cursor-pointer"
            >
              <img
                :src="'/images/' + project.image"
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
      </div>
    </div>
  </div>
</template>

<script>
import single from "./Single";
import navbar from "../portfolio/Navbar";
import useProjects from "../../composables/projects";
import { onMounted, ref } from "vue";

export default {
  components: { single, navbar },
  setup() {
    const { projects, getProjects, project, pictures, getProject, techniques } =
      useProjects();
    const singleProject = ref({});
    const projectPictures = ref({});
    const projectTechniques = ref({});
    const isSingleClose = ref(true);
    onMounted(getProjects);
    const selectProject = async (id) => {
      await getProject(id);
      singleProject.value = project.value;
      projectPictures.value = pictures.value;
      projectTechniques.value = techniques.value;
      isSingleClose.value = false;
    };
    function onClickOutside(event) {
      isSingleClose.value = true;
    }
    return {
      projects,
      singleProject,
      selectProject,
      onClickOutside,
      isSingleClose,
      projectPictures,
      projectTechniques,
    };
  },
};
</script>
