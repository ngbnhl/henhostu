<template>
    <user-layout>
        <div class="container mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Your Personal Information
            </h2>
            <div class="grid grid-cols-2 gap-4">
                <div class="content-center">
                    <img alt=""
                         src="frontend/img/54qU_d95dd348dc02b6b123025ecf7a3c9170.jpg"
                         style="width:300px;
                         height:250px">
                </div>
                <div class="row-auto">
                    <h1 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200" >Nguyen Bach Nhat Long</h1>
                    <div class="row">
                        <div class="grid grid-cols-2 ">
                            <div>
                                <ul>
                                    <li><i class="icofont-rounded-right"></i> <strong>Sinh nhật:</strong> 01-01-1970
                                    </li>
                                    <li><i class="icofont-rounded-right"></i> <strong>Giới tính: </strong>Nữ</li>
                                    <li><i class="icofont-rounded-right"></i> <strong>Số điện thoại:</strong></li>
                                    <li><i class="icofont-rounded-right"></i> <strong>Quê quán:</strong> <span
                                        id="city">TP Hồ Chí Minh,</span><span
                                        id="district">Quận 8,</span><span id="ward">Phường 08</span></li>
                                </ul>
                            </div>
                            <div>
                                <ul>
                                    <li><i class="icofont-rounded-right"></i> <strong>Tuổi:</strong> 51</li>
                                    <li><i class="icofont-rounded-right"></i> <strong>Tôn giáo:</strong>Không</li>
                                    <li><i class="icofont-rounded-right"></i> <strong>Nghề nghiệp:</strong></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Your Introduction
            </h2>
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Dream About
            </h2>
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Your Recently Post
            </h2>
        </div>
    </user-layout>
</template>

<script>
import UserLayout from "../../Layouts/UserLayout";

export default {
    name: "Profile",
    components: {UserLayout}
}
</script>

<style scoped>

</style>
