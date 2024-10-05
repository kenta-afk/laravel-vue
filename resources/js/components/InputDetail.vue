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

    <v-form @submit.prevent="submitDetail" v-model="valid">
        <v-container>
            <v-text-field
              v-model="inputText" 
              :counter="30"
              :rules="nameRules"
              label="Greeting"
              hide-details
              required
            ></v-text-field>
            <v-btn type="submit">送信</v-btn> 
        </v-container>
    </v-form>

    
   
</template>