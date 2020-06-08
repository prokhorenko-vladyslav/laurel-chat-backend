<template>
    <v-app class="chat-application">
        <chat-navigation></chat-navigation>

        <div class="chat__main">
            <v-app-bar flat height="60" class="chat__header" v-if="$route.meta.hasAppBar">
                <v-row>
                    <v-col cols="4">
                        <v-avatar color="blue" size="36" class="mr-3">
                            <img src="/storage/photo.jpg" alt="">
                        </v-avatar>
                        <span class="chat__name">Elizabeth Elliott</span>
                    </v-col>
                    <v-col cols="8" class="d-flex justify-end align-center">
                        <img class="chat__header__icon mr-3" src="/storage/icons/star.svg" alt="Star">
                        <img class="chat__header__icon" src="/storage/icons/menu.svg" alt="Menu">
                    </v-col>
                </v-row>
            </v-app-bar>
            <v-divider></v-divider>

            <v-content class="chat__content">
                <router-view></router-view>
            </v-content>
        </div>
    </v-app>
</template>

<script>
    import ChatNavigation from "./sublayouts/ChatNavigation";

    export default {
        name: "ChatWithUser",
        components: {
            ChatNavigation
        }
    }
</script>

<style lang="scss" scoped>
    @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500&display=swap');

    .chat-application {
        max-height: 100vh;
        overflow: hidden;
        display: flex;

        ::v-deep {
            * {
                font-family: 'IBM Plex Sans', sans-serif !important;
            }

            .v-application--wrap {
                display: flex;
                flex-direction: row;
            }
        }

        .chat__main {
            width: 100%;
            height: 100%;

            .chat__header {
                .chat__name {
                    color: #475F7B;
                }

                .chat__header__icon {
                    width: 22px;
                    height: 22px;
                    cursor: pointer;

                    svg {
                        height: 100%;
                        max-width: 100%;
                    }
                }
            }

            .chat__content {
                width: 100%;
                height: 100%;
            }
        }
    }
</style>
