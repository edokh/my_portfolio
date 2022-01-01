<template>
  <navbar />
  Resume
</template>

<script>
// import useCompanies from "../../composables/companies";
// import { onMounted } from "vue";
import navbar from "../portfolio/Navbar";

export default {
  components: {
    navbar,
  },
  setup() {
    //     const { companies, getCompanies, destroyCompany } = useCompanies();
    //     onMounted(getCompanies);
    //     const deleteCompany = async (id) => {
    //       if (!window.confirm("Are you sure?")) {
    //         return;
    //       }
    //       await destroyCompany(id);
    //       await getCompanies();
    //     };
    // return {
    //   companies,
    //   deleteCompany,
    // };
  },
};
</script>

