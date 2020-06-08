<template>
    <div class="conference-page">
        <div class="conference__messages pl-3 pr-5">
            <template
                v-for="message in messages"
            >
                <div class="message d-flex mb-3 mt-3" :class="{ message_mine : message.is_mine }">
                    <div class="message__user d-flex justify-center align-center mb-5">
                        <v-avatar size="36" :color="message.user.color" :class="{ 'ml-3' : message.is_mine, 'mr-3' : !message.is_mine, }">
                            <v-img :src="chat.avatar" v-if="message.user.avatar"></v-img>
                            <span class="white--text caption" v-else>{{ createInitials(message.user.name) }}</span>
                        </v-avatar>
                    </div>
                    <div class="message__content">
                        <div class="message__text pt-4 pb-4 pl-3 pr-3 body-2">{{ message.text }}</div>
                        <div class="message__time d-flex justify-end caption">{{ message.updated_at }}</div>
                    </div>
                </div>
            </template>
        </div>
        <div class="conference__form pa-3">
            Form
        </div>
    </div>
</template>

<script>
    export default {
        name: "ChatWithUser",
        data: () => ({
            messages: [
                {
                    is_mine: true,
                    text: 'How can we help? We\'re here for you!',
                    updated_at: '7:45 AM',
                    user: {
                        name: 'Elizabeth Elliott',
                        color: '#123456'
                    }
                },
                {
                    text: `Hey John, I am looking for the best admin template.
                    Could you please help me to find it out?`,
                    updated_at: '7:50 AM',
                    user: {
                        name: 'Elizabeth Elliott',
                        color: '#123456'
                    }
                },
                {
                    text: 'I will purchase it for sure.',
                    updated_at: '7:58 AM',
                    user: {
                        name: 'Elizabeth Elliott',
                        color: '#123456'
                    }
                },
                {
                    is_mine: true,
                    text: 'How can we help? We\'re here for you!',
                    updated_at: '7:45 AM',
                    user: {
                        name: 'Elizabeth Elliott',
                        color: '#123456'
                    }
                },
                {
                    text: `Hey John, I am looking for the best admin template.
                    Could you please help me to find it out?`,
                    updated_at: '7:50 AM',
                    user: {
                        name: 'Elizabeth Elliott',
                        color: '#123456'
                    }
                },
                {
                    text: 'I will purchase it for sure.',
                    updated_at: '7:58 AM',
                    user: {
                        name: 'Elizabeth Elliott',
                        color: '#123456'
                    }
                },
                {
                    is_mine: true,
                    text: 'How can we help? We\'re here for you!',
                    updated_at: '7:45 AM',
                    user: {
                        name: 'Elizabeth Elliott',
                        color: '#123456'
                    }
                },
                {
                    text: `Hey John, I am looking for the best admin template.
                    Could you please help me to find it out?`,
                    updated_at: '7:50 AM',
                    user: {
                        name: 'Elizabeth Elliott',
                        color: '#123456'
                    }
                },
                {
                    text: 'I will purchase it for sure.',
                    updated_at: '7:58 AM',
                    user: {
                        name: 'Elizabeth Elliott',
                        color: '#123456'
                    }
                },
            ]
        }),
        methods: {
            createInitials(name) {
                let initials = '';
                name.split(' ').forEach((part, index) => {
                    if (index > 2) {
                        return;
                    }

                    initials += part.split('')[0].toUpperCase();
                });

                return initials.trim();
            },
        }
    }
</script>

<style lang="scss" scoped>
    .conference-page {
        position: relative;
        width: 100%;
        height: calc(100% - 60px);
        background-color: #E3E6F1;
        background-image: url('/storage/backgrounds/index.svg');
        background-repeat: repeat;

        .conference__messages {
            height: calc(100% - 60px);
            overflow: auto;

            .message {
                &.message_mine {
                    flex-direction: row-reverse;

                    .message__content {
                        .message__text {
                            background: #5A8DEE;
                            box-shadow: 0 2px 4px 0 rgba(90, 141, 238, .6);
                            color: #fff;
                        }
                    }
                }

                .message__content {
                    max-width: 70%;

                    .message__text {
                        border-radius: .267rem;
                        background: #fff;
                        box-shadow: 0 2px 6px 0 rgba(0, 0, 0, .3);
                        color: #475F7B;
                    }

                    .message__time {

                    }
                }
            }
        }

        .conference__form {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 60px;
            border-top: 1px solid rgba(0, 0, 0, .12);
            background: #fff;
        }
    }
</style>
