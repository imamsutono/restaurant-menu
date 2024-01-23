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
            <tr v-for="({ id, name }, index) in categories" :key="id">
                <td>{{ index + 1 }}</td>
                <td>{{ name }}</td>
                <td>
                    <button>Edit</button>
                    <button @click="confirmDelete(999)">Delete</button>
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

    const confirmDelete = (categoryId) => {
        const isConfirmed = confirm('Are you sure want to delete the category?')
        
        if (isConfirmed) {
            deleteItem(categoryId)
        }
    }

    const deleteItem = (categoryId) => {
        axios.delete(`/category/${categoryId}`)
            .then(({ data }) => {
                console.log(data)
                alert(data.message)
                getCategories(route.query.page)
            })
            .catch(response => {
                console.log(response)
                // alert(data.message)
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