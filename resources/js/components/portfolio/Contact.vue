<template>
  <navbar />

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Contact</h2>
        <p>
          Feel free to get in touch with me. I'm always open to discussing new
          projects, creative ideas or opportunities to be part of your visions.
        </p>
      </div>

      <div>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18216.924191307324!2d43.973763139527954!3d36.18291241047048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4c8e229444b14b3d!2zMzbCsDEwJzM5LjkiTiA0M8KwNTgnNDguMSJF!5e0!3m2!1sen!2siq!4v1641564911506!5m2!1sen!2siq"
          style="border: 0; width: 100%; height: 270px"
          allowfullscreen=""
          loading="lazy"
        ></iframe>
      </div>

      <div class="row mt-5">
        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>5XHH+6X2, Erbil</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>eido.khudyda@gmail.com</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>+964 780 060 7869</p>
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
 
