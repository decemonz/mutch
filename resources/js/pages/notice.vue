<template>
    <div class="notice-field">
        <div class="room-title">お知らせ</div>
        <div v-for="notice in notices">
            {{ notice.title }}
            {{ notice.text }}
        </div>
    </div>
</template>

<script>
export default {

    data() {
        return {
            notices: []
        }
    },
    methods: {
        getNotices() {
            this.$http.get('/api/notices')
            .then(res =>  {
                this.notices = res.data
            })
        }
    }
}
</script>
