<script setup>
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const inputText = ref('');
const router = useRouter();

async function submitDetail() {
    try {
        const response = await axios.post('/inputs/create', { 
            detail: inputText.value // v-modelでバインドされたデータを送信
        });
        console.log(response.data); // レスポンスをコンソールに表示

        router.push('/app');
    } catch (error) {
        console.error(error); // エラーハンドリング
    }
}
</script>

<template>
    <div>
        <h1>Input Detail Page</h1>
        <p>This is the input detail component.</p>
    </div>

    <v-form @submit.prevent="submitDetail"> <!-- preventでフォーム送信を防止 -->
        <input type="text" v-model="inputText" placeholder="Enter some text"> <!-- v-modelでフォームデータをバインド -->
        <v-btn type="submit">送信</v-btn> <!-- type="submit"を指定 -->
    </v-form>
</template>