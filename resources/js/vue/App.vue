<template>
    <div class="app">
        <div class="main_content">
            <textarea id="my_text" class="text_block"></textarea>
            <div id="select_language">
                Translate to
                <select @change="translate">
                    <option value="">Select Language</option>
                    <option v-for="lang in langList" :key="lang.code" :value="lang.code">{{ lang.name }}</option>
                </select>
            </div>
            <div id="translated_text" class="text_block"></div>
        </div>
    </div>
</template>

<script>
import languages from "./languages";
import axios from "axios";

export default {
    name: "App",
    data() {
        return {
            langList: languages
        }
    },
    methods: {
        async translate(e) {
            const text = document.getElementById('my_text').value;
            const language = e.target.value;

            if (text && language) {
                try {
                    const response = await axios.get("http://127.0.0.1:8000/api/translate", {
                        params: {
                            language: e.target.value,
                            text
                        }
                    });

                    if (response.data.success) {
                        document.getElementById('translated_text').innerHTML = response.data.translation;
                    }
                } catch (err) {
                    console.log("err = ",err)
                } finally {
                }
            } else {
                document.getElementById('translated_text').innerHTML = '';
            }

        },
    }
}
</script>

<style scoped>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .app {
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        position: fixed;
        display: flex;
    }

    .main_content {
        margin: auto;
        background-color: #fff;
        border: 1px solid;
        min-height: 50%;
        min-width: 50%;
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .text_block {
        border: 1px solid;
        overflow: auto;
        width: 100%;
        height: 105px;
        padding: 10px;
    }

    select {
        padding: 5px;
    }
</style>
