<template>
    <div>
        <h1>Table Data</h1>
        <ul>
            <li v-for="item in detailData" :key="item.id">{{ item.detail }}</li> <!-- 適切なフィールドに変更 -->
        </ul>
    </div>
</template>

<script>

import axios from 'axios';
export default {
    data() {
        return {
            detailData: '', // プロパティを定義
        };
    },
    created() {
        // 実際のAPIからデータを取得して、detailDataにセットする処理
        this.fetchDetailData();
    },
    methods: {
        async fetchDetailData() {
            try {
                const response = await axios.get('/inputs/index');
                this.detailData = response.data; // 正しく取得したデータをセット
            } catch (error) {
                console.error("データの取得に失敗しました", error);
            }
        }
    }
};
</script>

<style scoped>
/* 必要に応じてスタイルを追加 */
</style>
