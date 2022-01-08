<template>
  <div
    class="
      overflow-hidden overflow-x-auto
      min-w-full
      align-middle
      sm:rounded-md
      container
    "
  >
    <div class="d-flex justify-content-between m-4">
      <h2>All Projects</h2>
      <div
        class="
          px-4
          py-2
          text-white
          bg-indigo-600
          hover:bg-indigo-700
          cursor-pointer
          rounded-md
        "
      >
        <router-link
          :to="{ name: 'projects.create' }"
          class="text-sm font-medium text-decoration-none text-white"
          >Create project</router-link
        >
      </div>
    </div>

    <table class="min-w-full border divide-y divide-gray-200 bg-white">
      <thead>
        <tr>
          <th class="px-6 py-3 bg-gray-50">
            <span
              class="
                text-xs
                font-medium
                tracking-wider
                leading-4
                text-left text-gray-500
                uppercase
              "
              >Title</span
            >
          </th>
          <th class="px-6 py-3 bg-gray-50">
            <span
              class="
                text-xs
                font-medium
                tracking-wider
                leading-4
                text-left text-gray-500
                uppercase
              "
              >URL</span
            >
          </th>
          <th class="px-6 py-3 bg-gray-50">
            <span
              class="
                text-xs
                font-medium
                tracking-wider
                leading-4
                text-left text-gray-500
                uppercase
              "
              >Category</span
            >
          </th>

          <th class="px-6 py-3 bg-gray-50">
            <span
              class="
                text-xs
                font-medium
                tracking-wider
                leading-4
                text-left text-gray-500
                uppercase
              "
              >Actions</span
            >
          </th>
          <th class="px-6 py-3 bg-gray-50"></th>
        </tr>
      </thead>

      <tbody class="bg-white divide-y divide-gray-200 divide-solid">
        <template v-for="item in projects" :key="item.id">
          <tr class="bg-white">
            <td
              class="
                px-6
                py-4
                text-sm
                leading-5
                text-gray-900
                whitespace-no-wrap
              "
            >
              {{ item.title }}
            </td>
            <td
              class="
                px-6
                py-4
                text-sm
                leading-5
                text-gray-900
                whitespace-no-wrap
              "
            >
              {{ item.project_url }}
            </td>
            <td
              class="
                px-6
                py-4
                text-sm
                leading-5
                text-gray-900
                whitespace-no-wrap
              "
            >
              {{ item.category }}
            </td>
            <td
              class="
                px-6
                py-4
                text-sm
                leading-5
                text-gray-900
                whitespace-no-wrap
              "
            >
              <router-link
                :to="{ name: 'projects.edit', params: { id: item.id } }"
                class="
                  mr-2
                  inline-flex
                  items-center
                  px-4
                  py-2
                  bg-gray-800
                  border border-transparent
                  rounded-md
                  font-semibold
                  text-xs text-white
                  uppercase
                  tracking-widest
                  hover:bg-gray-700
                  active:bg-gray-900
                  focus:outline-none focus:border-gray-900 focus:ring
                  ring-gray-300
                  disabled:opacity-25
                  transition
                  ease-in-out
                  duration-150
                "
              >
                Edit
              </router-link>
              <button
                @click="deleteProject(item.id)"
                class="
                  inline-flex
                  items-center
                  px-4
                  py-2
                  bg-gray-800
                  border border-transparent
                  rounded-md
                  font-semibold
                  text-xs text-white
                  uppercase
                  tracking-widest
                  hover:bg-gray-700
                  active:bg-gray-900
                  focus:outline-none focus:border-gray-900 focus:ring
                  ring-gray-300
                  disabled:opacity-25
                  transition
                  ease-in-out
                  duration-150
                "
              >
                Delete
              </button>
            </td>
          </tr>
        </template>
      </tbody>
    </table>
  </div>
</template>

<script>
import useProjects from "../../composables/projects";
import { onMounted } from "vue";

export default {
  setup() {
    const { projects, getProjects, destroyProject } = useProjects();

    onMounted(getProjects);

    const deleteProject = async (id) => {
      if (!window.confirm("Are you sure?")) {
        return;
      }

      await destroyProject(id);
      await getProjects();
    };

    return {
      projects,
      deleteProject,
    };
  },
};
</script>
<style scoped>
.container {
  background-color: #eef5db !important;
}
</style>
