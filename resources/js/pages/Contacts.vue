<template>
    <div class="container">
        <h1>Contacts</h1>
        <div class="row">
            <div class="col-6 mx-auto">
                <form enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">
                            First Name
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="First Name"
                            aria-label="First Name"
                            name="firstname"
                            v-model="form.firstname"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">
                            Last Name
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Last Name"
                            aria-label="Last Name"
                            name="lastname"
                            v-model="form.lastname"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">
                            Message
                        </label>
                        <textarea
                            type="text"
                            class="form-control"
                            placeholder="Message"
                            aria-label="Message"
                            name="message"
                            v-model="form.message"
                        ></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">File</label>
                        <input
                            class="form-control"
                            type="file"
                            id="file"
                            name="file"
                            @change="setFile($event.target.files)"
                        />
                    </div>
                    <input
                        type="submit"
                        value="Send"
                        class="btn btn-primary"
                        @click.prevent="sendMessage"
                    />
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "Contacts",
    data() {
        return {
            form: {
                firstname: "",
                lastname: "",
                message: "",
                file: "",
            },
        };
    },
    methods: {
        setFile(value) {
            this.form.file = value;
        },
        sendMessage() {
            const formData = new FormData();
            formData.append("file", this.form.file[0]);
            formData.append("firstname", this.form.firstname);
            formData.append("lastname", this.form.lastname);
            formData.append("message", this.form.message);

            const headers = {
                "Content-Type": "multipart/form-data",
                Authorization: "Bearer abc123",
            };

            const url = "http://127.0.0.1:8000/api/contacts/";

            axios
                .post(url, formData, { headers })
                .then((result) => {
                    console.log(result);
                })
                .catch((error) => console.log(error));
        },
    },
};
</script>

<style lang="scss"></style>
