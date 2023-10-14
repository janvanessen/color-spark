<template>
    <div class="main-container">
        <h1>Color Spark</h1>
        <div class="tagline">Create unique color schemes from text descriptions</div>        
        <div class="form-wrapper">
            <InputText
                class="form-input"
                v-model="value"
                autofocus
                v-on:keyup.enter="getColors"
            />
            <Button
                class="form-button p-button-md"
                label="Create"
                @click="getColors"
            />
        </div>
        <div class="color-sets">
            {{ output }}
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    mounted() {
        console.log("Component mounted.");
    },
    data() {
        return {
            input: "",
            output: "",
        };
    },
    methods: {
        async getColors() {
            console.log("call colors");
            this.output = "";
            const { data } = await axios.get("/api/colors", {
                params: {
                    text: this.input,
                },
            });
            console.log(data);
            this.output = data.answer;
        },
    },
};
</script>

<style scoped>
.main-container {
    margin: 80px auto;
    text-align: center;
}

.form-wrapper {
    width: 600px;
    margin: 0px auto;
}

.form-input {
    width: 400px;
}

.form-button {
    margin-left: 10px;
    width: 100px;
}

.color-sets {
    width: 600px;
    margin-top: 100px;
}

h1 {
  font-size: 50px;
  line-height: 10px;
}

.tagline {
  font-size: 18px;
  margin-bottom: 30px;
}

</style>
