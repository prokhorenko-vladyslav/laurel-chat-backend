<template>
    <!-- Sizes your content based upon application components -->
    <v-content class="chat">

        <!-- Provides the application the proper gutter -->
        <v-container fluid class="chat__container pt-0 pb-0">
            <v-row>
                <v-col cols="3">

                </v-col>
                <v-col cols="9" class="pt-0 pb-0">
                    <v-row class="chat__header">
                        <v-col cols="4">
                            <v-badge></v-badge>
                        </v-col>
                        <v-col cols="8">

                        </v-col>
                    </v-row>
                    <v-row class="chat__content">
                        <v-col cols="12">
                            <v-row
                                v-for="(message, index) in messages"
                                :key="index"
                                class="mt-2"
                            >
                                <v-col cols="1" class="pa-0">
                                    <v-avatar
                                        height="40"
                                        width="40"
                                    >
                                        <img
                                            src="https://cdn.vuetifyjs.com/images/john.jpg"
                                            alt="John"
                                        >
                                    </v-avatar>
                                </v-col>
                                <v-col cols="11" class="pa-0 d-flex flex-column" :class="{ 'justify-end order-first' : message.is_mine}">
                                        <v-card
                                            fluid
                                            class="pt-1 pb-1 d-flex align-center"
                                            :class="{ 'align-self-end primary' : message.is_mine }"
                                        >
                                            <v-card-text
                                                class="pt-1 pb-1"
                                                :class="{ 'white--text' : message.is_mine }"
                                            >{{ message.text }}
                                            </v-card-text>
                                        </v-card>
                                        <p
                                            class="caption grey--text mb-0"
                                            :class="{ 'align-self-end' : message.is_mine }"
                                        >10:20 AM</p>
                                </v-col>
                            </v-row>
                        </v-col>
                    </v-row>
                    <v-row class="chat__form">
                        <v-col cols="1">

                        </v-col>
                        <v-col cols="9" class="pt-0 pb-0 d-flex align-center">
                            <v-text-field
                                dense
                                height="30"
                                outlined
                                hide-details
                                clearable
                                single-line
                                label="Message"
                                :loading="sending"
                                v-model="message"
                                @keypress.enter="sendMessage"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="2">
                            <v-btn
                                :loading="sending"
                                color="primary"
                                @click="sendMessage"
                            >Send
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>
        </v-container>
    </v-content>
</template>

<script>
    export default {
        name: "Chat",
        data: () => ({
            messages: [],
            message: "",
            sending: false,
        }),
        mounted() {
            Echo.channel('chat')
                .listen('MyEvent', e => {
                    this.messages.push(e);
                })
        },
        methods: {
            sendMessage() {
                this.sending = true;
                axios.post('/send', {message: this.message})
                    .then(response => {
                        this.message = '';
                        this.messages.push(response.data);
                        this.sending = false;
                    })

            }
        }
    }
</script>

<style lang="scss" scoped>
    .chat {
        min-height: 100vh;
        margin: 0;
        padding: 0;
        background-color: #E3E6F1;
        background-image: url('../../img/backgrounds/index.svg');
        background-repeat: repeat;

        .chat__container {
            height: 100%;
        }

        .chat__header {
            height: 60px;
            background: #fff;
        }

        .chat__content {
            height: calc(100vh - 120px);

            .v-card {
                width: max-content;
            }
        }

        .chat__form {
            height: 60px;
            background: #fff;
        }
    }
</style>
