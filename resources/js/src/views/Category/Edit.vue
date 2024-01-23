<template>
    <div>
        <label for="name">Category Name</label>
        <input type="text" name="name" placeholder="ex: Noodles" v-model="name">
    </div>
    <div>
        <small>{{ errorMessage }}</small>
    </div>

    <button @click="submitForm">Save</button>
    <router-link to="/category">
        <button>Cancel</button>
    </router-link>
</template>

<script setup>
    import { onMounted, ref } from 'vue'
    import { useRoute } from 'vue-router'
    import router from '../../router';

    const route = useRoute()
    const name = ref('')
    const errorMessage = ref()

    const submitForm = async () => {
        try {
            const { data } = await axios.put(
                `/category/${route.params.slug}`,
                { name: name.value }
            )

            alert(data.message)
            name.value = ''
            router.push({ name: 'category' })
        } catch ({ data }) {
            errorMessage.value = data.message
        }
    }

    const getCategory = async () => {
        try {
            const { data } = await axios.get(`/category/${route.params.slug}`)

            if (typeof data === 'object') {
                name.value = data.data.name
            } else {
                alert('Data not found.')
                router.go(-1)
            }
        } catch (error) {
            console.error(error)       
        }
    }

    onMounted(getCategory)
</script>