<script setup>
    import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="flex">
        <div class="w-[25%]">
            <div class="mt-[8vh]">
                <img src="../../css/employee1.jpg" alt="" class="rounded-full w-[30vh] ml-[4.5rem] py-4 mb-1">
                <div  class="text-2xl text-start ml-[4rem] mb-[1rem]">Kent Carlo Estillore</div>
                <Link href="/" ><div class="font-bold bg-black text-white w-[250px] ml-[3rem] py-4 text-center mb-5 rounded">Home</div></Link>
                <Link href="/employees"><div class="font-bold bg-black text-white w-[250px] ml-[3rem] py-4 text-center mb-5 rounded">Employee</div></Link>
            </div>
        </div>
        <div id="content" class="flex flex-col flex-1 overflow-auto max-h-[100vh] min-h-[100vh] bg-blue-200">
            <div class="">
                <slot/>
            </div>
            <footer class="text-gray-500 text-center">Copyright &copy; 2024. BSIT-3 Clab-2 Inc.</footer>
        </div>
        
    </div>
</template>