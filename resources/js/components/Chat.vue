<template>
    <v-app class="chat-application">
        <chat-navigation></chat-navigation>

        <v-app-bar app v-if="$route.meta.hasAppBar">
            awdawdawd
        </v-app-bar>

        <v-content class="chat__content">
            <v-container fluid>

            </v-container>
        </v-content>
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
    }
</style>
