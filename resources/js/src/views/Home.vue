<template>
    <h1>Welcome admin 😊</h1>

    <strong>Our Menu:</strong>
    <ul>
        <li>
            <router-link :to="{name: 'category'}">Category</router-link>
        </li>
        <li>
            <router-link :to="{name: 'subcategory'}">Subcategory</router-link>
        </li>
    </ul>
</template>