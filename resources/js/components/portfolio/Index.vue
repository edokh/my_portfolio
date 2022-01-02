<template>
  <navbar />

  <div
    id="hero"
    class="d-flex align-items-center"
    style="
      background: url(https://scontent.febl5-1.fna.fbcdn.net/v/t1.6435-9/154107852_2955431731345277_2047905353800600678_n.jpg?_nc_cat=103&ccb=1-5&_nc_sid=e3f864&_nc_eui2=AeF3zsBSX9FSGqwzU4ga4p6Gm5NGfGgdxembk0Z8aB3F6U4YT0SIuF8UwkQqauHX3QE-VF44Nn9N3RJlVLVOsfsZ&_nc_ohc=2jMhJUj0RskAX-KjVkq&_nc_ht=scontent.febl5-1.fna&oh=00_AT80DthP3jTCSn6617Hrakcb3zfUR8CZk8yvMlF8adHJ8w&oe=61F7D267)
        top right;
      background-repeat: no-repeat;
      background-size: cover;
    "
  >
    <div
      class="container d-flex flex-column align-items-center py-96"
      data-aos="zoom-in"
      data-aos-delay="100"
    >
      <h1 class="text-info">Edo Khudeeda</h1>
      <h2 style="color: white; text-shadow: 2px 1px 15px #000000">
        I'm a professional software developer from Erbil
      </h2>
      <a href="about.html" class="btn btn-info">About Me</a>
    </div>
  </div>

  <!-- </section>
    <section id="hero" class="d-flex align-items-center">
    <div
      class="container d-flex flex-column align-items-center"
      data-aos="zoom-in"
      data-aos-delay="100"
    >
      <h1 style="color: #8181dd; text-shadow: 2px 1px 15px #8d8989">
        Edo Khudeeda
      </h1>
      <h2 style="color: white; text-shadow: 2px 1px 15px #000000">
        I'm a professional software developer from Erbil
      </h2>
      <a href="about.html" class="btn-about">About Me</a>
    </div>
  </section> -->
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

