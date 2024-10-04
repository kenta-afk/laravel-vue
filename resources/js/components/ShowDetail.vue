<template>
  <v-container>
    <v-card class="mx-auto my-4" max-width="600">
      <v-card-title class="text-h5">Table Data</v-card-title>
      <v-card-text>
        <v-list>
          <v-list-item v-for="item in detailData" :key="item.id">
            <v-list-item-content>
              <v-list-item-title>{{ item.detail }}</v-list-item-title> <!-- データを表示 -->
            </v-list-item-content>
          </v-list-item>
        </v-list>
      </v-card-text>
    </v-card>
  </v-container>
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
