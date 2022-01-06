<template>
  <navbar />

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Contact</h2>
        <p>
          Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex
          aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos
          quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
          fugiat sit in iste officiis commodi quidem hic quas.
        </p>
      </div>

      <div>
        <iframe
          style="border: 0; width: 100%; height: 270px"
          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
          frameborder="0"
          allowfullscreen
        ></iframe>
      </div>

      <div class="row mt-5">
        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>A108 Adam Street, New York, NY 535022</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>info@example.com</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>+1 5589 55488 55s</p>
            </div>
          </div>
        </div>

        <div class="col-lg-8 mt-5 mt-lg-0">
          <form
            action="forms/contact.php"
            method="post"
            role="form"
            class="php-email-form"
            @submit.prevent="sendMessage"
          >
            <div class="row">
              <div class="col-md-6 form-group">
                <input
                  type="text"
                  name="name"
                  class="form-control"
                  id="name"
                  placeholder="Your Name"
                  required
                  v-model="form.name"
                />
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input
                  type="email"
                  class="form-control"
                  name="email"
                  id="email"
                  placeholder="Your Email"
                  required
                  v-model="form.email"
                />
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-6 form-group">
                <input
                  type="tel"
                  name="phone"
                  class="form-control"
                  id="phone"
                  placeholder="Phone"
                  required
                  v-model="form.phone"
                />
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input
                  type="text"
                  class="form-control"
                  name="subject"
                  id="subject"
                  placeholder="Subject"
                  required
                  v-model="form.subject"
                />
              </div>
            </div>
            <div class="form-group mt-3">
              <textarea
                class="form-control"
                name="message"
                rows="5"
                placeholder="Message"
                required
                v-model="form.message"
              ></textarea>
            </div>
            <div class="my-3">
              <div class="sent-message" v-if="flash">
                {{ flashMessage }}
              </div>
            </div>
            <div class="text-center">
              <button class="btn btn-info" type="submit">Send Message</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact Section -->
</template>

<script>
import { reactive, ref } from "@vue/reactivity";
import navbar from "../portfolio/Navbar";
import axios from "axios";
import { onMounted } from "@vue/runtime-core";

export default {
  components: {
    navbar,
  },
  setup() {
    let form = reactive({
      name: "",
      email: "",
      phone: "",
      subject: "",
      message: "",
    });
    let flash = ref(false);
    let flashMessage = ref("Sending...");
    onMounted(() => {});
    const sendMessage = async () => {
      flash.value = true;
      await axios
        .post("/api/send-message", form)
        .then((res) => {
          clearForm();
          flashMessage.value = res.data;
          setTimeout(() => {
            flash.value = false;
          }, 3000);
          console.log(res);
        })
        .catch((e) => {
          if (e.response.state == 422) {
            console.log("state: " + 422);
          }
          console.log(e);
        });
    };
    const clearForm = () => {
      form.name = "";
      form.email = "";
      form.phone = "";
      form.subject = "";
      form.message = "";
    };

    return {
      form,
      sendMessage,
      flash,
      flashMessage,
    };
  },
};
</script>
 
