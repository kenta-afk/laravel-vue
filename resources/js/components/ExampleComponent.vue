<template>
  <v-app>
    <v-main>
      <v-container>
        <v-bottom-navigation class="top-navigation">
          <v-btn @click="goToInputDetail" value="Input">
            <v-icon>mdi-message-draw</v-icon>
            <span>Input</span>
          </v-btn>

          <v-btn @click="goToInputShowDetail" value="Show">
            <v-icon>mdi-view-list</v-icon>
            <span>Show</span>
          </v-btn>
        </v-bottom-navigation>
      </v-container>
    </v-main>
  </v-app>
</template>


<script>
export default {
    methods: {
        goToInputDetail() {
            this.$router.push('/input-detail');  // ページ遷移を実行
        },

        goToInputShowDetail() {
            this.$router.push('/show-detail');
        }
    }
};
</script>

<style>
.top-navigation {
  position: fixed;  /*下にスクロールしても上に固定*/
  top: 0;           /* 画面の一番上に配置 */
  left: 0;
  right: 0;
  z-index: 1000;    /* 他の要素より前に表示 */
}
</style>
