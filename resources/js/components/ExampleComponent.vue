<template>
    <div>
        <h1>Example Component</h1>
        <button @click="goToInputDetail">Go to InputDetail</button>
    </div>
</template>

<script>
export default {
    methods: {
        goToInputDetail() {
            this.$router.push('/input-detail');  // ページ遷移を実行
        }
    }
};
</script>
