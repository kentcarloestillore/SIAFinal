<script setup>
import { onMounted, ref } from 'vue';
import QRCode from 'qrcode';
import { Html5QrcodeScanner } from 'html5-qrcode'; 
import { Head, Link ,useForm } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

defineOptions({
  layout: MainLayout
});

const props = defineProps({
  employees: Array,
});

const form = useForm({
  import_file: null
});

const generateQRCodes = () => {
  props.employees.forEach(emp => {
    const qrcodeContainer = document.getElementById(`qrcode_${emp.id}`);
    if (qrcodeContainer) {
      QRCode.toDataURL(emp.prn, { width: 100, height: 100 }, (err, url) => {
        if (err) {
          console.error("Error generating QR code:", err);
        } else {
          qrcodeContainer.src = url;
        }
      });
    }
  });
};

const importFile = (event) => {
  const file = event.target.files[0];
  if (!file) return;

  form.import_file = file;
  form.post(route('employees.import'), {
    onSuccess: () => {
    },
    onError: () => {
    }
  });
};


const initQRCodeScanner = () => {
  const config = {
    fps: 30,
    qrbox: 400
  };

  const scanner = new Html5QrcodeScanner("reader", config);
  const success = (data) => {
  const matchedEmployee = props.employees.find(emp => emp.prn === data);
  const resultContainer = document.getElementById("result");
  const modal = document.getElementById("employeeModal");
  if (matchedEmployee) {
    resultContainer.innerHTML += `
      <div class="my-6 pr-2 py-4 pl-3 bg-lime-400 rounded-xl text-start">
        <div class="flex">
          <div class="flex-col">
            <img src="../../../css/employee5.jpg" alt="" class="h-[16vh] w-[16vh]">
            <div class="text-[8px]">PRN: ${matchedEmployee.prn}</div>
          </div>
          <div class="pl-2">
            <div>Name: ${matchedEmployee.lastname}, ${matchedEmployee.firstname}</div>
            <div>Address: ${matchedEmployee.address}</div>
            <div>Date Of Birth: ${matchedEmployee.dateOfBirth}</div>
            <div>Gender: ${matchedEmployee.gender}</div>
          </div>
        </div>
        <div class="flex justify-between">
          <div>
            <div>Contact Number: ${matchedEmployee.phone}</div>
            <div>${matchedEmployee.jobTitle}</div>
          </div>
          <img src="${document.getElementById(`qrcode_${matchedEmployee.id}`).src}" alt="QR Code" class="w-[4rem] h-[4rem]">
        </div>
      </div>
    `;
    modal.classList.remove("hidden");
  } else {
    resultContainer.innerHTML = '<div class="text-red-500">No matching employee found.</div>';
    modal.classList.remove("hidden");
  }
};


  const error = (err) => {
    console.error("Error scanning QR code:", err);
  };

  scanner.render(success, error);
};

onMounted(() => {
  generateQRCodes();
  initQRCodeScanner();
});
</script>

<style scoped>
.hidden {
  display: none;
}
.cursor-pointer {
  cursor: pointer;
}
</style>

<template>
    <Head title="Employees" />
    <div class="flex">
      <div class="w-[40%] ml-[5rem] text-[1rem]">
        <div class="my-6 pr-2 py-4 pl-3 bg-lime-400 rounded-xl text-start" v-for="(emp, index) in employees" :key="emp.id">
          <div class="flex">
            <div class="flex-col">
              <div v-if="emp.firstname === 'Kent Carlo' && emp.lastname === 'Estillore'">
                <img src="../../../css/employee1.jpg" alt="" class="h-[16vh] w-[16vh]">
              </div>
              <div v-else-if="emp.firstname === 'Miljohn' && emp.lastname === 'Pador'">
                <img src="../../../css/employee2.jpg" alt="" class="h-[16vh] w-[16vh]">
              </div>
              <div v-else-if="emp.firstname === 'Alejandro' && emp.lastname === 'Paclibar'">
                <img src="../../../css/employee3.jpg" alt="" class="h-[16vh] w-[16vh]">
              </div>
              <div v-else-if="emp.firstname === 'Clyde' && emp.lastname === 'Sumayao'">
                <img src="../../../css/employee4.jpg" alt="" class="h-[16vh] w-[16vh]">
              </div>
              <div v-else-if="emp.firstname === 'Dane' && emp.lastname === 'Cosicol'">
                <img src="../../../css/employee5.jpg" alt="" class="h-[16vh] w-[16vh]">
              </div>
              <div v-else-if="emp.firstname === 'James' && emp.lastname === 'Mante'">
                <img src="../../../css/employee6.jpg" alt="" class="h-[16vh] w-[16vh]">
              </div>
              <div v-else-if="emp.firstname === 'Miguel' && emp.lastname === 'Junayon'">
                <img src="../../../css/employee7.jpg" alt="" class="h-[16vh] w-[16vh]">
              </div>
              <div class="text-[8px]">PRN: {{ emp.prn }}</div>
            </div>
            <div class="pl-2">
              <div>Name: {{ emp.lastname }}, {{ emp.firstname }}</div>
              <div>Address: {{ emp.address }}</div>
              <div>Date Of Birth: {{ emp.dateOfBirth }}</div>
              <div>Gender: {{ emp.gender }}</div>
            </div>
          </div>
          <div class="flex justify-between">
            <div>
              <div>Contact Number: {{ emp.phone }}</div>
              <div>{{ emp.jobTitle }}</div>
            </div>
            <img :id="'qrcode_' + emp.id" alt="QR Code" class="w-[4rem] h-[4rem]">
          </div>
        </div>
      </div>
      <div class="ml-[90vh] mt-10 absolute">
        <a href="/employees/csv-all">
          <div class="bg bg-green-500 p-2 rounded-xl mb-5">Generate Employee List (CSV)</div>
        </a>
        <a href="/employees/list">
          <div class="bg bg-green-500 p-2 rounded-xl mb-5">Generate Employee List (PDF)</div>
        </a>
        <div class="mb-10">
          <label for="import_file" class="bg-yellow-500 rounded-xl mb-5 p-2 cursor-pointer">Import Employee List (CSV)</label>
          <input type="file" id="import_file" @change="importFile" class="hidden" />
        </div>
        <div id="reader" style="width: 300px; border: 1px solid #888; min-height: 300px;"></div>
        <div id="employeeModal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
          <div class="bg-black bg-opacity-50 absolute inset-0"></div>
            <div class="bg-white rounded-lg shadow-lg w-3/4 md:w-1/2 lg:w-1/3 relative z-10">
              <div class="p-4 border-b flex justify-between items-center">
                <h3 class="text-xl font-semibold">Employee Details</h3>
                <Link href="/employees" class="text-gray-600 hover:text-gray-900" >x</Link>
              </div>
            <div id="result" class="p-4">
              <img src="../../../css/redacted.jpg" alt="" class="h-[16vh] w-[16vh] absolute left-[4vh] top-[18vh]">
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
