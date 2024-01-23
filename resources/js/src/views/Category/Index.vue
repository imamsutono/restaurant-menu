<template>
    <h1>Category List</h1>

    <router-link :to="{name: 'category-create'}">
        <button>Create New</button>
    </router-link>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="({ slug, name }, index) in categories" :key="slug">
                <td>{{ index + 1 }}</td>
                <td>{{ name }}</td>
                <td>
                    <router-link :to="{path: `/category/edit/${slug}`}">
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

    const categories = ref([])
    const pagination = ref({})
    const route = useRoute()

    const getCategories = async (page = 1) => {
        try {
            const { data } = await axios.get(`/category?page=${page}`)

            categories.value = data.data.data
            delete data.data.data
            pagination.value = data.data
        } catch (error) {
            alert(`Error fetching data: ${error?.message}`)
        }
    }

    const confirmDelete = (slug) => {
        const isConfirmed = confirm('Are you sure want to delete the category?')

        if (isConfirmed) {
            deleteItem(slug)
        }
    }

    const deleteItem = slug => {
        axios.delete(`/category/abc`)
            .then(({ data }) => {
                alert(data.message)
                getCategories(route.query.page)
            })
            .catch(({ data }) => {
                alert(data.message)
            })
    }

    const paginationLink = (url = '') => `category?${url.split('?')[1]}`

    onMounted(() => {
        getCategories(route.query.page)
    })

    watch(() => route.query.page, (newPage) => {
        getCategories(route.query.page)
    })
</script>