<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { computed } from "vue";

// Recebe os itens do Laravel
const props = defineProps({
    cartItems: Array,
});

// CALCULA O TOTAL AUTOMATICAMENTE 🧮
// O reduce percorre a lista somando (preço * quantidade)
const total = computed(() => {
    return props.cartItems.reduce((acc, item) => {
        return acc + parseFloat(item.product.price) * item.quantity;
    }, 0);
});
</script>

<template>
    <Head title="Meu Carrinho" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Seu Carrinho de Compras
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6"
                >
                    <div
                        v-if="cartItems.length === 0"
                        class="text-center text-gray-500"
                    >
                        Seu carrinho está vazio.
                        <Link href="/shop" class="text-blue-600 underline"
                            >Ir para a loja</Link
                        >
                    </div>

                    <div v-else>
                        <table class="w-full text-left">
                            <thead>
                                <tr class="border-b">
                                    <th class="pb-2">Produto</th>
                                    <th class="pb-2">Qtd</th>
                                    <th class="pb-2">Preço Unit.</th>
                                    <th class="pb-2">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="item in cartItems"
                                    :key="item.id"
                                    class="border-b"
                                >
                                    <td class="py-4">
                                        <div class="font-bold">
                                            {{ item.product.name }}
                                        </div>
                                    </td>
                                    <td class="py-4">{{ item.quantity }}</td>
                                    <td class="py-4">
                                        R$ {{ item.product.price }}
                                    </td>
                                    <td class="py-4 text-green-600 font-bold">
                                        R$
                                        {{
                                            (
                                                item.product.price *
                                                item.quantity
                                            ).toFixed(2)
                                        }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="mt-6 text-right">
                            <p class="text-xl">Total a Pagar:</p>
                            <p class="text-3xl font-bold text-green-600">
                                R$ {{ total.toFixed(2) }}
                            </p>

                            <button
                                class="mt-4 bg-green-600 text-white px-6 py-3 rounded-lg text-lg font-bold hover:bg-green-700"
                            >
                                Finalizar Pedido
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
