<template>
    <user-layout>
        <div class="container px-6 mx-auto grid">
            <div class="grid grid-cols-2">
                <div>
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
               Incoming Friend Requests
            </h2>
                <ul>
                    <li>1</li>
                    <li>1</li>
                    <li>1</li>
                    <li>1</li>
                </ul>
                </div>
                <div>
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
               Your Friends
            </h2>
                    <ul>
                        <li>1</li>
                        <li>1</li>
                        <li>1</li>
                        <li>1</li>
                    </ul>
                </div>
            </div>
        </div>
    </user-layout>
</template>

<script>
import UserLayout from "../../Layouts/UserLayout";
export default {
    name: "Friends",
    components: {UserLayout},
    UserLayout,
}
</script>

<style scoped>

</style>
