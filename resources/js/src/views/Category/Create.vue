<template>
    <div>
        <label for="name">Category Name</label>
        <input type="text" name="name" placeholder="ex: Noodles" v-model="name">
    </div>
    <div>
        <small>{{ errorMessage }}</small>
    </div>

    <button @click="submitForm">Save</button>
</template>

<script setup>
    import { ref } from 'vue'

    const name = ref('')
    const errorMessage = ref()

    const submitForm = async () => {
        try {
            const { data } = await axios.post('/category', { name: name.value })
            alert(data.message)
            name.value = ''
        } catch ({ response }) {
            errorMessage.value = response.data.message
        }
    }
</script>