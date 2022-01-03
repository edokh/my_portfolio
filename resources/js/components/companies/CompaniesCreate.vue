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
      @submit.prevent="saveCompany"
    >
      <div class="space-y-4 rounded-md shadow-sm">
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
          <label for="formFile" class="form-label">Image</label>
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
import useCompanies from "../../composables/companies";

export default {
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

    const { errors, storeCompany } = useCompanies();

    const saveCompany = async () => {
      await storeCompany({ form: form, file });
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

    return {
      form,
      errors,
      saveCompany,
      onFileSelected,
      imagePreview,
      file,
    };
  },
};
</script>
