<template>
    <v-app>
        <chat-navigation></chat-navigation>

        <v-app-bar app v-if="$route.meta.hasAppBar">
            awdawdawd
        </v-app-bar>

        <v-content>
            <v-container fluid>

            </v-container>
        </v-content>

        <v-footer app>
            <!-- -->
        </v-footer>
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

</style>
