import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

export default function useProjects() {
    const projects = ref([]);
    const project = ref([]);
    const pictures = ref([]);
    const techniques = ref([]);
    const router = useRouter();
    const errors = ref("");

    const getProjects = async () => {
        let response = await axios.get("/api/projects");
        projects.value = response.data.data;
    };

    const getProject = async (id) => {
        let response = await axios.get("/api/projects/" + id);
        console.log(response);
        project.value = response.data.project;
        pictures.value = response.data.pictures;
        techniques.value = response.data.techniques;
    };
    let fd = new FormData();
    const storeProject = async (data) => {
        fd.append("image", data.file);
        fd.append("title", data.form.title);
        fd.append("description", data.form.description);
        fd.append("client", data.form.client);
        fd.append("project_url", data.form.project_url);
        fd.append("category", data.form.category);

        errors.value = "";
        try {
            await axios.post("/api/projects", fd);
            await router.push({ name: "projects.index" });
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors;
            }
        }
    };
    const addGallery = async (files) => {
        for (var i = 0; i < files.length; i++) {
            let file = files[i];
            fd.append("files[" + i + "]", file);
            console.log("i: " + i);
        }
    };
    const addTechniques = async (techniques) => {
        for (var i = 0; i < techniques.length; i++) {
            console.log(techniques[i]);
            fd.append("techniques[" + i + "]", techniques[i]["technique"]);
        }
    };

    const updateProject = async (id, data) => {
        fd.append("_method", "patch");
        fd.append("new_image", data.file);
        fd.append("image", data.form.image);
        fd.append("title", data.form.title);
        fd.append("description", data.form.description);
        fd.append("client", data.form.client);
        fd.append("project_url", data.form.project_url);
        fd.append("category", data.form.category);
        errors.value = "";
        try {
            await axios.post("/api/projects/" + id, fd, {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            });
            await router.push({ name: "projects.index" });
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors;
            }
        }
    };

    const destroyProject = async (id) => {
        await axios.delete("/api/projects/" + id);
    };

    return {
        projects,
        project,
        pictures,
        techniques,
        errors,
        getProjects,
        getProject,
        storeProject,
        updateProject,
        destroyProject,
        addGallery,
        addTechniques,
    };
}
