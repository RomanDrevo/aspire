<template>

    <div>
        <input v-model="query" />

        <select v-model="selected">
            <option value="Money">Money</option>
            <option value="Demo">Demo</option>
        </select>

        <button @click="submitQuery">Send</button>

        <ul v-if="items.length > 0">
            <li v-for="item in items" :key="item.id">{{item.name}}</li>
        </ul>
    </div>


</template>

<script>

    import axios from 'axios';

    export default {
        name: 'home',
        data() {
            return {
                query: '',
                selected: '',
                items: []
            }
        },
        methods: {
            submitQuery() {
                axios.get(`http://127.0.0.1:8000/games?text=${this.query}&playmode=${this.selected}`)
                    .then(res => this.items = res.data.games)
            }
        }
    }
</script>
