<script setup>
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

    defineOptions({
        layout: MainLayout
    });

</script>

<template>
    <Head title="Home" />
    <div class="flex">
        <div class="bg-blue-200 h-[100vh]">
            <div class="ml-[10rem] mt-[6rem] py-[2rem] text-3xl ">This Project</div>
            <hr class="border-t border-black w-[60%] ml-[10rem] mb-[2rem]">
            <div class="w-[60%] ml-[10rem] text-xl">
                The Employee Record Web Application is a comprehensive, user-friendly platform designed to streamline and optimize the management of employee data within an organization. This project focuses on providing a centralized system for recording, updating, and accessing employee information efficiently and securely.
            </div>
            <div class="w-[60%] ml-[10rem] mt-[5rem] flex gap-20">
                <Link href=""><button class="text-2xl py-[8px] px-[4rem] border-2 border-black font-bold">Resume</button></Link>
                <Link><button class="text-2xl py-[8px] px-[4rem] border-2 border-black font-bold">Portfolio</button></Link>
            </div>
            <div class="mt-[5rem] text-end mr-[5rem]">
                <a href="https://www.instagram.com/" class="fa fa-instagram text-4xl px-[1rem]"></a>
                <a href="https://x.com/?lang=en" class="fa fa-twitter text-4xl px-[1rem]"></a>
                <a href="https://www.facebook.com/" class="fa fa-facebook text-4xl px-[1rem]"></a>
                <a href="https://www.linkedin.com/login" class="fa fa-linkedin text-4xl px-[1rem] gb-black"></a>
            </div>
        </div>
    </div>
</template>
