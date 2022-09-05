<template>
  <div>
    <h1 class="text-center mt-28 text-5xl font-bold">Products</h1>

    <div class="flex items-center justify-center m-10 mt-32">
      <table
        class="w-full text-sm text-left border-collapse border border-slate-400 shadow-md"
        border="1"
      >
        <tr class="border-b">
          <th class="text-center lg:text-lg p-1 border border-slate-400">
            Product ID
          </th>
          <th class="text-center lg:text-lg p-1 border border-slate-400">
            Product name
          </th>
          <th class="text-center lg:text-lg p-1 border border-slate-400">
            Product image
          </th>
          <th class="text-center lg:text-lg p-1 border border-slate-400">
            Product price
          </th>
          <th class="text-center lg:text-lg p-1 border border-slate-400">
            Product status
          </th>
        </tr>

        <tr class="border-b" v-for="(product, index) in products">
          <td class="text-center lg:text-lg border border-slate-400">
            {{index += 1}}
          </td>
          <td class="text-center lg:text-lg border border-slate-400">
            {{product.name}}
          </td>
          <td class="border border-slate-400 p-1">
            <div class="flex items-center justify-center">
              <img
                :src="`${backendUrl}/uploads/images/${product.image}`"
                class="object-cover h-24 w-20 rounded-md"
                alt="Image"
              />
            </div>
          </td>
          <td class="text-center lg:text-lg border border-slate-400">
            {{product.price}}
          </td>
          <td class="border border-slate-400" v-if="product.status == 1">
            <div>
              <div class="flex items-center justify-center lg:text-lg">
                <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div>
                Active
              </div>
            </div>
          </td>

          <td class="border border-slate-400" v-if="product.status == 0">
            <div class="flex items-center justify-center lg:text-lg">
              <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
              Inactive
            </div>
          </td>
        </tr>
      </table>
    </div>
  </div>
</template>

<script>
export default {
        data() {
        return {
          products: [],
            number: 0,
            backendUrl: "http://127.0.0.1:8000",
        }
},
methods: {
    getProducts() {
        this.$axios.get(`${this.backendUrl}/api/products`).then(response => {
            this.products = response.data;

        })
    }
    },
    mounted() {
        this.getProducts();
}
    }
</script>