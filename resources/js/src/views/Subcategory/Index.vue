<template>
    <h1>Subcategory List</h1>

    <router-link to="/">
        <button>Create New</button>
    </router-link>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="({ slug, name, level }, index) in subcategories" :key="slug">
                <td>{{ index + 1 }}</td>
                <td>{{ name }}</td>
                <td>{{ level }}</td>
                <td>
                    <router-link :to="{path: `/subcategory/edit/${slug}`}">
                        <button>Edit</button>
                    </router-link>
                    <button @click="confirmDelete(slug)">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>

    <nav>
        <ul class="pagination">
            <li v-for="page in pagination.links">
                <router-link v-if="page.url" :to="paginationLink(page.url)">
                    <button v-html="page.label"></button>
                </router-link>
            </li>
        </ul>
    </nav>
</template>

<script setup>
    import { ref, watch, onMounted } from 'vue'
    import { useRoute } from 'vue-router'

    const subcategories = ref([])
    const pagination = ref({})
    const route = useRoute()

    const getSubcategories = async (page = 1) => {
        try {
            const { data } = await axios.get(`/subcategory?page=${page}`)

            subcategories.value = data.data.data
            delete data.data.data
            pagination.value = data.data
        } catch (error) {
            alert(`Error fetching data: ${error?.message}`)
        }
    }

    const paginationLink = (url = '') => `subcategory?${url.split('?')[1]}`

    onMounted(() => {
        getSubcategories(route.query.page)
    })

    watch(() => route.query.page, (newPage) => {
        getSubcategories(route.query.page)
    })
</script>