<template>
  <div v-if="errors">
    <div
      v-for="(v, k) in errors"
      :key="k"
      class="
        bg-red-500
        text-white
        rounded
        font-bold
        mb-4
        shadow-lg
        py-2
        px-4
        pr-0
      "
    >
      <p v-for="error in v" :key="error" class="text-sm">
        {{ error }}
      </p>
    </div>
  </div>
  <div class="container">
    <h2 class="my-8">Create Project</h2>
    <form
      method="POST"
      class="space-y-6"
      enctype="multipart/form-data"
      @submit.prevent="saveProject"
    >
      <div class="space-y-4 rounded-md">
        <div>
          <label for="title" class="block text-sm font-medium text-gray-700"
            >Title</label
          >
          <div class="mt-1">
            <input
              type="text"
              name="title"
              id="title"
              class="
                block
                mt-1
                w-full
                rounded-md
                border-gray-300
                shadow-sm
                focus:border-indigo-300
                focus:ring
                focus:ring-indigo-200
                focus:ring-opacity-50
              "
              v-model="form.title"
            />
          </div>
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea
            class="form-control"
            id="description"
            name="description"
            rows="3"
            v-model="form.description"
          ></textarea>
        </div>
        <div>
          <label for="client" class="block text-sm font-medium text-gray-700"
            >Client</label
          >
          <div class="mt-1">
            <input
              type="text"
              name="client"
              id="client"
              class="
                block
                mt-1
                w-full
                rounded-md
                border-gray-300
                shadow-sm
                focus:border-indigo-300
                focus:ring
                focus:ring-indigo-200
                focus:ring-opacity-50
              "
              v-model="form.client"
            />
          </div>
        </div>

        <div>
          <label
            for="project_url"
            class="block text-sm font-medium text-gray-700"
            >Project URL</label
          >
          <div class="mt-1">
            <input
              type="url"
              name="project_url"
              id="project_url"
              class="
                block
                mt-1
                w-full
                rounded-md
                border-gray-300
                shadow-sm
                focus:border-indigo-300
                focus:ring
                focus:ring-indigo-200
                focus:ring-opacity-50
              "
              v-model="form.project_url"
            />
          </div>
        </div>

        <div>
          <label for="website" class="block text-sm font-medium text-gray-700"
            >Category</label
          >
          <div class="mt-1">
            <select
              name="category"
              id="category"
              class="
                block
                mt-1
                w-full
                rounded-md
                border-gray-300
                shadow-sm
                focus:border-indigo-300
                focus:ring
                focus:ring-indigo-200
                focus:ring-opacity-50
              "
              v-model="form.category"
            >
              <option value="mobile">Mobile</option>
              <option value="web">Web</option>
            </select>
          </div>
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">Preview Image</label>
          <input
            @change="onFileSelected"
            class="form-control"
            type="file"
            id="formFile"
          />
        </div>
        <div v-if="imagePreview">
          <img
            :src="imagePreview"
            alt=""
            class="figure-img img-fluid rounded"
            style="max-height: 100px"
          />
        </div>
        <div>
          <label
            for="project_url"
            class="block text-sm font-medium text-gray-700"
            >Project Gallery</label
          >
          <div class="mt-1">
            <UploadImages @changed="handleImages" />
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="description">Techniques</label>
        <div class="form-control h-48">
          <div class="d-flex">
            <input
              @keyup.enter="addTechnique"
              type="text"
              class="
                block
                mt-1
                w-full
                rounded-md
                border-gray-300
                shadow-sm
                focus:border-indigo-300
                focus:ring
                focus:ring-indigo-200
                focus:ring-opacity-50
              "
              v-model="technique"
            /><button
              style="background: #77b6ea; color: #fff"
              type="button"
              class="rounded-md shadow-sm px-2 mx-1 mt-1"
              @click="addTechnique"
            >
              Add
            </button>
          </div>
          <div class="">
            <label
              v-for="(technique, index) in techniques"
              :key="index"
              class="pl-2 mt-2 mr-2 bg-gray-300 rounded w-auto"
              style="display: inline-flex"
            >
              {{ technique.technique }}
              <span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-4 mt-1 ml-2 mr-1 cursor-pointer"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                  @click="removeTechnique(index)"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                  />
                </svg>
              </span>
            </label>
          </div>
        </div>
      </div>
      <button
        type="submit"
        class="
          inline-flex
          items-center
          px-4
          py-2
          text-xs
          font-semibold
          tracking-widest
          text-white
          uppercase
          bg-gray-800
          rounded-md
          border border-transparent
          ring-gray-300
          transition
          duration-150
          ease-in-out
          hover:bg-gray-700
          active:bg-gray-900
          focus:outline-none focus:border-gray-900 focus:ring
          disabled:opacity-25
        "
      >
        Create
      </button>
    </form>
  </div>
</template>

<script>
import { reactive, ref } from "vue";
import useProjects from "../../composables/projects";
import UploadImages from "vue-upload-drop-images";

export default {
  components: {
    UploadImages,
  },
  setup() {
    const form = reactive({
      title: "",
      description: "",
      image: "",
      category: "",
      client: "",
      project_url: "",
    });
    let file = reactive(null);
    let imagePreview = ref(null);
    let technique = ref(null);
    let techniques = reactive([]);

    const { errors, storeProject, addGallery, addTechniques } = useProjects();

    const saveProject = async () => {
      await addTechniques(techniques);
      await storeProject({ form: form, file });
    };
    function onFileSelected(event) {
      file = event.target.files[0];
      form.image = event.target.files[0].name;
      let reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = (event) => {
        imagePreview.value = event.target.result;
      };
    }
    const handleImages = (files) => {
      addGallery(files);
    };
    const addTechnique = () => {
      techniques.push({ technique: technique.value });
      technique.value = "";
    };
    const removeTechnique = (index) => {
      console.log(index);
      techniques.splice(index, 1);
    };

    return {
      form,
      addTechnique,
      technique,
      techniques,
      errors,
      saveProject,
      onFileSelected,
      imagePreview,
      file,
      handleImages,
      removeTechnique,
    };
  },
};
</script>
