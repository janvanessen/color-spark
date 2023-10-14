<template>
    <div class="main-container">
        <h1>Color Spark</h1>
        <div class="tagline">
            Create unique color schemes from text descriptions
        </div>
        <div class="form-wrapper">
            <InputText
                class="form-input"
                v-model="input"
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
            <div
                class="color-set"
                v-for="(colorSet, index) in colorSets"
                :key="index"
            >
                <h2>{{ colorSet.name }}</h2>

                <span
                    class="color-block"
                    v-for="color in colorSet.colors"
                    :key="color"
                >
                    <div
                        class="color-showcase"
                        :style="{ 'background-color': color }"
                    />
                    <div>
                        {{ color }}
                    </div>
                </span>
            </div>
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
            colorSets: [],
        };
    },
    methods: {
        async getColors() {
            this.colorSets = [];
            const { data } = await axios.get("/api/colors", {
                params: {
                    text: this.input,
                },
            });
            console.log(data.colorSets);
            this.colorSets = JSON.parse(data.colorSets);
            console.log(this.colorSets);
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
    margin: 100px auto 200px auto;
    text-align: left;
}

.color-set {
    margin-bottom: 80px;
}

h1 {
    font-size: 50px;
    line-height: 10px;
}

.tagline {
    font-size: 18px;
    margin-bottom: 30px;
}

.color-block {
    width: 91px;
    height: 184px;
    display: inline-block;
}

.color-showcase {
    width: 91px;
    height: 154px;
    display: inline-block;
}

.color-label {
    width: 91px;
    height: 30px;
    display: inline-block;
}
</style>
