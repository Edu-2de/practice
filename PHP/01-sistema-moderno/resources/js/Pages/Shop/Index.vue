<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, router } from "@inertiajs/vue3";

defineProps({
    products: Array,
});

const addToCart = (product) => {
    router.post("/cart/add", {
        product_id: product.id,
    });
};
</script>

<template>
    <Head title="Loja" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Nossos Produtos
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div
                        v-for="product in products"
                        :key="product.id"
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 w-4/5"
                    >
                        <img
                            :src="product.image_url"
                            class="w-4/5 h-48 object-cover rounded mb-4"
                        />

                        <h3 class="text-lg font-bold">{{ product.name }}</h3>
                        <p class="text-gray-600 text-sm truncate">
                            {{ product.description }}
                        </p>

                        <div class="mt-4 flex justify-between items-center">
                            <span class="text-green-600 font-bold text-xl"
                                >R$ {{ product.price }}</span
                            >
                            <button
                                @click="addToCart(product)"
                                class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700"
                            >
                                Comprar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
