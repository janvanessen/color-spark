<template>
    <div class="main-container">
        <div class="form-wrapper">
            <h1>Color Spark</h1>
            <div class="tagline">
                Create unique color schemes from text descriptions
            </div>
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

        <ProgressSpinner class="spinner" strokeWidth="5" v-if="isLoading" />
        <div class="color-sets" v-else>
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
                    <div class="color-label">
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
            isLoading: false,
        };
    },
    methods: {
        async getColors() {
            this.isLoading = true;
            this.colorSets = [];
            const { data } = await axios.get("/api/colors", {
                params: {
                    text: this.input,
                },
            });
            this.colorSets = JSON.parse(data.colorSets);
            this.isLoading = false;
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
}

.color-set {
    margin-bottom: 80px;
    text-align: left;
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
    width: 120px;
    height: 202px;
    display: inline-block;
}

.color-showcase {
    width: 120px;
    height: 202px;
    display: inline-block;
}

.color-label {
    width: 120px;
    height: 30px;
    margin-top: 10px;
    display: inline-block;
    text-align: center;
    font-size: 16px;
}

.spinner {
    margin: 100px;
    width: 50px;
    height: 50px;
}

@media screen and (max-width: 767px) {
    
.main-container {
    margin: 20px auto;
    text-align: center;
}

.form-wrapper {
    width: 300px;
    margin: 0px auto;
}

.form-input {
    width: 200px;
}

.form-button {
    margin-left: 10px;
    width: 70px;
}

.color-sets {
    width: 300px;
    margin: 50px auto 100px auto;
}

.color-set {
    margin-bottom: 40px;
    text-align: left;
}

h1 {
    font-size: 30px;
    line-height: 10px;
    margin-top: 50px;
}

.tagline {
    font-size: 14px;
    margin-bottom: 20px;
}

.color-block {
    width: 60px;
    height: 101px;
    display: inline-block;
}

.color-showcase {
    width: 60px;
    height: 101px;
    display: inline-block;
}

.color-label {
    width: 60px;
    height: 15px;
    margin-top: 5px;
    display: inline-block;
    text-align: center;
    font-size: 10px;
}

.spinner {
    margin: 50px;
    width: 25px;
    height: 25px;
}

}
</style>
