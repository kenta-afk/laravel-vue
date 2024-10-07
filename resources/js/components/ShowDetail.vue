<template>
  <v-container>
    <v-table>
      <thead>
        <tr>
          <th>Greeting</th>
          <th>Edit</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in detailData" :key="item.id">
          <td>{{ item.detail }}</td>
          <!-- 編集ボタン -->
          <td>
            <v-btn icon @click="openEditDialog(item)">
              <v-icon>mdi-pencil</v-icon>
            </v-btn>
          </td>
        </tr>
      </tbody>
    </v-table>

    <!-- 編集用ダイアログ -->
    <v-dialog v-model="isDialogOpen" max-width="400">
      <v-card>
        <v-card-title class="headline">Edit Greeting</v-card-title>
        <v-card-text>
          <v-text-field v-model="editModel.detail" label="Edit Greeting" @keyup.enter="updateItem"></v-text-field>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="closeDialog">Cancel</v-btn>
          <v-btn color="blue darken-1" text @click="updateItem">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-container>
</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      detailData: [], // データを配列に修正
      isDialogOpen: false, // ダイアログの開閉状態
      editModel: {
        id: null,
        detail: ''
      }
    };
  },
  created() {
    // 実際のAPIからデータを取得して、detailDataにセットする処理
    this.fetchDetailData();
  },
  methods: {
    // APIからデータを取得する
    async fetchDetailData() {
      try {
        const response = await axios.get('/inputs/index');
        this.detailData = response.data; // 正しく取得したデータをセット
      } catch (error) {
        console.error('データの取得に失敗しました', error);
      }
    },

    // 編集ダイアログを開く
    openEditDialog(item) {
      this.editModel = { ...item }; // 編集対象のアイテムをコピー
      this.isDialogOpen = true; // ダイアログを開く
    },

    // ダイアログを閉じる
    closeDialog() {
      this.isDialogOpen = false;
    },

    // データの更新を行う
    async updateItem() {
      try {
        const updatedItem = { ...this.editModel }; // 編集内容
        // サーバーに更新リクエストを送る（APIのエンドポイントに応じて修正）
        await axios.put(`/inputs/update/${updatedItem.id}`, updatedItem);

        // ローカルデータを更新
        const index = this.detailData.findIndex(item => item.id === updatedItem.id);
        if (index !== -1) {
          this.detailData.splice(index, 1, updatedItem); // 配列のアイテムを更新
        }

        // ダイアログを閉じる
        this.isDialogOpen = false;
      } catch (error) {
        console.error('更新に失敗しました', error);
      }
    }
  }
};
</script>

<style scoped>
/* 必要に応じてスタイルを追加 */
</style>
