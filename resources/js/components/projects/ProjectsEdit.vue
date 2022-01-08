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
    <h2 class="my-8">Edit Project</h2>
    <form
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
              v-model="project.title"
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
            v-model="project.description"
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
              v-model="project.client"
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
              v-model="project.project_url"
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
              v-model="project.category"
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
        <div v-if="imagePreview != null"></div>
        <img
          v-if="project.image != undefined"
          :src="
            isImageChanged
              ? imagePreview
              : 'http://127.0.0.1:8000/images/' + project.image
          "
          alt=""
          style="height: 200px"
        />
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
        Save
      </button>
    </form>
  </div>
</template>

<script>
import useProjects from "../../composables/projects";
import { onMounted, reactive, ref } from "vue";

export default {
  props: {
    id: {
      required: true,
      type: String,
    },
  },

  setup(props) {
    const {
      addTechniques,
      errors,
      project,
      pictures,
      techniques,
      getProject,
      updateProject,
    } = useProjects();

    onMounted(getProject(props.id));

    const saveProject = async () => {
      await addTechniques(techniques.value); //imported from project.js
      await updateProject(props.id, { form: project.value, file });
    };

    let file = reactive(null);
    let imagePreview = ref(null);
    let isImageChanged = ref(false);
    let technique = ref(null);

    function onFileSelected(event) {
      file = event.target.files[0];

      let reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = (event) => {
        isImageChanged.value = true;
        imagePreview.value = event.target.result;
      };
    }
    const removeTechnique = (index) => {
      console.log(index);
      techniques.value.splice(index, 1);
    };
    const addTechnique = () => {
      techniques.value.push({ technique: technique.value });
      technique.value = "";
      console.log(techniques.value);
    };

    return {
      isImageChanged,
      pictures,
      techniques,
      technique,
      errors,
      file,
      project,
      onFileSelected,
      imagePreview,
      saveProject,
      removeTechnique,
      addTechnique,
    };
  },
};
</script>
