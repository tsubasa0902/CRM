<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import { Core as YubinBangoCore } from "yubinbango-core2";
import { Link } from '@inertiajs/inertia-vue3';


defineProps({
	errors: Object,
	customer: Object
})
const deleteCustomer = id => {
	Inertia.delete(route('customers.destroy',{customer:id}), {
		onBefore: () => confirm('本当に削除しますか？')
	})
}
</script>

<template>
    <Head title="顧客登録" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">顧客詳細</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
						<BreezeValidationErrors :errors="errors" />
						<section class="text-gray-600 body-font relative">
							<form @submit.prevent="storeCustomer">
								<div class="container px-5 py-8 mx-auto">
									<div class="lg:w-1/2 md:w-2/3 mx-auto">
										<div class="flex flex-wrap -m-2">
											<div class="p-2 w-full">
												<div class="relative">
													<label for="name" class="leading-7 text-sm text-gray-600">顧客名</label>
													<div type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
														{{ customer.name }}
													</div>
												</div>
											</div>
											<div class="p-2 w-full">
												<div class="relative">
													<label for="kana" class="leading-7 text-sm text-gray-600">顧客名カナ</label>
													<div id="kana" name="kana"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
														{{ customer.kana }}
													</div>
												</div>
											</div>
											<div class="p-2 w-full">
												<div class="relative">
													<label for="tel" class="leading-7 text-sm text-gray-600">電話番号</label>
													<div id="tel" name="tel" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
														{{ customer.tel }}
													</div>
												</div>
											</div>
											<div class="p-2 w-full">
												<div class="relative">
													<label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
													<div id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
														{{ customer.email }}
													</div>
												</div>
											</div>
											<div class="p-2 w-full">
												<div class="relative">
													<label for="postcode" class="leading-7 text-sm text-gray-600">郵便番号</label>
													<div id="postcode" name="postcode" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
														{{ customer.postcode }}
													</div>
												</div>
											</div>
											<div class="p-2 w-full">
												<div class="relative">
													<label for="address" class="leading-7 text-sm text-gray-600">住所</label>
													<div id="address" name="address" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
														{{ customer.address }}
													</div>
												</div>
											</div>
											<div class="p-2 w-full">
												<div class="relative">
													<label for="birthday" class="leading-7 text-sm text-gray-600">誕生日</label>
													<div id="birthday" name="birthday" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
														{{ customer.birthday }}
													</div>
												</div>
											</div>
											<div class="p-2 w-full">
												<div class="relative">
													<label class="leading-7 text-sm text-gray-600 mr-4">性別</label>
													<div id="birthday" name="birthday" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
														<span v-if="customer.gender === 0">男性</span>
														<span v-if="customer.gender === 1">女性</span>
														<span v-if="customer.gender === 2">その他</span>
													</div>
												</div>
											</div>
											<div class="p-2 w-full">
												<div class="relative">
													<label for="memo" class="leading-7 text-sm text-gray-600">メモ</label>
													<div id="memo" name="memo" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">
														{{ customer.memo }}
													</div>
												</div>
											</div>
											<div class="p-2 w-full flex justify-between">
											<Link as="button" :href="route('customers.edit',{customer:customer.id})" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">編集する</Link>
											<button @click="deleteCustomer(customer.id)" class="text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">削除する</button>
										</div>
										</div>
									</div>
								</div>
							</form>
						</section>
					</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
