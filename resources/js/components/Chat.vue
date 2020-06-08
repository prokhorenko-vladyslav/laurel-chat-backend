<template>
    <v-app class="chat-application">
        <chat-navigation></chat-navigation>

        <div class="chat__main">
            <v-app-bar app v-if="$route.meta.hasAppBar">
                awdawdawd
            </v-app-bar>

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
    .chat-application {
        max-height: 100vh;
        overflow: hidden;
        display: flex;

        ::v-deep .v-application--wrap {
            display: flex;
            flex-direction: row;
        }

        .chat__main {
            width: 100%;
            height: 100%;

            .chat__content {
                width: 100%;
                height: 100%;
            }
        }
    }
</style>
