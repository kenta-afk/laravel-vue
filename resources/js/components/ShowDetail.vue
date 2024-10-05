<template>
  <!--vuetifyで更新-->
  <v-container>
    <v-table>
      <thead>
        <tr>
          <th>
            Greeting
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in detailData" :key="item.id">
          <td>{{ item.detail }}</td>
        </tr>
      </tbody>
    </v-table>
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
