<template>
    <div class="start-page d-flex justify-center align-center flex-column">
        <div class="start-page__icon d-flex justify-center align-center">
            <img src="/storage/icons/message.svg" alt="Message">
        </div>
        <div class="start-page__text mt-3 headline">
            Select a contact to start a chat!
        </div>
    </div>
</template>

<script>
    export default {
        name: "StartPage"
    }
</script>

<style lang="scss" scoped>
    .start-page {
        width: 100%;
        height: 100%;
	    background-color: #E3E6F1;
        background-image: url('/storage/backgrounds/index.svg');
        background-repeat: repeat;

        .start-page__icon {
            height: 150px;
            width: 150px;
            background: #fff;
            border-radius: 50%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,.12),0 2px 4px 0 rgba(0,0,0,.08);
        }

        .start-page__text {
            font-weight: bold;
            color: #475F7B;
        }
    }
</style>
