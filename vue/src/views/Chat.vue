<template>
    <div>

        <v-form class="chat-form">
            <v-text-field
                label="内容"
                v-model="body"
            />

            <v-btn class="info" @click="post">post</v-btn>
        </v-form>

        <v-card class="chat" v-for="data in data" :key="data.id">
            <v-card-title>
                ID：{{data.id}}
                内容：{{data.body}}
            </v-card-title>
        </v-card>

    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Chat',
    data: () => ({
        body: '',
    }),
    methods:{
        async post(){
            let data = new FormData();
            data.append('body', this.body);

            await axios
                .post("/api/chat", data)
                .then(() => {
                    console.log(this.body);
                })
        },
    },
    computed: {
        data() {
            return this.$store.state.data.chat
        },
    },
    created(){
        this.$store.dispatch('get', {url: 'chat'});
    },
};
</script>

<style scooped>
.chat{
    margin: 20px 20px;
}
.chat-form{
    margin: 50px auto;
    max-width: 80%;
}
</style>