<template>
    <div>
        <h1>Example Component</h1>
        <v-btn  @click="goToInputDetail">Go to InputDetail</v-btn>
        <v-btn  @click="goToInputShowDetail">Go to ShowDetail</v-btn>
    </div>
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
